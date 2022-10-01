<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPassEmail;
use Session;
use Stevebauman\Location\Facades\Location;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
//        dd($request->all());

        $name=$request->input('name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $dob=$request->input('dob');
        $address=$request->input('address');
        $password=$request->input('password');
        $con_password=$request->input('con_password');

        $ip = $this->getIp();
        $locate = Location::get($ip);
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

//        dd($age);

        if($password == $con_password){
            $cor_password=md5($password);

            $result=DB::table('grocery_users')
                ->where('email',$email)
                ->first();

            if($result){

                $message = array('message' => 'Email Already Exists!', 'title' => 'Signup');
                return response()->json($message);

            }
            else{

                $result1=DB::table('grocery_users')
                        ->where('mobile',$phone)
                        ->first();
                    if($result1){
                        $message = array('message' => 'Phone Number Already Exists!', 'title' => 'Signup');
                        return response()->json($message);
                    }
                    else{

                        $data=array();
                        $data['name']=$name;
                        $data['mobile']=$phone;
                        $data['email']=$email;
                        $data['dob']=$dob;
                        $data['password']=$cor_password;
                        $data['address_primary']=$address;
                        $data['division']=$city_name;
                        $data['device_token']='xxxxxx';
                        $data['credit']=0;
                        $data['status']=0;
                        $data['user_type']=0;
                        $insert_user = DB::table('grocery_users')->insert($data);

                        if($insert_user){
                            $message = array('message' => 'User Added!', 'title' => 'Signup');
                            return response()->json($message);
                        }
                        else{
                            $message = array('message' => 'Something Went Wrong!', 'title' => 'Signup');
                            return response()->json($message);
                        }
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

}
