<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPassEmail;

use Illuminate\Support\Facades\Validator;
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
                $city_name='Location Unknown';
            }
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        else{
            $cur_location="Location Unknown";
            $cityID=1;
            $city_name="Location Unknown";
        }

    
        $promo_code=$request->session()->get('promo_code');
        $promo_amount=$request->session()->get('promo_amount');
        $client_id=$request->session()->get('client_id');
        $guest_id=$request->session()->get('guest_id');
        if($client_id){
        $client_info=DB::table('grocery_users')->where('id',$client_id)->first();    
        }else{
            
            $validator = Validator::make($request->all(),[
                'name' => 'required|max:40',
                'email' => 'required|email:rfc',
                'mobile' => 'numeric|min:11',
                'address_primary' => 'required|max:100',
                'division' => 'required'
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        
            $client_info =(object)[
                'name' => $request->name,
                'mobile'=> $request->mobile,
                'email'=> $request->email,
                'address_primary'=> $request->address_primary,
                'city_name' => $city_name,
                'division' => $request->division
                ];
        
            $client_id = $this->createUser($client_info);
            
        }
        


        $data=array();
        $data['order_id']= 'KTW-'.date('md').'-'.strtoupper(Str::random(4));
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
        
        if(session('client_id')){
            $cart_info=DB::table('grocery_temp_cart')->where('client_id',$client_id)->get(); 
            
        }else{
           $cart_info=DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->get();
        }
        
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

        $insert_order = DB::table('grocery_orders')->insert($data);
        if(session('client_id')){
            $removed_temp_cart=DB::delete("DELETE FROM grocery_temp_cart WHERE client_id = $client_id");
            
        }else{
            $removed_temp_cart = DB::table('grocery_temp_cart')->where('guest_id', session('guest_id'))->delete();
        }

        


        if(!session('client_id')){
            return view('grocery.order.guest_order_success', ['order_id' => $data['order_id']]);
        }else{
           return redirect('/MyOrder')->with([
            'error' => false,
            'message' => 'Checkout successfully.'
        ]); 
        }
        
    }
    
    public function createUser($client_info){
        
        
        $result=DB::table('grocery_users');
        
        $email_exists = $result->where('email',$client_info->email)->first();

            if($email_exists){

                //send mail 
                
                $id = $email_exists->id;
                
                //dd('i found you',$id);

            }else{
                $rand = rand(10000,99999);
                $data=array();
                $data['name']=$client_info->name;
                $data['mobile']=$client_info->mobile;
                $data['email']=$client_info->email;
                $data['password']=md5($rand);
                $data['address_primary']=$client_info->address_primary;
                $data['division']=$client_info->division;
                $data['device_token']='xxxxxx';
                $data['credit']=0;
                $data['status']=0;
                $data['user_type']=0;
                $insert_user = DB::table('grocery_users')->insertGetId($data);
                
                $id = $insert_user;
                $mailData = [
                    'pass' => $rand,
                    'name' => $client_info->name
                    ];
                
                Mail::to($client_info->email)->send(new NewPassEmail($mailData)); 
                
            }
            
            return $id;
        
    }

    public function MyOrderNew(Request $request)
    {
        $title="My Order Product-Naturex";
        $client_id=$request->session()->get('client_id');
        if(!$client_id){
            return view('grocery.order.guest_order_success', ['order_id' => $request->session()->get('guest_order_id')]);
        }

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

        $myOrder=DB::table('grocery_orders')->where('client_id',$client_id)->orderBy('id', 'DESC')->get();
        $pendingOrder=DB::table('grocery_orders')->where('client_id',$client_id)->where('order_status','Pending')->orderBy('id', 'DESC')->get();
        $completeOrder=DB::table('grocery_orders')->where('client_id',$client_id)->where('order_status','Delivered')->orderBy('id', 'DESC')->get();
        $ongoingOrder=DB::table('grocery_orders')->where('client_id',$client_id)->where('order_status','Ongoing')->orderBy('id', 'DESC')->get();
        $cancelOrder=DB::table('grocery_orders')->where('client_id',$client_id)->where('order_status','Cancelled')->orderBy('id', 'DESC')->get();

        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('grocery.order.myorder',compact('title','myOrder','pendingOrder','completeOrder','ongoingOrder','cancelOrder','category_all','cur_location'));

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
