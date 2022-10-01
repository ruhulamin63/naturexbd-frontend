<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;

class RestaurantController extends Controller
{
    public function restaurant_details(Request $request,$id)
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

        $title="Restaurant Details -Naturex";
        $res_id = base64_decode($id);
        $restaurantInfo=DB::table('restaurant_restaurantList')
                    ->join('restaurant_property', 'restaurant_restaurantList.id', '=', 'restaurant_property.resId')
                    ->select('restaurant_restaurantList.*', 'restaurant_property.*')
                    ->where('restaurant_restaurantList.id',$res_id)->where('restaurant_restaurantList.status',1)
                    ->first();

        $res_products=DB::table('restaurant_products')->where('cityID',$cityID)->where('status',1)->where('resId',$res_id)->get();
        
        $category_all=DB::table('restaurant_product_category')->where('status',1)->get();

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('restaurant.layouts.restaurantDetails',compact('title','restaurantInfo','res_products','category_all','cur_location'));

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
