<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotEmail;
use App\Mail\NewPassEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;







class SigninController extends Controller
{
    
    public function signinInit(){
        $marketingBanners = DB::table('grocery_marketing_banners')->where('status', 1)->orderBy('id','desc')->limit(3)->get();
        return view('grocery.signin.signin',compact('marketingBanners'));
    }
    public function signin(Request $request)
    {
        $email=$request->input('email');
        $password=md5($request->input('password'));
        $result=DB::table('grocery_users')
                ->where('email',$email)
                ->where('password',$password)
                ->first();



                if($result)
                {
                    $request->session()->put('client_name', $result->name);
                    $request->session()->put('client_id', $result->id);
                    $request->session()->put('client_phone', $result->mobile);
                    $request->session()->put('client_email', $result->email);
                    $request->session()->put('client_img', $result->user_img);
                    
                    // Session::forget('guest_id');
                    
                    //Updating existing cart before login cart 
                    $guest_id = $request->session()->get('guest_id');
                    $client_id = $request->session()->get('client_id');
                    
                    if($guest_id){
                       
                        // $getClientCart = DB::table('grocery_temp_cart')->where('client_id',$client_id)->get();
                        // $getGuestCart= DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->pluck('product_id');
                        // $guestProductIds = collect($getGuestCart)->toArray();
                        
                        $getGuestCart= DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->get();
                        $getClientCart = DB::table('grocery_temp_cart')->where('client_id',$client_id)->pluck('product_id');
                         
                        $clientProductIds = collect($getClientCart)->toArray();
                        
                        if($getGuestCart){
                            
                            foreach($getGuestCart as $key=> $singleguestCart){
                                
                                $productId = $singleguestCart->product_id;
                                if( in_array( $productId ,$clientProductIds ) )
                                {
                                    $singleClientCart = DB::table('grocery_temp_cart')->where('product_id',$productId)->where('client_id',$client_id)->first();
                                  
                                    $newQuantityTotal =  ($singleguestCart->quantity)+($singleClientCart->quantity);
                                    $newPriceTotal =  ($singleguestCart->total_price)+($singleClientCart->total_price);
          
                                    $updateSingleClientCart = DB::table('grocery_temp_cart')->where('id',$singleClientCart->id)
                                    ->update(['quantity' => $newQuantityTotal, 'total_price'=>$newPriceTotal]);
                                    
                                    DB::table('grocery_temp_cart')->where('id',$singleguestCart->id)->delete();
                                }else{
                                    $updateGuestCart = DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->update(['client_id' => $client_id]);
                                    
                                }
                              
                            }
                            
                            
                        }
                        
                        

                        //if($getClientCart){
                            // foreach($getClientCart as $key=> $product){
                            //     $productId = $product->product_id;
                            //     if( in_array( $productId ,$guestProductIds ) )
                            //     {
                            //         $singleGuestCart = DB::table('grocery_temp_cart')->where('product_id',$productId)->where('guest_id',$guest_id)->first();
                                  
                            //         $newQuantityTotal =  ($product->quantity)+($singleGuestCart->quantity);
          
                            //         $updateGuestCart = DB::table('grocery_temp_cart')->where('id',$product->id)
                            //         ->update(['quantity' => $newQuantityTotal]);
                            //     }else{
                            //         $updateGuestCart = DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->update(['client_id' => $result->id]);
                                    
                            //     }
                            // }
                        //}
                        
                    }
                    

                    // print_r($client_phone1);
                    $message = array('message' => 'Logged in!', 'title' => 'Login');
                    return response()->json($message);
                }
                else
                {
                    $message = array('message' => 'Wrong Email or Password!', 'title' => 'Login');
                    return response()->json($message);

    }


    }
    
