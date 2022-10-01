<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use DB;
use App\Http\Requests;
use Session;

class PaymentController extends Controller
{
    public function token(Request $request)
    {
        session_start();


        $request_token= $this->_bkash_Get_Token();
        $idtoken=$request_token['id_token'];
        $refreshtoken=$request_token['refresh_token'];

        $_SESSION['token']=$idtoken;
        $_SESSION['refreshtoken']=$refreshtoken;

        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $array['token']=$idtoken;
        $array['refreshtoken']=$refreshtoken;

        $newJsonString = json_encode($array);
        file_put_contents('config.json',$newJsonString);
        File::put(storage_path() . '/app/public/config.json', $newJsonString);

        $request->session()->put('token_message', "Grant Token => " . date('d-M-Y h:i:s A') . "\n");

        echo $idtoken;
    }

    protected function _bkash_Get_Token()
    {
        /*$strJsonFileContents = file_get_contents("config.json");
                $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $post_token=array(
            'app_key'=>$array["app_key"],
            'app_secret'=>$array["app_secret"]
        );

        $url=curl_init($array["tokenURL"]);
        $proxy = $array["proxy"];
        $posttoken=json_encode($post_token);
        $header=array(
            'Content-Type:application/json',
            'password:'.$array["password"],
            'username:'.$array["username"]
        );

        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $posttoken);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($url, CURLOPT_PROXY, $proxy);
        $resultdata=curl_exec($url);
        curl_close($url);

        return json_decode($resultdata, true);
    }

    protected function _get_config_file()
    {
        $path = storage_path() . "/app/public/config.json";
        return json_decode(file_get_contents($path), true);
    }

    public function createpayment(Request $request)
    {
        session_start();

        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $amount = $_GET['amount'];
        $invoice = $_GET['invoice']; // must be unique
        $intent = "sale";
        $proxy = $array["proxy"];
        $createpaybody=array('amount'=>$amount, 'currency'=>'BDT', 'merchantInvoiceNumber'=>$invoice,'intent'=>$intent);
        $url = curl_init($array["createURL"]);

        $createpaybodyx = json_encode($createpaybody);

        $header=array(
            'Content-Type:application/json',
            'authorization:'.$array["token"],
            'x-app-key:'.$array["app_key"]
        );

        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($url, CURLOPT_PROXY, $proxy);

        $resultdata = curl_exec($url);
        curl_close($url);

        $request->session()->put('create_message', "Create Payment => " . date('d-M-Y h:i:s A') . "\n");

        echo $resultdata;
    }

    public function executepayment(Request $request)
    {
        session_start();

        /*$strJsonFileContents = file_get_contents("config.json");
        $array = json_decode($strJsonFileContents, true);*/

        $array = $this->_get_config_file();

        $paymentID = $_GET['paymentID'];
        $delivery_note = $_GET['delivery_note'];
        
        $request->session()->put('delivery_note', $delivery_note);
        
        $proxy = $array["proxy"];

        $url = curl_init($array["executeURL"].$paymentID);

        $header=array(
            'Content-Type:application/json',
            'authorization:'.$array["token"],
            'x-app-key:'.$array["app_key"]
        );

        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($url, CURLOPT_PROXY, $proxy);

        $resultdatax=curl_exec($url);

        $this->_updateOrderStatus($resultdatax,$request,$array);

        curl_close($url);
        echo $resultdatax;
    }

    protected function _updateOrderStatus($resultdatax,$request,$array)
    {
        $resultdatax = json_decode($resultdatax);

        if ($resultdatax && $resultdatax->paymentID != null && $resultdatax->transactionStatus == 'Completed') {

            $client_id=$request->session()->get('client_id');
            $promo_code=$request->session()->get('promo_code');
            $promo_amount=$request->session()->get('promo_amount');

            $client_info=DB::table('grocery_users')->where('id',$client_id)->first();

            $ip = $this->getIp();
            $locate = \Location::get($ip);
            if($locate){
                $cur_location=$locate->cityName.', '.$locate->countryName;
                $city_info=DB::table('grocery_city')->where('city_name',$locate->cityName)->where('status',"Active")->first();
                if($city_info){
                    $cityID=$city_info->id;
                    $city_name=$locate->cityName;
                }
                else{

                    $cityID=1;
                }
            }
            else{
                $cur_location="Location Unknown";
                $cityID=1;
                $city_name="Location Unknown";
            }

            $data=array();
            $data['order_id']= substr($resultdatax->merchantInvoiceNumber, 0, 21);
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

            $insert_order = DB::table('restaurant_orders')->insert($data);

            $data1=array();

            $data1['order_id']=substr($resultdatax->merchantInvoiceNumber, 0, 21);
            $data1['invoice_number']=$resultdatax->merchantInvoiceNumber;
            $data1['grant_token']=$array["token"];
            $data1['refresh_token']=$array["refreshtoken"];
            $data1['token_time']=time();
            $data1['payment_id']=$resultdatax->paymentID;
            $data1['amount']=$resultdatax->amount;
            $message= $request->session()->get('token_message').$request->session()->get('create_message')."Execute Payment => " . date('d-M-Y h:i:s A') . "\n";
            $data1['history']=$message;
            $data1['trxID']=$resultdatax->trxID;
            $data1['transactionStatus']=$resultdatax->transactionStatus;
            $data1['created_at']=date('Y-m-d H:i:s');
            $data1['updated_at']=date('Y-m-d H:i:s');

            $insert_bkash_history = DB::table('bkash_history')->insert($data1);

            $data2=array();

            $data2['invoice_id']=$resultdatax->merchantInvoiceNumber;
            $data2['amount']=$resultdatax->amount;
            $data2['created_at']=date('Y-m-d H:i:s');
            $data2['updated_at']=date('Y-m-d H:i:s');

            $insert_bkash_invoice_id = DB::table('bkash_invoice_id')->insert($data2);

            $data3=array();

            $data3['dateTime']=date('Y-m-d H:i:s');
            $data3['debitMSISDN']=$client_info->mobile;
            $data3['trxID']=$resultdatax->trxID;
            $data3['trxStatus']=$resultdatax->transactionStatus;
            $data3['amount']=$resultdatax->amount;
            $data3['created_at']=date('Y-m-d H:i:s');
            $data3['updated_at']=date('Y-m-d H:i:s');

            $insert_bkash_invoice_id = DB::table('bkash_payments')->insert($data3);

            $removed_temp_cart=DB::delete("DELETE FROM restaurant_temp_cart WHERE client_id = $client_id");
        }
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
