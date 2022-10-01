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

class NagadPaymentController extends Controller
{
    public function nagadSession(Request $request)
     {
        
    }
    public function pay(Request $request) {
      
        $pay = $request->total_price_to_pay;
        $type = $request->type;
        if($type == 1){
            $id = 'KTR-'.date('md').'-'.strtoupper(Str::random(4));
            $amount = base64_decode($pay);
    
            $orderIdAvailable=DB::table('nagad_order_info')->where('order_id',$id)->first();           
                
            if($orderIdAvailable){
                $id = 'KTR-'.date('md').'-'.strtoupper(Str::random(5));
            }
        }elseif($type == 2){
            $id = 'KTW-'.date('md').'-'.strtoupper(Str::random(4));
            $amount = base64_decode($pay);
            $orderIdAvailable=DB::table('nagad_order_info')->where('order_id',$id)->first();           
                
            if($orderIdAvailable){
                $id = 'KT-W-'.date('md').'-'.strtoupper(Str::random(5));
            }
        }

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
        // $cur_location="Location Unknown";
        // $cityID="1";
        $city_name="Location Unknown";
        
        session_start();
        if(!$request->session()->get('client_id')){
        $delivery_note = $_GET['delivery_note'];
        $guestName = $_GET['name'];
        $guestEmail = $_GET['email'];
        $guestMobile = $_GET['mobile'];
        $guestDivision = $_GET['division'];
        $guestAddressPrimary = $_GET['address_primary'];
        
        $request->session()->put('delivery_note', $delivery_note);
        $request->session()->put('guest_name', $guestName);
        $request->session()->put('guest_email', $guestEmail);
        $request->session()->put('guest_mobile', $guestMobile);
        $request->session()->put('guest_division', $guestDivision);
        $request->session()->put('guest_address_primary', $guestAddressPrimary);
        }
        
        
        

        $data=array();
        $data['order_id']= $id;
        $data['pay']= $amount;
        $data['client_id']= $request->session()->get('client_id')?$request->session()->get('client_id'):null;
        $data['promo_code']= $request->session()->get('promo_code');
        if($request->session()->get('promo_amount')!=""){
            $data['promo_amount']= $request->session()->get('promo_amount');
        }
        else{
            $data['promo_amount']= '0';
        }
        $data['delivery_charge']= $request->session()->get('delivery_charge');
        $data['delivery_note']= $request->session()->get('delivery_note');
        if($request->session()->get('delivery_note')!=""){
            $data['delivery_note']= $request->session()->get('delivery_note');
        }
        else{
            $data['delivery_note']= 'N/A';
        }
        $data['cityID']= $cityID;
        $data['city_name']= $city_name;
        $data['paymentFor']= $type;
        $data['status']= 'Pending';

        $insert=DB::table('nagad_order_info')->insert($data);

        
        $redirectUrl = NagadPayment::tnxID($id)
                 ->amount($amount)
                 ->getRedirectUrl();
       //return response()->json($redirectUrl);
      return redirect($redirectUrl);
      
    }
    
    public function guestPay(Request $request,$pay,$type) {
        
        if($type == 1){
            $id = 'KTR-'.date('md').'-'.strtoupper(Str::random(4));
            $amount = base64_decode($pay);
    
            $orderIdAvailable=DB::table('guest_nagad_order_info')->where('order_id',$id)->first();           
                
            if($orderIdAvailable){
                $id = 'KTR-'.date('md').'-'.strtoupper(Str::random(5));
            }
        }elseif($type == 2){
            $id = 'KTW-'.date('md').'-'.strtoupper(Str::random(4));
            $amount = base64_decode($pay);
    
            $orderIdAvailable=DB::table('guest_nagad_order_info')->where('order_id',$id)->first();           
                
            if($orderIdAvailable){
                $id = 'KT-W-'.date('md').'-'.strtoupper(Str::random(5));
            }
        }

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
        // $cur_location="Location Unknown";
        // $cityID="1";
        $city_name="Location Unknown";

        $data=array();
        $data['order_id']= $id;
        $data['pay']= $amount;
        $data['client_id']= $request->session()->get('guest_id');
        $data['promo_code']= $request->session()->get('promo_code');
        if($request->session()->get('promo_amount')!=""){
            $data['promo_amount']= $request->session()->get('promo_amount');
        }
        else{
            $data['promo_amount']= '0';
        }
        $data['delivery_charge']= $request->session()->get('delivery_charge');
        $data['delivery_note']= $request->session()->get('delivery_note');
        if($request->session()->get('delivery_note')!=""){
            $data['delivery_note']= $request->session()->get('delivery_note');
        }
        else{
            $data['delivery_note']= 'N/A';
        }
        $data['cityID']= $cityID;
        $data['city_name']= $city_name;
        $data['paymentFor']= $type;
        $data['status']= 'Pending';

        $insert=DB::table('guest_nagad_order_info')->insert($data);

        
        $redirectUrl = NagadPayment::tnxID($id)
                 ->amount($amount)
                 ->getRedirectUrl();
    //   return response()->json($redirectUrl);
      return redirect($redirectUrl);
      
    }