    public function quickSign(Request $request)
    {
        $email=$request->input('email');
        $password=md5($request->input('password'));
        $isUserExist=DB::table('grocery_users')->where('email',$email)->first();
        if($isUserExist){
            $result=DB::table('grocery_users')->where('email',$email)->where('password',$password)->first();
            if($result)
            {
                
                $request->session()->put('client_name', $result->name);
                $request->session()->put('client_id', $result->id);
                $request->session()->put('client_phone', $result->mobile);
                $request->session()->put('client_email', $result->email);
                $request->session()->put('client_img', $result->user_img);
                
                // Session::forget('guest_id');
                
                //Updating existing cart before login cart 
                $guest_id = $request->session()->get('guest_id');
                $client_id = $request->session()->get('client_id');
                
                if($guest_id){
                   
                    $this->updateGuestProduct();
                    
                }
                

                // print_r($client_phone1);
                $message = array('message' => 'Logged in!', 'title' => 'Login');
                return response()->json($message);
            }
            else
            {
                $message = array('message' => 'Wrong Email or Password!', 'title' => 'Login');
                return response()->json($message);
            }
        }else{
            $data = $request->all();
            $signup = $this->signUp($data);
            if($signup['status'] == true && $signup['client_id']){
                
                $request->session()->put('client_name', $signup['name']);
                $request->session()->put('client_id', $signup['client_id']);
                $request->session()->put('client_phone', $signup['mobile']);
                $request->session()->put('client_email', $signup['email']);
                $request->session()->put('client_img', 'demo.jpg');
                
                // Session::forget('guest_id');
                
                //Updating existing cart before login cart 
                $guest_id = $request->session()->get('guest_id');
                $client_id = $request->session()->get('client_id');
                
                if($guest_id){
                   
                    $this->updateGuestProduct();
                    
                }
                

                // print_r($client_phone1);
                $message = array('message' => 'Logged in!', 'title' => 'Login');
                return response()->json($message);
                
            }
        }
        
    }
    
    public function updateGuestProduct(){
        $guest_id = Session::get('guest_id');
        $client_id = Session::get('client_id');
        
        if($guest_id)
        {
            // $getClientCart = DB::table('grocery_temp_cart')->where('client_id',$client_id)->get();
            // $getGuestCart= DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->pluck('product_id');
            // $guestProductIds = collect($getGuestCart)->toArray();
            
            $getGuestCart= DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->get();
            $getClientCart = DB::table('grocery_temp_cart')->where('client_id',$client_id)->pluck('product_id');
             
            $clientProductIds = collect($getClientCart)->toArray();
            
            if($getGuestCart){
                
                foreach($getGuestCart as $key=> $singleguestCart){
                    
                    $productId = $singleguestCart->product_id;
                    if( in_array( $productId ,$clientProductIds ) )
                    {
                        $singleClientCart = DB::table('grocery_temp_cart')->where('product_id',$productId)->where('client_id',$client_id)->first();
                      
                        $newQuantityTotal =  ($singleguestCart->quantity)+($singleClientCart->quantity);
                        $newPriceTotal =  ($singleguestCart->total_price)+($singleClientCart->total_price);

                        $updateSingleClientCart = DB::table('grocery_temp_cart')->where('id',$singleClientCart->id)
                        ->update(['quantity' => $newQuantityTotal, 'total_price'=>$newPriceTotal]);
                        
                        DB::table('grocery_temp_cart')->where('id',$singleguestCart->id)->delete();
                    }else{
                        $updateGuestCart = DB::table('grocery_temp_cart')->where('guest_id',$guest_id)->update(['client_id' => $client_id]);
                        
                    }
                  
                }
                
                
            }
            
            
        }
        
    }
    
