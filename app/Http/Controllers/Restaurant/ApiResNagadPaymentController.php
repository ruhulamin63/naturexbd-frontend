<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NagadPayment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;

class ApiResNagadPaymentController extends Controller
{

    public function pay(Request $request) {

        $validator = Validator::make($request->all(),
            [
                'pay' => 'required',
                'clientId' => 'required',
                'promoCode' => 'required',
                'cityId' => 'required',
                'cityName' => 'required',
                'deliveryCharge' => 'required',
                'deliveryNote' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
    
                session_start();
    
                $input = $request->all();
                $amount= $input['pay'];
                $clientId= $input['clientId'];
                $promoCode= $input['promoCode'];
                $promoAmount= $input['promoAmount'];
                $cityId= $input['cityId'];
                $cityName= $input['cityName'];
                $deliveryCharge= $input['deliveryCharge'];
                $deliveryNote= $input['deliveryNote'];
    
    
                $request->session()->put('client_id', $clientId);
                $request->session()->put('promo_code', $promoCode);
                $request->session()->put('promo_amount', $promoAmount);
                $request->session()->put('delivery_charge', $deliveryCharge);
                $request->session()->put('delivery_note', $deliveryNote);
                $request->session()->put('cityID', $cityId);
                $request->session()->put('city_name', $cityName);

                $pay = '30';
                $id = 'KT-WR-'.strtoupper(Str::random(10)).'-'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
                // $amount = base64_decode($pay);
                $redirectUrl = NagadPayment::tnxID($id)
                        ->amount($amount)
                        ->getRedirectUrl();
                //return response()->json($redirectUrl);
                return redirect($redirectUrl);

            }
    }

    public function callback(Request $request)
    {
        $verify = (object) NagadPayment::verify();

        $this->_saveResApiNagadPaymentDetails($verify);
        
        if($verify->status === 'Success'){
            $order = json_decode($verify->additionalMerchantInfo);
            $oid = $order->tnx_id;

            $this->_updateResApiOrder($request,$verify);

            return response()->json([['code'=>200, 'status'=>'Success', 'message' => 'Payment Success']]);
        }
        if ($verify->status === 'Aborted') {
            // dd($verify);
            return response()->json([['code'=>401, 'status'=>'Aborted', 'message' => 'Payment not Success']]);
        }
        // dd($verify);
        return response()->json([['code'=>401, 'status'=>'false', 'message' => 'something going wrong']]);

    }

    protected function _updateResApiOrder($request,$verify){

        session_start();
        
        $client_id=$request->session()->get('client_id');
        $promo_code=$request->session()->get('promo_code');
        $promo_amount=$request->session()->get('promo_amount');

        $client_info=DB::table('grocery_users')->where('id',$client_id)->first();

        $data=array();

        $order = json_decode($verify->additionalMerchantInfo);
        $tnxid = $order->tnx_id;

        $data['order_id']= $tnxid;
        $data['city_id']= $request->session()->get('cityID');
        $data['city_name']= $request->session()->get('city_name');
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

    protected function _saveResApiNagadPaymentDetails($verify){
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
}