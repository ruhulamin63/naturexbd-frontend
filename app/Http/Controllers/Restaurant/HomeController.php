<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $title="Restaurant | Naturex";

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

        $category_all=DB::table('restaurant_product_category')->where('status',1)->get();
        $topRestaurant=DB::table('restaurant_restaurantList')
                    ->join('restaurant_property', 'restaurant_restaurantList.id', '=', 'restaurant_property.resId')
                    ->select('restaurant_restaurantList.*', 'restaurant_property.*')
                    ->where('restaurant_restaurantList.cityID',$cityID)->where('restaurant_restaurantList.status',1)
                    ->orderBy('restaurant_restaurantList.id','desc')->inRandomOrder()->limit(5)->get();

        $feature_products=DB::table('restaurant_products')->where('cityID',$cityID)->where('type',2)->where('status',1)->orderBy('id','DESC')->paginate(16);
        
        return view('restaurant.home.home',compact('title','category_all','topRestaurant','feature_products','cur_location','cityID'));

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
