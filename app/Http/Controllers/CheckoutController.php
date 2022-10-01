<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $ip = $this->getIp();
        $locate = \Location::get($ip);
        if($locate){
            $cur_location=$locate->cityName.', '.$locate->countryName;
            $city_info=DB::table('grocery_city')->where('city_name',$locate->cityName)->where('status',"Active")->first();
            if($city_info){
                $cityID=$city_info->id;
            }
            else{

                $cityID=1;
            }
        }
        else{
            $cur_location="Location Unknown";
            $cityID=1;
        }

        $client_id=$request->session()->get('client_id');
        $title="Checkout";
        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();
        if($client_id){
        $client_info=DB::table('grocery_users')->where('id',$client_id)->first();    
        $cart_info=DB::table('grocery_temp_cart')->where('client_id',session('client_id'))->get();
        }else{
        $cart_info=DB::table('grocery_temp_cart')->where('guest_id',session('guest_id'))->get();
        $client_info = (object)[
                    'name' => '',
                    'mobile' => '',
                    'email' => '',
                    'address_primary' => '',
                    'division' => ''
                ];
        };
        
       
        $total_price_to_pay=0;
        $total_items=count($cart_info);
        foreach($cart_info as $cart){
            $total_price_to_pay+=$cart->total_price;
        }

        $promo_code=$request->session()->get('promo_code');
        $promo_amount=$request->session()->get('promo_amount');

        if($promo_amount>0)
        {
            $datas=DB::select("SELECT * FROM grocery_promo WHERE promo_code='$promo_code' AND start <= CURDATE() AND end > CURDATE() AND conditions_amount<='$total_price_to_pay' AND status=1 AND activeSatus=1 LIMIT 1;");

            if($datas)
            {
                if($datas[0]->promo_type==1)
                {
                    $request->session()->put('promo_amount', $datas[0]->amount);
                }
                elseif ($datas[0]->promo_type==2)
                {
                    $promo_amount = ($total_price_to_pay * $datas[0]->amount)/100;
                    $request->session()->put('promo_amount', $promo_amount);
                }
            }
            else
            {

                $request->session()->put('promo_code', "");
                $request->session()->put('promo_amount', 0);
            }
        }
        
        $deliveryCharge = 0;
        $alreadySetDeliveryZone=$request->session()->get('delivery_zone');
        if($alreadySetDeliveryZone==""){
            $deliveryCharge = 60;
            $request->session()->put('delivery_zone', 1);
        }else{
            if($alreadySetDeliveryZone ==1){
                $deliveryCharge = 60;
                $request->session()->put('delivery_zone', 1);
            }else if($alreadySetDeliveryZone ==2){
                $deliveryCharge = 75;
                $request->session()->put('delivery_zone', 2);
            }else if($alreadySetDeliveryZone ==3){
                $deliveryCharge = 110;
                $request->session()->put('delivery_zone', 3);
            }
        }
        
        // if ($locate->cityName == "Dhaka" || $locate->cityName == "Rangpur") {
        //     if ($total_price_to_pay <= 999) {
        //         $deliveryCharge = 45;
        //     } else if ($total_price_to_pay <= 1999) {
        //         $deliveryCharge = 65;
        //     } else {
        //         $deliveryCharge = 80;
        //     }
        //     // if ($price <= 2499) {
        //     //     $deliveryCharge = 78;
        //     // } else if ($price <= 4000) {
        //     //     $deliveryCharge = 92;
        //     // } else {
        //     //     $deliveryCharge = 110;
        //     // }
        //     // if ($price >= 1400) {
        //     //     $deliveryCharge = 7;
        //     // } else {
        //     //     if ($price <= 2499) {
        //     //         $deliveryCharge = 78;
        //     //     } else if ($price <= 4000) {
        //     //         $deliveryCharge = 92;
        //     //     } else {
        //     //         $deliveryCharge = 110;
        //     //     }
        //     // }
        // } else {
        //     if ($total_price_to_pay <= 999) {
        //         $deliveryCharge = 48;
        //     } else if ($total_price_to_pay <= 1999) {
        //         $deliveryCharge = 58;
        //     } else if ($total_price_to_pay <= 2999) {
        //         $deliveryCharge = 68;
        //     } else if ($total_price_to_pay <= 4999) {
        //         $deliveryCharge = 85;
        //     } else {
        //         $deliveryCharge = 100;
        //     }
        //     // if ($price >= 700) {
        //     //     $deliveryCharge = 7;
        //     // } else {
        //     //     if ($price <= 999) {
        //     //         $deliveryCharge = 48;
        //     //     } else if ($price <= 1999) {
        //     //         $deliveryCharge = 58;
        //     //     } else if ($price <= 2999) {
        //     //         $deliveryCharge = 68;
        //     //     } else if ($price <= 4999) {
        //     //         $deliveryCharge = 85;
        //     //     } else {
        //     //         $deliveryCharge = 100;
        //     //     }
        //     // }
        // }
        
        $request->session()->put('delivery_charge', $deliveryCharge);
        
        if($total_items>0){
            return view('grocery.checkout.checkout',compact('title','category_all','client_info','total_price_to_pay','total_items','cur_location'));
        }
        else{
            return redirect('/cart');
        }
        
    }
    
     public function ChangeDeliveryZon(Request $request){
        $client_id=$request->session()->get('client_id');
        if($request->deliveryZone == 1){
            $request->session()->put('delivery_charge', 60);
            $request->session()->put('delivery_zone', 1);
        }elseif($request->deliveryZone == 2){
            $request->session()->put('delivery_charge', 75);
            $request->session()->put('delivery_zone', 2);
        }elseif($request->deliveryZone == 3){
            $request->session()->put('delivery_charge', 110);
            $request->session()->put('delivery_zone', 3);
        }
        return response()->json([
            'error' => false,
            'message' => 'Change Delivery Zone',
        ]);
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
