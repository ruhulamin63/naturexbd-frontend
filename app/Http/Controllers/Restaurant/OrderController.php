<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function place_order(Request $request)
    {
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

        $client_id=$request->session()->get('client_id');
        $promo_code=$request->session()->get('promo_code');
        $promo_amount=$request->session()->get('promo_amount');

        $client_info=DB::table('grocery_users')->where('id',$client_id)->first();


        $data=array();
        $data['order_id']= 'KTR-'.date('md').'-'.strtoupper(Str::random(4));
        $data['city_id']= $cityID;
        $data['city_name']= $city_name;
        $data['customer_name']= $client_info->name;
        $data['delivery_address']= $client_info->address_primary;
        $data['contact_number']= $client_info->mobile;
        $data['delivery_charge']=$request->session()->get('delivery_charge');
        if($request->delivery_note!=""){
            $data['delivery_note']= $request->delivery_note;
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
            $data['total_amount']=$total_price_to_pay-$promo_amount + $data['delivery_charge'];

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


        $data['order_status']='Pending';
        $data['order_remarks']='N/A';
        $data['scheduled_date']=date('d-M-Y', strtotime('+1 day', strtotime(date('Y-m-d'))));
        $data['created_at']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');

        $insert_order = DB::table('restaurant_orders')->insert($data);

        $removed_temp_cart=DB::delete("DELETE FROM restaurant_temp_cart WHERE client_id = $client_id");



        return redirect('/res_MyOrder')->with([
            'error' => false,
            'message' => 'Checkout successfully.'
        ]);
    }

    public function MyAllOrder(Request $request)
    {
        $title="My Order Product | Restaurant | Naturex";
        $client_id=$request->session()->get('client_id');

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

        $myOrder=DB::table('restaurant_orders')->where('client_id',$client_id)->orderBy('id', 'DESC')->get();
        $pendingOrder=DB::table('restaurant_orders')->where('client_id',$client_id)->where('order_status','Pending')->orderBy('id', 'DESC')->get();
        $completeOrder=DB::table('restaurant_orders')->where('client_id',$client_id)->where('order_status','Delivered')->orderBy('id', 'DESC')->get();
        $ongoingOrder=DB::table('restaurant_orders')->where('client_id',$client_id)->where('order_status','Ongoing')->orderBy('id', 'DESC')->get();
        $cancelOrder=DB::table('restaurant_orders')->where('client_id',$client_id)->where('order_status','Cancelled')->orderBy('id', 'DESC')->get();

        $category_all=DB::table('restaurant_product_category')->where('status',1)->get();

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('restaurant.order.myorder',compact('title','myOrder','pendingOrder','completeOrder','ongoingOrder','cancelOrder','category_all','cur_location'));

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
