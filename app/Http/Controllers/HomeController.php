<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;

class HomeController extends Controller
{

    public function homePageSelect()
    {
        $title="Naturex";

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
        $marketingBanners = DB::table('grocery_marketing_banners')->where('status', 1)->orderBy('id','desc')->limit(3)->get();
       $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();
        $promo_all=DB::select("SELECT * FROM grocery_promo WHERE status=1 AND activeSatus=1;");
        //$promo_all=DB::table('grocery_promo')->where('start','<=',Carbon::today())->where('end','>',Carbon::today())->where('status',1)->where('activeSatus',1);
        $homepage_banners = DB::table('grocery_homepage_banners')->where('status', 1)->orderBy('id','desc')->limit(3)->get();
    
        $MaintenanceInfo=DB::table('server_maintenance')->first();

        if($MaintenanceInfo->status==1){
            return view('serverMaintenance',compact('title','MaintenanceInfo'));
        }

        return view('homeMain',compact('title','category_all','promo_all','cur_location','cityID','homepage_banners'));

    }
    
    public function groceryIndex()
    {
        $title="Naturex";

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

        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();
        //$promo_all=DB::select("SELECT * FROM grocery_promo WHERE start <= CURDATE() AND end > CURDATE() AND status=1 AND activeSatus=1;");
        
        //roni's code
         $promo_all = DB::table('grocery_marketing_banners')->where('status', 1)->orderBy('id','desc')->limit(3)->get();
         $homepage_banners = DB::table('grocery_homepage_banners')->where('status', 1)->orderBy('id','desc')->limit(3)->get();
         
         
        //$promo_all=DB::table('grocery_promo')->where('start','<=',Carbon::today())->where('end','>',Carbon::today())->where('status',1)->where('activeSatus',1);
        $feature_products=DB::table('grocery_products')->where('cityID',$cityID)->where('product_type',2)->where('status',"Active")->orderBy('id','DESC')->paginate(16);
        //$made_products=DB::table('grocery_products')->where('cityID',$cityID)->where('status',"Active")->inRandomOrder()->limit(32)->get();
        $recommended_category=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->inRandomOrder()->limit(3);
        $countCat = $recommended_category->count();
        $recommended_category = $recommended_category->get();
        if($countCat>=3){
            $recommended_products1=DB::table('grocery_products')->where('cityID',$cityID)->where('category',$recommended_category[0]->category)->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->orderBy('id','desc')->inRandomOrder()->limit(3)->get();
        
            $recommended_products2=DB::table('grocery_products')->where('cityID',$cityID)->where('category',$recommended_category[1]->category)->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->orderBy('id','desc')->inRandomOrder()->limit(3)->get();
    
            $recommended_products3=DB::table('grocery_products')->where('cityID',$cityID)->where('category',$recommended_category[2]->category)->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->orderBy('id','desc')->inRandomOrder()->limit(3)->get();

        }else{
            $recommended_products1 = [];
            $recommended_products2 = [];
            $recommended_products3 = [];
            
        }
        $special_offer_is_active=0;
        $special_offer_list=DB::table('grocery_seasonal_products')->where('status',1)->get();
        
        foreach($special_offer_list as $offer)
        {
            $special_offer_exist=DB::table('grocery_products')->where('status',"Active")->where('cityID',$cityID)->where('seasonal_id',$offer->id)->get();
            if(count($special_offer_exist)>0)
            {
                $special_offer_is_active=1;
                break;
            }
        }

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('grocery.home.home',compact('title','category_all','promo_all','feature_products','recommended_category','recommended_products1','recommended_products2','recommended_products3','special_offer_list','special_offer_is_active','cur_location','cityID','homepage_banners'));

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
