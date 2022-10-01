<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;

class PromoController extends Controller
{
    public function grocery_promo_details(Request $request,$id)
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

        $title="Promo Details -Naturex";
        $promo_id = base64_decode($id);
        $promo_info=DB::table('grocery_promo')->where('id',$promo_id)->where('status',1)->where('activeSatus',1)->first();
        $made_products=DB::table('grocery_products')->where('cityID',$cityID)->where('status',"Active")->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->inRandomOrder()->limit(8)->get();
        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('grocery.promo.promo_details',compact('title','promo_info','made_products','category_all','cur_location'));

    }

    public function applyPromo(Request $request)
    {
        $client_id=$request->session()->get('client_id');
        $cart_info=DB::table('grocery_temp_cart')->where('client_id',$client_id)->get();
        $total_price_to_pay=0;

        foreach($cart_info as $cart){
            $total_price_to_pay+=$cart->total_price;
        }

        $promoCode= $request->promo_code;
        $data=DB::select("SELECT * FROM grocery_promo WHERE promo_code='$promoCode' AND start <= CURDATE() AND end > CURDATE() AND conditions_amount<='$total_price_to_pay' AND status=1 AND activeSatus=1 LIMIT 1;");

        if($data)
        {
            $request->session()->put('promo_code', $promoCode);
            if($data[0]->promo_type==1)
            {
                $request->session()->put('promo_amount', $data[0]->amount);
            }
            elseif ($data[0]->promo_type==2)
            {
                $promo_amount = ($total_price_to_pay * $data[0]->amount)/100;
                $request->session()->put('promo_amount', $promo_amount);
            }

            return redirect('/checkout?')->with([
                'error' => false,
                'message' => 'Promo Code Added!'
            ]);
        }
        else
        {

            $request->session()->put('promo_code', "");
            $request->session()->put('promo_amount', 0);

            return redirect('/checkout?')->with([
                'error' => true,
                'message' => 'This Promo Code is Invalid!'
            ]);
        }


    }

    public function resApplyPromo(Request $request)
    {
        $client_id=$request->session()->get('client_id');
        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->get();
        $total_price_to_pay=0;

        foreach($cart_info as $cart){
            $total_price_to_pay+=$cart->total_price;
        }

        $promoCode= $request->promo_code;
        $data=DB::select("SELECT * FROM restaurant_promo WHERE promo_code='$promoCode' AND start <= CURDATE() AND end > CURDATE() AND conditions_amount<='$total_price_to_pay' AND status=1 AND activeSatus=1 LIMIT 1;");

        if($data)
        {
            $request->session()->put('promo_code', $promoCode);
            
            if($data[0]->promo_type==1)
            {
                $request->session()->put('promo_amount', $data[0]->amount);
            }
            elseif ($data[0]->promo_type==2)
            {
                $promo_amount = ($total_price_to_pay * $data[0]->amount)/100;
                $request->session()->put('promo_amount', $promo_amount);
            }
            return redirect('/checkout?')->with([
                'error' => false,
                'message' => 'Promo Code Added!'
            ]);
        }
        else
        {

            $request->session()->put('promo_code', "");
            $request->session()->put('promo_amount', 0);

            return redirect('/checkout?')->with([
                'error' => true,
                'message' => 'This Promo Code is Invalid!'
            ]);
        }


    }

    public function removePromo(Request $request)
    {
        $request->session()->put('promo_code', "");

        $request->session()->put('promo_amount', 0);

        return redirect('/checkout?')->with([
            'error' => false,
            'message' => 'Promo Code Removed!'
        ]);
    }

    public function resRemovePromo(Request $request)
    {
        $request->session()->put('promo_code', "");

        $request->session()->put('promo_amount', 0);

        return redirect('/resCheckout?')->with([
            'error' => false,
            'message' => 'Promo Code Removed!'
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
