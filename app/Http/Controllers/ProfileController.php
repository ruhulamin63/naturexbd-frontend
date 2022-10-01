<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;

class ProfileController extends Controller
{
    public function profile(Request $request)
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

        $title="Profile -Naturex";
        $client_id=$request->session()->get('client_id');
        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();

        $user_info=DB::table('grocery_users')
            ->where('id',$client_id)
            ->first();

        return view('grocery.profile.my_account',compact('title','user_info','category_all','cur_location'));
    }

    public function update_profile(Request $request)
    {
        $client_id=$request->session()->get('client_id');

        $data=array();
        $data['name']=$request->name;
        $data['mobile']=$request->mobile;
        $data['email']=$request->email;
        $data['address_primary']=$request->address;

        $update_user = DB::table('grocery_users')->where('id',$client_id)->update($data);

        if($update_user){
            $request->session()->put('client_name', $request->name);
            $request->session()->put('client_phone', $request->mobile);
            $request->session()->put('client_email', $request->email);
        }

        return redirect('/profile');
    }

    public function change_address(Request $request)
    {
        $client_id=$request->session()->get('client_id');

        $data=array();
        $data['address_primary']=$request->new_address;
        $update_user = DB::table('grocery_users')->where('id',$client_id)->update($data);

        return redirect()->back();
    }

    public function change_profile_pic(Request $request)
    {
        $client_id=$request->session()->get('client_id');
        $client_info=DB::table('grocery_users')
            ->where('id',$client_id)
            ->first();
        $old_image= $client_info->user_img;
        $image = $request->file('client_image');

        if(($image)){

        if(file_exists("user_images/".$old_image)){
        unlink("user_images/".$old_image);
        }

        $data=array();

        $image_name=$image->getClientOriginalName();
        $image_ext=$image->getClientOriginalExtension();
        $image_new_name =hexdec(uniqid());
        $image_full_name=$image_new_name.'.'.$image_ext;
        $upload_path='user_images/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['user_img']=$image_full_name;

        $update_pic= DB::table('grocery_users')
                            ->where('id',$client_id)
                            ->update($data);

        if($update_pic){
            $request->session()->put('client_img', $image_full_name);
        }

        return Redirect('/profile');

        }
        else{
            return Redirect('/profile');
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
