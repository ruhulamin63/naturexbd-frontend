<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NagadPayment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;

class NagadPaymentController extends Controller
{
    public function pay(Request $request,$pay) {
        $id = 'KT-WR-'.strtoupper(Str::random(10)).'-'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
        $amount = base64_decode($pay);
        $redirectUrl = NagadPayment::tnxID($id)
                 ->amount($amount)
                 ->getRedirectUrl();
                 
       //return response()->json($redirectUrl);
       //return response()->json([['code'=>200, 'message' => '$redirectUrl']]);
    
       return redirect($redirectUrl);
    }

    public function callback(Request $request)
    {
        $verify = (object) NagadPayment::verify();

        $this->_saveNagadPaymentDetails($verify);
        
        if($verify->status === 'Success'){
            $order = json_decode($verify->additionalMerchantInfo);
            $oid = $order->tnx_id;

            $this->_updateOrder($request,$verify);

            return redirect('/res_MyOrder')->with([
                'error' => false,
                'message' => 'Checkout successfully.'
            ]);

        }
        if ($verify->status === 'Aborted') {
            // dd($verify);
            return redirect('/res_MyOrder')->with([
                'error' => true,
                'message' => 'Checkout not successfully.'
            ]);
        }
        // dd($verify);
        return redirect('/res_MyOrder')->with([
            'error' => true,
            'message' => 'Not successfully Checkout.'
        ]);

    }

    protected function _updateOrder($request,$verify){

        session_start();
        
        $client_id=$request->session()->get('client_id');
        $promo_code=$request->session()->get('promo_code');
        $promo_amount=$request->session()->get('promo_amount');

        $client_info=DB::table('grocery_users')->where('id',$client_id)->first();

        // $ip = $this->getIp();
        // $locate = \Location::get($ip);
        // if($locate){
        //     $cur_location=$locate->cityName.', '.$locate->countryName;
        //     $city_info=DB::table('grocery_city')->where('city_name',$locate->cityName)->where('status',"Active")->first();
        //     if($city_info){
        //         $cityID=$city_info->id;
        //         $city_name=$locate->cityName;
        //     }
        //     else{

        //         $cityID=1;
        //     }
        // }
        // else{
        //     $cur_location="Location Unknown";
        //     $cityID=1;
        //     $city_name="Location Unknown";
        // }
        $cur_location="Location Unknown";
        $cityID=1;
        $city_name="Location Unknown";

        $data=array();

        $order = json_decode($verify->additionalMerchantInfo);
        $tnxid = $order->tnx_id;

        $data['order_id']= $tnxid;
        $data['city_id']= $cityID;
        $data['city_name']= $city_name;
        $data['customer_name']= $client_info->name;
        $data['delivery_address']= $client_info->address_primary;
        $data['contact_number']= $client_info->mobile;
        $data['delivery_charge']=$request->session()->get('delivery_charge');
        $d_n=$request->session()->get('delivery_note');

        if($d_n!=""){
            $data['delivery_note']= $d_n;
        }
        else{
            $data['delivery_note']= 'N/A';
        }

        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',session('client_id'))->get();
        $total_price_to_pay=0;

        foreach($cart_info as $cart){
            $total_price_to_pay+=$cart->total_price;
        }

        $data['order_data']=json_encode($cart_info);
        $data['client_id']=$client_id;
        $data['product_total']=$total_price_to_pay;
        if($promo_amount>0)
        {
            $data['discount']=$promo_amount;
            $data['total_amount']=$total_price_to_pay-$promo_amount;

            $data1=array();
            $data1['order_id']= $data['order_id'];
            $data1['promo_code']= $promo_code;
            $data1['created_at']=date('Y-m-d H:i:s');
            $data1['updated_at']=date('Y-m-d H:i:s');

            DB::table('promo_orders')->insert($data1);

            $request->session()->put('promo_code', "");

            $request->session()->put('promo_amount', 0);

        }
        else
        {
            $data['discount']=0;
            $data['total_amount']=$total_price_to_pay + $data['delivery_charge'];
        }
        $data['order_status']='Ongoing';
        $data['order_remarks']='N/A';
        $data['scheduled_date']=date('d-M-Y', strtotime('+1 day', strtotime(date('Y-m-d'))));
        $data['created_at']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');

        DB::table('restaurant_orders')->insert($data);

        DB::delete("DELETE FROM restaurant_temp_cart WHERE client_id = $client_id");

        $data1=array();
        $order = json_decode($verify->additionalMerchantInfo);
        $tnxid = $order->tnx_id;
        $data1['invoice_id']= $tnxid;
        $data1['orderId']= $verify->orderId;
        $data1['amount']= $verify->amount;
        $data1['status']= $verify->status;

        DB::table('nagad_invoice_id')->insert($data1);
    }

    protected function _saveNagadPaymentDetails($verify){
        $data=array();
        $data['merchantId']= $verify->merchantId;
        $data['orderId']= $verify->orderId;
        $data['paymentRefId']= $verify->paymentRefId;
        $data['amount']= $verify->amount;
        $data['clientMobileNo']= $verify->clientMobileNo;
        $data['merchantMobileNo']= $verify->merchantMobileNo;
        $data['orderDateTime']= $verify->orderDateTime;
        $data['issuerPaymentDateTime']= $verify->issuerPaymentDateTime;
        $data['issuerPaymentRefNo']= $verify->issuerPaymentRefNo;
        $data['additionalMerchantInfo']= $verify->additionalMerchantInfo;
        $data['status']= $verify->status;
        $data['statusCode']= $verify->statusCode;
        $data['cancelIssuerDateTime']= $verify->cancelIssuerDateTime;
        $data['cancelIssuerRefNo']= $verify->cancelIssuerRefNo;

        $insert=DB::table('nagad_payments')->insert($data);

    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

}