    public function signUp($request)
    {
        parse_str($request['formData'], $formArray);

        $name=$formArray['name'];
        $email=$formArray['email'];
        $phone=$formArray['mobile'];
        $address=$formArray['address_primary'];
        $password=$request['password'];
        $con_password=$request['password'];

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
                $city_name="Location Unknown";
            }
        }
        else{
            $cur_location="Location Unknown";
            $cityID=1;
            $city_name="Location Unknown";
        }

        if($password == $con_password){
            $cor_password=md5($password);

            $result=DB::table('grocery_users')
                ->where('email',$email)
                ->first();

            if($result){
                return [
                        'status' => false,
                        'client_id' =>null
                    ];

            }
            else{

                    $result1=DB::table('grocery_users')
                        ->where('mobile',$phone)
                        ->first();
                    
                        $data=array();
                        $data['name']=$name;
                        $data['mobile']=$phone;
                        $data['email']=$email;
                        $data['password']=$cor_password;
                        $data['address_primary']=$address;
                        $data['division']=$city_name;
                        $data['device_token']='xxxxxx';
                        $data['credit']=0;
                        $data['status']=0;
                        $data['user_type']=0;
                        $new_client_id = DB::table('grocery_users')->insertGetId($data);

                        if($new_client_id){
                            return [
                                'status' => true,
                                'client_id' =>$new_client_id,
                                'mobile' => $phone,
                                'email' => $email,
                                'name' => $name
                                
                            ];
                        }
                        else{
                            return [
                                'status' => false,
                                'client_id' =>null
                            ];
                        }
                    



            }


        }
        else{
            $message = array('message' => 'Password and Confirm Password does not Match!', 'title' => 'Signup');
            return response()->json($message);
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


    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }
    
    public function forgotPassword(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'email' => 'email:rfc|required|max:100',
        ]);

        if ($validator->fails()) {
            $message = array('message' => 'Email Is required', 'title' => 'Forgot','status'=> false);
             return $message;
        }
        $user =DB::table('grocery_users')
                ->where('email',$request->email)
                ->first();
                
        if(!$user){
       
            $message = array('message' => 'Registered user not found', 'title' => 'Forgot','status'=> false);
             return $message;
        }
        
        $email = $user->email;
        $otp = rand(100000, 999999);
        $url = url("/reset-pass?email=$email&otp=$otp");
        $data = [
            'otp' => $otp,
            'url' => $url,
            'name' => $user->name
            ];
        Mail::to($email)->send(new ForgotEmail($data));
        $insertData =[];
        $insertData['email']=$email;
        $insertData['otp']=$otp;
        DB::table('grocery_password_resets')->insert($insertData);
        
            $message = array('message' => 'password Reset link sent to your email', 'title' => 'Forgot','status'=> true);
             return $message;
        
    }
    
    public function resetPassword(Request $request){
        
        $result=DB::table('grocery_password_resets')
                ->where('email',$request->email)
                ->where('otp',$request->otp)
                ->first();
        if(!$result){
            return"Invalid / Expired Link";
        }
        
        //$actual_start_at = Carbon::parse($result->created_at);
        $actual_end_at = Carbon::createFromFormat('Y-m-d H:i:s', $result->created_at)->addMinutes(5);
        
        $current_time =Carbon::now();
       
        $mins = $actual_end_at->diffInMinutes($current_time, true);
        if($mins>5){
            DB::table('grocery_password_resets')
              ->where('email', $result->email)->delete();
            return"link expired";
        }
        $rand = rand(10000,99999);
        $newPass = md5($rand);
        
        $affected = DB::table('grocery_users')
              ->where('email', $result->email);
        $user= $affected->first();
        $affected->update(['password' => $newPass]);
        $mailData = [
            'pass' => $rand,
            'name' => $user->name
            ];
        
        Mail::to($result->email)->send(new NewPassEmail($mailData)); 
        DB::table('grocery_password_resets')
              ->where('email', $result->email)->delete();
        
        return view('grocery.forgot.success');
       
    }
    
    public function resetsuccess($email,$otp){
        $result=DB::table('grocery_password_resets')
                ->where('email',$email)
                ->where('otp',$otp)
                ->first();
        if(!$result){
            return'invaid link';
        }
        
              
        
        
    }
}