    public function ApiPay(Request $request) {

        $validator = Validator::make($request->all(),
            [
                'pay' => 'required',
                'clientId' => 'required',
                'promoAmount' => 'required',
                'cityId' => 'required',
                'cityName' => 'required',
                'deliveryCharge' => 'required',
                'deliveryNote' => 'required',
                'type' => 'required'
            ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        } else {

            $input = $request->all();
            $amount= $input['pay'];
            $clientId= $input['clientId'];
            $promoCode= $input['promoCode'];
            $promoAmount= $input['promoAmount'];
            $cityId= $input['cityId'];
            $cityName= $input['cityName'];
            $deliveryCharge= $input['deliveryCharge'];
            $deliveryNote= $input['deliveryNote'];
            $type= $input['type'];
            
            if($type === 1){
                $id = 'KTA-'.date('md').'-'.strtoupper(Str::random(4));
                $amount = base64_decode($pay);
        
                $orderIdAvailable=DB::table('nagad_order_info')->where('order_id',$id)->first();           
                    
                if($orderIdAvailable){
                    $id = 'KTA-'.date('md').'-'.strtoupper(Str::random(5));
                }
            }elseif($type === 2){
                $id = 'KTA-'.date('md').'-'.strtoupper(Str::random(4));
                $amount = base64_decode($pay);
        
                $orderIdAvailable=DB::table('nagad_order_info')->where('order_id',$id)->first();           
                    
                if($orderIdAvailable){
                    $id = 'KTA-'.date('md').'-'.strtoupper(Str::random(5));
                }
            }else{
                $id = 'KTA-'.date('md').'-'.strtoupper(Str::random(4));
                
                $orderIdAvailable=DB::table('nagad_order_info')->where('order_id',$id)->first();           
                    
                if($orderIdAvailable){
                    $id = 'KTA-'.date('md').'-'.strtoupper(Str::random(5));
                }
            }

            $data=array();
            $data['order_id']= $id;
            $data['pay']= $amount;
            $data['client_id']= $clientId;
            $data['promo_code']= $promoCode;
            $data['promo_amount']= $promoAmount;
            $data['delivery_charge']= $deliveryCharge;
            $data['delivery_note']= $deliveryNote;
            $data['cityID']= $cityId;
            $data['city_name']= $cityName;
            $data['paymentFor']= $type;
            $data['status']= 'Pending';

            $insert=DB::table('nagad_order_info')->insert($data);

            $redirectUrl = NagadPayment::tnxID($id)
                    ->amount($amount)
                    ->getRedirectUrl();
            //return response()->json($redirectUrl);
            return response()->json([['code'=>200, 'message' => $redirectUrl]]);
            // return redirect($redirectUrl);

        }
    }

    public function callback(Request $request)
    {

        $verify = (object) NagadPayment::verify();
        $this->_saveNagadPaymentDetails($verify);
        
        
        if($verify->status === 'Success'){
            $order = json_decode($verify->additionalMerchantInfo);
            $oid = $order->tnx_id;
            
            $this->_updateOrder($request,$verify);
            
            $orderInfo=DB::table('nagad_order_info')->where('order_id',$oid)->first();
            if($orderInfo->paymentFor == 1){

                return redirect('/res_MyOrder')->with([
                    'error' => false,
                    'message' => 'Checkout successfully.'
                ]);

            }elseif($orderInfo->paymentFor == 2){
                session(['guest_order_id',]);
                session(['guest_order_id' => $orderInfo->order_id]);
                return redirect('/MyOrder')->with([
                    'error' => false,
                    'message' => 'Checkout successfully.'
                ]);

            }elseif($orderInfo->paymentFor == 3){

                return response()->json([['code'=>200, 'status'=>'Success', 'message' => 'Checkout successfully.']]);

            }elseif($orderInfo->paymentFor == 4){

                return response()->json([['code'=>200, 'status'=>'Success', 'message' => 'Checkout successfully.']]);

            }

        }
        if ($verify->status === 'Aborted') {

            $order = json_decode($verify->additionalMerchantInfo);
            // dd($verify);
            $invoiceId = $verify->orderId;

            $orderInfo=DB::table('nagad_order_info')->where('invoice_id',$invoiceId)->first();

            $user_data = array();
            $user_data['status'] ='Canceled';
            $udpatedStatus= DB::table('nagad_order_info')
                ->where('id',$orderInfo->id)
                ->update($user_data);

            if($orderInfo->paymentFor == 1){

                return redirect('/res_MyOrder')->with([
                    'error' => true,
                    'message' => 'Checkout not successfull.'
                ]);

            }elseif($orderInfo->paymentFor == 2){

                return redirect('/MyOrder')->with([
                    'error' => true,
                    'message' => 'Checkout not successfull.'
                ]);

            }elseif($orderInfo->paymentFor == 3){

                return response()->json([['code'=>200, 'status'=>'Aborted', 'message' => 'Checkout not successfull.']]);

            }elseif($orderInfo->paymentFor == 4){

                return response()->json([['code'=>200, 'status'=>'Aborted', 'message' => 'Checkout not successfull.']]);

            }
            
            
            
        }
        // dd($verify);
        return redirect('/MyOrder')->with([
            'error' => true,
            'message' => 'Not successfully Checkout.'
        ]);
    }

    protected function _updateOrder($request,$verify){

        // session_start();
        // $client_id=$request->session()->get('client_id');
        // $promo_code=$request->session()->get('promo_code');
        // $promo_amount=$request->session()->get('promo_amount');
        
        $order = json_decode($verify->additionalMerchantInfo);
        $tnxid = $order->tnx_id;

        
        $client_id=$request->session()->get('client_id');
            if($client_id){
                $client_info=DB::table('grocery_users')->where('id',$client_id)->first();  
            }else{
                $clientExist =DB::table('grocery_users')->where('email',$request->session()->get('guest_email'))->first();
                if($clientExist){
                    $client_info = $clientExist;
                }else{
                 
                    $name = $request->session()->get('guest_name');
                    $mobile = $request->session()->get('guest_mobile');
                    $email = $request->session()->get('guest_email');
                    $city_name = $request->session()->get('guest_division');
                    $address = $request->session()->get('guest_address_primary');
                    $cor_password = rand(10000,99999);
                    
                    $data=array();
                    $data['name']=$name;
                    $data['mobile']=$mobile;
                    $data['email']=$email;
                    $data['password']=md5($cor_password);
                    $data['address_primary']=$address;
                    $data['division']=$city_name;
                    $data['device_token']='xxxxxx';
                    $data['credit']=0;
                    $data['status']=0;
                    $data['user_type']=0;
                    $new_client_id = DB::table('grocery_users')->insertGetId($data);
                    
                    $client_info=DB::table('grocery_users')->where('id',$new_client_id)->first();
                    $mailData = [
                        'pass' => $cor_password,
                        'name' => $client_info->name
                        ];
                    
                    Mail::to($email)->send(new NewPassEmail($mailData));
                }
                
                $client_id = $client_info->id;
                
            }
        
        $orderInfo=DB::table('nagad_order_info')->where('order_id',$tnxid)->first();
        if(!$orderInfo->client_id){
            $add_client_id = DB::table('nagad_order_info')->where('order_id',$tnxid)->update(['client_id'=>$client_id]);
            $client_info=DB::table('grocery_users')->where('id',$client_id)->first();
        }else{
            $client_info=DB::table('grocery_users')->where('id',$orderInfo->client_id)->first();  
        }
        

        

        // $cur_location="Location Unknown";
        // $cityID='1';
        // $city_name="Location Unknown";
        $client_id = $orderInfo->client_id;

        $data=array();

        $data['order_id']= $tnxid;
        $data['city_id']= $orderInfo->cityID;
        $data['city_name']= $orderInfo->city_name;
        $data['customer_name']= $client_info->name;
        $data['delivery_address']= $client_info->address_primary;
        $data['contact_number']= $client_info->mobile;
        $data['delivery_charge']=$orderInfo->delivery_charge;
        $d_n=$orderInfo->delivery_note;

        if($d_n!=""){
            $data['delivery_note']= $d_n;
        }
        else{
            $data['delivery_note']= 'N/A';
        }
        
        if($request->session()->get('client_id')){
             if($orderInfo->paymentFor==1){
            $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$orderInfo->client_id)->get();
            }elseif($orderInfo->paymentFor==2){
                $cart_info=DB::table('grocery_temp_cart')->where('client_id',$orderInfo->client_id)->get();
            }elseif($orderInfo->paymentFor==3){
                $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$orderInfo->client_id)->get();
            }elseif($orderInfo->paymentFor==4){
                $cart_info=DB::table('grocery_temp_cart')->where('client_id',$orderInfo->client_id)->get();
            }   
        }else{
            $guest_id = $request->session()->get('guest_id');
            if($orderInfo->paymentFor==2){
                $cart_info=DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->get();
            }elseif($orderInfo->paymentFor==4){
                $cart_info=DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->get();
            }   
        }
        
        
        $total_price_to_pay=0;

