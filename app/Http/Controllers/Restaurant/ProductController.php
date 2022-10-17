<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;

class ProductController extends Controller
{

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

    public function seeAllFood()
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

        $title="All Food | Restaurant | Naturex";
        $category_all=DB::table('restaurant_product_category')->where('status',1)->get();
        $products=DB::table('restaurant_products')->where('cityID',$cityID)->where('status',1)->orderBy('id','DESC')->paginate(40);

        return view('restaurant.Product.seeAllResProducts',compact('title','category_all','products','cur_location'));

    }

    public function restaurant_product_details(Request $request,$id)
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

        $title="Product Details | Restaurant | Naturex";
        $product_id = base64_decode($id);
        $product_info=DB::table('restaurant_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',1)->first();
        $made_products=DB::table('restaurant_products')->where('cityID',$cityID)->where('status',1)->inRandomOrder()->limit(8)->get();
        $category_all=DB::table('restaurant_product_category')->where('status',1)->get();

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('restaurant.Product.product_details',compact('title','product_info','made_products','category_all','cur_location'));

    }

    public function restaurant_product_category(Request $request,$category)
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

        $title="Product by Category | Restaurant | Naturex";

        $category_all=DB::table('restaurant_product_category')->where('status',1)->get();
        $categoryName=DB::table('restaurant_product_category')->where('id',$category)->first();
        $products=DB::table('restaurant_products')->where('cityID',$cityID)->where('category',$category)->where('status',1)->orderBy('id','desc')->paginate(40);

        return view('restaurant.Product.listing',compact('title','category_all','categoryName','products','cur_location'));

    }

    public function restaurant_add_to_cart(Request $request)
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

        $product_id=$request->input('product_id');

        $product_info=DB::table('restaurant_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',1)->first();

        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        $cart_info1=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->get();

        if($cart_info){
            $new_quantity=$cart_info->quantity + 1;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('restaurant_temp_cart')->where('id',$cart_info->id)->update($data);

            $total_price=$cart_info->unit_price * $new_quantity;

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'quantity' => $new_quantity, 'price' => $product_info->product_price, 'total_price' => $total_price, 'cart_count' => count($cart_info1));
            return response()->json($message);
        }
        else{
            $data=array();
            $data['client_id']=$client_id;
            $data['product_id']=$product_id;
            $data['product_name']=$product_info->name;
            $data['quantity']='1';
            $data['product_img']=$product_info->image;
            $data['unit_price']=$product_info->price;
            $data['total_price']=$product_info->price;

            DB::table('restaurant_temp_cart')->insert($data);

            if($product_info)
            {
                if (file_exists("../../manage/public".$product_info->image))
                {
                    // print_r($client_phone1);
                    $message = array('message' => 'Product found!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->name, 'product_img' => $product_info->image, 'quantity' => 1, 'price' => $product_info->price, 'cart_count' => count($cart_info1));
                    return response()->json($message);
                }
                else
                {
                    $message = array('message' => 'Product found without img!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->name, 'product_img' => asset('/B0eS.gif'), 'quantity' => 1, 'price' => $product_info->price, 'cart_count' => count($cart_info1));
                    return response()->json($message);
                }
            }
            else
            {
                $message = array('message' => 'Not Found!', 'title' => 'Add to cart');
                return response()->json($message);

            }
        }
    }

    public function add_to_cart_details(Request $request)
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

        $product_id=$request->input('product_id');

        $quantity_details=$request->input('quantity_details');

        $product_info=DB::table('restaurant_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',1)->first();

        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        $cart_info1=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->get();

        if($cart_info){
            $new_quantity=$cart_info->quantity + $quantity_details;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('restaurant_temp_cart')->where('id',$cart_info->id)->update($data);

            $total_price=$cart_info->unit_price * $new_quantity;

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'quantity' => $new_quantity, 'price' => $cart_info->unit_price*$quantity_details, 'total_price' => $total_price, 'cart_count' => count($cart_info1));
            return response()->json($message);
        }
        else{
            $data=array();
            $data['client_id']=$client_id;
            $data['product_id']=$product_id;
            $data['product_name']=$product_info->name;
            $data['quantity']=$quantity_details;
            $data['product_img']=$product_info->image;
            $data['unit_price']=$product_info->price;
            $data['total_price']=$quantity_details*$product_info->price;

            DB::table('restaurant_temp_cart')->insert($data);

            if($product_info)
            {
                if (file_exists("../../manage/public".$product_info->image))
                {
                    // print_r($client_phone1);
                    $message = array('message' => 'Product found!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->name, 'product_img' => $product_info->image, 'quantity' => $quantity_details, 'price' => $data['total_price'], 'price1' => $product_info->price, 'cart_count' => count($cart_info1));
                    return response()->json($message);
                }
                else
                {
                    $message = array('message' => 'Product found without img!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->name, 'product_img' => asset('/B0eS.gif'), 'quantity' => $quantity_details, 'price' => $data['total_price'], 'price1' => $product_info->price, 'cart_count' => count($cart_info1));
                    return response()->json($message);
                }
            }
            else
            {
                $message = array('message' => 'Not Found!', 'title' => 'Add to cart');
                return response()->json($message);

            }
        }
    }

    public function restaurant_add_to_cart_plus(Request $request)
    {
        $client_id=$request->session()->get('client_id');

        $product_id=$request->input('product_id');

        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        $new_quantity=$cart_info->quantity + 1;
        $data=array();
        $data['quantity']=$new_quantity;
        $data['total_price']=$cart_info->unit_price * $new_quantity;

        DB::table('restaurant_temp_cart')->where('id',$cart_info->id)->update($data);

        $message = array('message' => 'cart updated!', 'title' => 'Add to cart');
        return response()->json($message);

    }

    public function restaurant_add_to_cart_minus(Request $request)
    {
        $client_id=$request->session()->get('client_id');

        $product_id=$request->input('product_id');

        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        if($cart_info->quantity>1)
        {
            $new_quantity=$cart_info->quantity - 1;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('restaurant_temp_cart')->where('id',$cart_info->id)->update($data);

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart');
            return response()->json($message);
        }
        else
        {
            $message = array('message' => 'cart updated!', 'title' => 'Add to cart');
            return response()->json($message);
        }
    }

    public function restaurant_remove_cart(Request $request)
    {
        $client_id=$request->session()->get('client_id');

        $product_id=$request->input('product_id');

        $cart_delete=DB::table('restaurant_temp_cart')->where('client_id', $client_id)->where('product_id',$product_id)->delete();

        $message = array('message' => 'cart deleted!', 'title' => 'Add to cart');
        return response()->json($message);
    }

    public function addToCartAndCheckout(Request $request, $id)
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

        $product_id= $id;

        $product_info=DB::table('restaurant_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',1)->first();

        $cart_info=DB::table('restaurant_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        if($cart_info){
            $new_quantity=$cart_info->quantity + 1;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('restaurant_temp_cart')->where('id',$cart_info->id)->update($data);

            $total_price=$cart_info->unit_price * $new_quantity;

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'quantity' => $new_quantity, 'price' => $product_info->price, 'total_price' => $total_price);
            return response()->json($message);
        }
        else{
            $data=array();
            $data['client_id']=$client_id;
            $data['product_id']=$product_id;
            $data['product_name']=$product_info->name;
            $data['quantity']='1';
            $data['product_img']=$product_info->image;
            $data['unit_price']=$product_info->price;
            $data['total_price']=$product_info->price;

            DB::table('restaurant_temp_cart')->insert($data);

            if($product_info)
            {

                    // print_r($client_phone1);
                    // $message = array('message' => 'Product found!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->product_name, 'product_img' => $product_info->product_thumbnail, 'quantity' => 1, 'price' => $product_info->product_price);
                    return redirect('/resCheckout');
            }
            else
            {
                $message = array('message' => 'Not Found!', 'title' => 'Add to cart');
                return response()->json($message);

            }
        }
    }
}
