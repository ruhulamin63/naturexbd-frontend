<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;

class ProductController extends Controller
{
    public function grocery_product_details(Request $request,$id)
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

        $title="Product Details -Naturex";
        $product_id = base64_decode($id);
        $product_info=DB::table('grocery_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',"Active")->first();
        $made_products=DB::table('grocery_products')->where('cityID',$cityID)->where('status',"Active")->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->inRandomOrder()->limit(8)->get();
        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('grocery.product.product_details',compact('title','product_info','made_products','category_all','cur_location'));

    }

    public function grocery_product_category(Request $request,$category)
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

        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();
        $products=DB::table('grocery_products')->where('cityID',$cityID)->where('category',$category)->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->where('status',"Active")->orderBy('id','desc')->paginate(40);
        $title="Product by Category -Naturex";

        // toastr()->success('Data has been saved successfully!');
        //Toastr::success('Logged in!', 'Login', ["positionClass" => "toast-top-right"]);
        return view('grocery.product.listing',compact('title','category_all','products','cur_location'));

    }

//    start writing by Ruhul
    public function grocery_blog_post(){
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

        $title="Blog -Naturex";

        return view('grocery.layouts.grocery_blog_post', compact('title','cur_location'));
    }


    public function grocery_add_to_cart(Request $request)
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
        $guest_id=$request->session()->get('guest_id');
        if(!$client_id && !$guest_id){
               Session::put('guest_id',rand(1000,99999));
               $guest_id = $request->session()->get('guest_id');
        }




        $product_id=$request->input('product_id');

        $product_info=DB::table('grocery_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',"Active")->first();

        $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where(function($q) use($client_id,$guest_id) {
            if($client_id){
                $q->where('client_id',$client_id);
            }else{
                $q->where('guest_id',$guest_id);
            }

        })->first();

        // $cart_info=DB::table('grocery_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        $cart_info1=DB::table('grocery_temp_cart')->where(function($q) use($client_id,$guest_id) {
            if($client_id){
                $q->where('client_id',$client_id);
            }else{
               $q->where('guest_id',$guest_id);
            }


        })->get();

        if($cart_info){
            $new_quantity=$cart_info->quantity + 1;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('grocery_temp_cart')->where('id',$cart_info->id)->update($data);

            $total_price=$cart_info->unit_price * $new_quantity;

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'quantity' => $new_quantity, 'price' => $product_info->product_price, 'total_price' => $total_price, 'cart_count' => count($cart_info1));
            return response()->json($message);
        }
        else{
            $data=array();
            $data['client_id']=$client_id;
            $data['guest_id']=$guest_id;
            $data['product_id']=$product_id;
            $data['product_name']=$product_info->product_name;
            $data['quantity']='1';
            $data['product_img']=$product_info->product_thumbnail;
            $data['unit_price']=$product_info->product_price;
            $data['total_price']=$product_info->product_price;

            DB::table('grocery_temp_cart')->insert($data);

            if($product_info)
            {
                if (file_exists("../../naturexbd-manage/public".$product_info->product_thumbnail))
                {
                    // print_r($client_phone1);
                    $message = array('message' => 'Product found!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->product_name, 'product_img' => $product_info->product_thumbnail, 'quantity' => 1, 'price' => $product_info->product_price, 'cart_count' => count($cart_info1));
                    return response()->json($message);
                }
                else
                {
                    $message = array('message' => 'Product found without img!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->product_name, 'product_img' => asset('/B0eS.gif'), 'quantity' => 1, 'price' => $product_info->product_price, 'cart_count' => count($cart_info1));
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
        $guest_id=$request->session()->get('guest_id');


        $product_id=$request->input('product_id');

        $quantity_details=$request->input('quantity_details');

        $product_info=DB::table('grocery_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',"Active")->first();

        // $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where(function($q) use($client_id,$guest_id) {
        //     $q->where('client_id',$client_id)->orwhere('guest_id',$guest_id);
        // })->first();
        if($client_id || $guest_id)
        {
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id);
              if($client_id){
                $cart_info->where('client_id',$client_id);
              }else{
                $cart_info->where('guest_id',$guest_id);
              }
            $cart_info = $cart_info->first();

            //$cart_info=DB::table('grocery_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

            //$cart_info1=DB::table('grocery_temp_cart')->where('client_id',$client_id)->orwhere('guest_id',$guest_id)->get();

            $cart_info1=DB::table('grocery_temp_cart');
              if($client_id){
                $cart_info1->where('client_id',$client_id);
              }else{
                $cart_info1->where('guest_id',$guest_id);
              }
              $cart_info1 = $cart_info1->get();
        }else{
            $cart_info=(object)[];
            $cart_info1 = (object)[];
        }
        if($cart_info){
            $new_quantity=$cart_info->quantity + $quantity_details;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('grocery_temp_cart')->where('id',$cart_info->id)->update($data);

            $total_price=$cart_info->unit_price * $new_quantity;

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'quantity' => $new_quantity, 'price' => $cart_info->unit_price*$quantity_details, 'total_price' => $total_price, 'cart_count' => count($cart_info1));
            return response()->json($message);
        }
        else{
            $data=array();
            $data['client_id']=$client_id;
            $data['guest_id']=$guest_id;
            $data['product_id']=$product_id;
            $data['product_name']=$product_info->product_name;
            $data['quantity']=$quantity_details;
            $data['product_img']=$product_info->product_thumbnail;
            $data['unit_price']=$product_info->product_price;
            $data['total_price']=$quantity_details*$product_info->product_price;

            DB::table('grocery_temp_cart')->insert($data);

            if($product_info)
            {
                if (file_exists("../../naturexbd-manage/public".$product_info->product_thumbnail))
                {
                    // print_r($client_phone1);
                    $message = array('message' => 'Product found!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->product_name, 'product_img' => $product_info->product_thumbnail, 'quantity' => $quantity_details, 'price' => $data['total_price'], 'price1' => $product_info->product_price, 'cart_count' => count($cart_info1));
                    return response()->json($message);
                }
                else
                {
                    $message = array('message' => 'Product found without img!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->product_name, 'product_img' => asset('/B0eS.gif'), 'quantity' => $quantity_details, 'price' => $data['total_price'], 'price1' => $product_info->product_price, 'cart_count' => count($cart_info1));
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

    public function grocery_add_to_cart_plus(Request $request)
    {
        $client_id=$request->session()->get('client_id');

        $guest_id=$request->session()->get('guest_id');

        $product_id=$request->input('product_id');

        // $cart_info=DB::table('grocery_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();
        if($client_id){
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('client_id',$client_id)->first();;
        }else{
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('guest_id',$guest_id)->first();;
        }



        $new_quantity=$cart_info->quantity + 1;
        $data=array();
        $data['quantity']=$new_quantity;
        $data['total_price']=$cart_info->unit_price * $new_quantity;

        DB::table('grocery_temp_cart')->where('id',$cart_info->id)->update($data);

        $message = array('message' => 'cart updated!', 'title' => 'Add to cart');
        return response()->json($message);

    }

    public function grocery_add_to_cart_minus(Request $request)
    {

        $client_id=$request->session()->get('client_id');

        $guest_id=$request->session()->get('guest_id');

        $product_id=$request->input('product_id');

        //$cart_info=DB::table('grocery_temp_cart')->where('client_id',$client_id)->where('product_id',$product_id)->first();

        if($client_id){
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('client_id',$client_id)->first();;
        }else{
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('guest_id',$guest_id)->first();;
        }

        if($cart_info->quantity>1)
        {
            $new_quantity=$cart_info->quantity - 1;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('grocery_temp_cart')->where('id',$cart_info->id)->update($data);

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart');
            return response()->json($message);
        }
        else
        {
            $message = array('message' => 'cart updated!', 'title' => 'Add to cart');
            return response()->json($message);
        }
    }

    public function grocery_remove_cart(Request $request)
    {
        $client_id=$request->session()->get('client_id');
        $guest_id=$request->session()->get('guest_id');

        $product_id=$request->input('product_id');

        if($client_id){
            $cart_delete=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('client_id',$client_id)->delete();
        }else{
            $cart_delete=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('guest_id',$guest_id)->delete();
        }



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
        $guest_id = $request->session()->get('guest_id');

        $product_id= $id;

        $product_info=DB::table('grocery_products')->where('cityID',$cityID)->where('id',$product_id)->where('status',"Active")->first();


        if($client_id){
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('client_id',$client_id)->first();;
        }else{
            $cart_info=DB::table('grocery_temp_cart')->where('product_id', $product_id)->where('guest_id',$guest_id)->first();;
        }


        if($cart_info){
            $new_quantity=$cart_info->quantity + 1;
            $data=array();
            $data['quantity']=$new_quantity;
            $data['total_price']=$cart_info->unit_price * $new_quantity;

            DB::table('grocery_temp_cart')->where('id',$cart_info->id)->update($data);

            $total_price=$cart_info->unit_price * $new_quantity;

            $message = array('message' => 'cart updated!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'quantity' => $new_quantity, 'price' => $product_info->product_price, 'total_price' => $total_price);
            return redirect('/checkout');
            return response()->json($message);
        }
        else{

            $data=array();
            $data['client_id']=$client_id;
            $data['guest_id']=$guest_id;
            $data['product_id']=$product_id;
            $data['product_name']=$product_info->product_name;
            $data['quantity']='1';
            $data['product_img']=$product_info->product_thumbnail;
            $data['unit_price']=$product_info->product_price;
            $data['total_price']=$product_info->product_price;

            DB::table('grocery_temp_cart')->insert($data);

            if($product_info)
            {

                    // print_r($client_phone1);
                    // $message = array('message' => 'Product found!', 'title' => 'Add to cart', 'product_id1' => $product_info->id, 'product_name' => $product_info->product_name, 'product_img' => $product_info->product_thumbnail, 'quantity' => 1, 'price' => $product_info->product_price);
                    return redirect('/checkout');
            }
            else
            {
                $message = array('message' => 'Not Found!', 'title' => 'Add to cart');
                return response()->json($message);

            }
        }
    }

    public function mobileCartDetails()
    {
        $client_id=session()->get('client_id');

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

        $title="Cart | Naturex";
        $cart_list=DB::table('grocery_temp_cart')->where('client_id',$client_id)->get();
        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();
        $cart_item_count=count($cart_list);

        $total_price_value=0;
        foreach($cart_list as $list){
            $total_price_value += $list->total_price;
        }
        return view('grocery.product.cart',compact('title','cart_list','category_all','cart_item_count','total_price_value','cur_location'));

    }

    public function seeAllProduct()
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

        $title="Products | Naturex";
        $category_all=DB::table('grocery_category')->where('cityID',$cityID)->where('status',"Active")->get();
        $products=DB::table('grocery_products')->where('cityID',$cityID)->where('status',"Active")->where(function($q) {$q->where('product_type',1)->orwhere('product_type',2);})->orderBy('id','DESC')->paginate(40);
        return view('grocery.product.seeAllProduct',compact('title','category_all','products','cur_location'));

    }

    /*public function placeOrder(Request $request)
    {
        if ($request->session()->has('city')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'mobile' => 'required',
                'division' => 'required',
                'address' => 'required',
                'discount' => 'required'
                // 'paymentMethod' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Please provide valid information. One of the fields is empty.'
                ]);
            } else {
                $name = $request->input('name');
                $mobile = $request->input('mobile');
                $division = $request->input('division');
                $address = $request->input('address');

                $note = "N/A";
                $payMethod = 'COD';

                if ($request->has('paymentMethod')) {
                    $payMethod = $request->input('paymentMethod');
                }

                if ($request->has('delivery_note') && $request->input('delivery_note') != "") {
                    $note = $request->input('delivery_note');
                }
                $cityID = $request->session()->get('city');
                $discount = $request->input('discount');
                $orderData = "[";

                $cartlist = array();
                if ($request->session()->has('cartList')) {
                    $cartlist = $request->session()->get('cartList');
                }

                $totalProductPrice = 0;
                foreach ($cartlist as $key => $item) {
                    $totalProductPrice += $item["price"] * $item["quantity"];
                }

                $totalProductPrice=$totalProductPrice-$discount;

                for ($i = 0; $i < count($cartlist); $i++) {
                    if ($i == 0) {
                        $orderData = $orderData . '{"a":"' . $cartlist[$i]['id'] . '","b":"' . $cartlist[$i]['name'] . '","c":"' . $cartlist[$i]['price'];
                        $orderData = $orderData . '","d":"' . $cartlist[$i]['quantity'] . '","e":"' . $cartlist[$i]['description'] . '","f":"' . $cartlist[$i]['thumbnail'] . '"}';
                    } else {
                        $orderData = $orderData . ',{"a":"' . $cartlist[$i]['id'] . '","b":"' . $cartlist[$i]['name'] . '","c":"' . $cartlist[$i]['price'];
                        $orderData = $orderData . '","d":"' . $cartlist[$i]['quantity'] . '","e":"' . $cartlist[$i]['description'] . '","f":"' . $cartlist[$i]['thumbnail'] . '"}';
                    }
                }
                $orderData = $orderData . "]";

                $scheduleDate = date('d-M-Y', strtotime('+1 day', strtotime(date('Y-m-d'))));

                $promo = "-";
                if ($request->has('promo') && $request->input('promo') != "") {
                    $promo = strtoupper($request->input('promo'));
                }

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://manage.naturexbd.com/api/createWebOrder",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => array('city_id' => $cityID, 'division' => $division, 'customer_name' => $name, 'customer_mobile' => $mobile, 'delivery_address' => $address, 'delivery_note' => $note, 'order_data' => $orderData, 'discount' => $discount, 'total_amount' => $totalProductPrice, 'scheduled_date' => $scheduleDate, 'promo' => $promo),
                ));

                $response = curl_exec($curl);
                curl_close($curl);

                $response = json_decode($response, true);
                if (!$response["error"]) {
                    $cartlist = array();
                    $cartProduct = array();

                    $request->session()->put('cartList', $cartlist);
                    $request->session()->put('cartProduct', $cartProduct);

                    if ($payMethod == "bKash") {
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://manage.naturexbd.com/api/payment/tokens/generate",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => array('orderID' => $response["orderID"]),
                        ));

                        $response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($response, true);

                        $url = "https://manage.naturexbd.com/payment?token=" . $response["token"];

                        return redirect($url);
                    } else if ($payMethod == 'MASTERCARD') {
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://secure.aamarpay.com/sdk/index.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => array(
                                'app_id' => '000599000730018',
                                'store_id' => 'khaidaitoday',
                                'signature_key' => '3cc65e1dd9fc945f99b2e117ead299f3',
                                'tran_id' => $response["orderID"],
                                'cus_name' => $name,
                                'cus_email' => 'customer@naturexbd.com',
                                'cus_add1' => $address,
                                'cus_add2' => 'N/A',
                                'cus_city' => $division,
                                'cus_state' => $division,
                                'cus_postcode' => 'N/A',
                                'cus_country' => 'BD',
                                'amount' => '10',
                                'currency' => 'BDT',
                                'desc' => 'Grocery Order Payment',
                                'source' => 'Android',
                                'source_details' => '{\'user_imei\' : \'001\' ,\'device_type\' : \'Web\',\'user_phone\' : \'01870762470\', \'app_name\' : \'KT\', app_version : \'1.0.0\'}',
                                'cus_phone' => $mobile
                            ),
                        ));

                        $response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($response, true);

                        $url = $response['cards'][5]['url'];

                        dd($url);

                        return redirect($url);
                    } else if ($payMethod == 'NEXUS') {
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://secure.aamarpay.com/sdk/index.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => array(
                                'app_id' => '000599000730018',
                                'store_id' => 'khaidaitoday',
                                'signature_key' => '3cc65e1dd9fc945f99b2e117ead299f3',
                                'tran_id' => $response["orderID"],
                                'cus_name' => $name,
                                'cus_email' => 'customer@naturexbd.com',
                                'cus_add1' => $address,
                                'cus_add2' => 'N/A',
                                'cus_city' => $division,
                                'cus_state' => $division,
                                'cus_postcode' => 'N/A',
                                'cus_country' => 'BD',
                                'amount' => '1',
                                'currency' => 'BDT',
                                'desc' => 'Grocery Order Payment',
                                'source' => 'Android',
                                'source_details' => '{\'user_imei\' : \'001\' ,\'device_type\' : \'Web\',\'user_phone\' : \'01870762470\', \'app_name\' : \'KT\', app_version : \'1.0.0\'}',
                                'cus_phone' => $mobile
                            ),
                        ));

                        $response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($response, true);

                        $url = $response['cards'][9]['url'];

                        // dd($url);

                        return redirect($url);
                    } else {
                        return redirect('/checkout?confirmation=' . $response["orderID"]);
                    }
                } else {
                    return redirect()->back()->with([
                        'confirmation' => false,
                        'error' => true,
                        'message' => 'Soemthing went wrong! Please try again.'
                    ]);
                }
            }
        } else {
            return redirect('/');
        }
    }*/

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