        foreach($cart_info as $cart){
            $total_price_to_pay+=$cart->total_price;
        }

        $data['order_data']=json_encode($cart_info);
        $data['client_id']=$client_id;
        $data['product_total']=$total_price_to_pay;

        $promo_amount= $orderInfo->promo_amount;

        if($promo_amount>0)
        {
            $data['discount']=$promo_amount;
            $data['total_amount']=$total_price_to_pay-$promo_amount;

            $data1=array();
            $data1['order_id']= $data['order_id'];
            $data1['promo_code']= $orderInfo->promo_code;
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
        
        if($request->session()->get('client_id')){
             if($orderInfo->paymentFor==1){
                DB::table('restaurant_orders')->insert($data);
                DB::delete("DELETE FROM restaurant_temp_cart WHERE client_id = $client_id");
            }elseif($orderInfo->paymentFor==2){
                DB::table('grocery_orders')->insert($data);
                DB::delete("DELETE FROM grocery_temp_cart WHERE client_id = $client_id");
            }elseif($orderInfo->paymentFor==3){
                DB::table('restaurant_orders')->insert($data);
                DB::delete("DELETE FROM restaurant_temp_cart WHERE client_id = $client_id");
            }elseif($orderInfo->paymentFor==4){
                DB::table('grocery_orders')->insert($data);
                DB::delete("DELETE FROM grocery_temp_cart WHERE client_id = $client_id");
            }   
        }else{
            $guest_id = $request->session()->get('guest_id');
            if($orderInfo->paymentFor==2){
                DB::table('grocery_orders')->insert($data);
                DB::delete("DELETE FROM grocery_temp_cart WHERE guest_id = $guest_id");
            }elseif($orderInfo->paymentFor==4){
                DB::table('grocery_orders')->insert($data);
                DB::delete("DELETE FROM grocery_temp_cart WHERE guest_id = $guest_id");
            }
        }
        

        $data1=array();
        $order = json_decode($verify->additionalMerchantInfo);
        $tnxid = $order->tnx_id;
        $data1['invoice_id']= $verify->orderId;
        $data1['orderId']= $tnxid;
        $data1['amount']= $verify->amount;
        $data1['status']= $verify->status;

        DB::table('nagad_invoice_id')->insert($data1);

        $user_data2 = array();
        $user_data2['invoice_id'] = $verify->orderId;
        $user_data2['status'] ='Complete';
        DB::table('nagad_order_info')->where('id',$orderInfo->id)->update($user_data2);

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
