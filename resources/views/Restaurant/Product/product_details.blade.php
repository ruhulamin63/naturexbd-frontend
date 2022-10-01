@extends('restaurant.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{URL::to('/restaurant')}}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Product details</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
         @include('restaurant/layouts/restaurant_menu')
            <div class="row">
               <div class="col-lg-8">
                  <div class="recommend-slider mb-3">
                     @if($product_info->image)
                        <?php if (file_exists("../../naturexbd-manage/public".$product_info->image)){ ?>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('https://manage.naturexbd.com'.$product_info->image)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset($product_info->image)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset($product_info->image)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                        <?php } else{ ?>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('/B0eS.gif')}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                        <?php } ?>
                     @else
                        <div class="osahan-slider-item" style="background-color:#fff;">
                           <img src="{{asset('/B0eS.gif')}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                        </div>
                     @endif
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="p-4 bg-white rounded shadow-sm" style="height:325px;">
                     <div class="pt-0">
                        <h2 class="font-weight-bold">{{ $product_info->name }}</h2>
                        <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                           Product MRP : <b class="h6 text-dark m-0"> BDT {{ $product_info->price }}</b>
                           <!--<span class="badge badge-danger ml-2">50% OFF</span>-->
                        </p>
                        <a href="#">
                           <div class="rating-wrap d-flex align-items-center mt-2">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star"></i>
                                 </li>
                              </ul>
                              <p class="label-rating text-muted ml-2 small"> (245 Reviews)</p>
                           </div>
                        </a>
                     </div>
                     <!--
                     <div class="pt-2">
                        <div class="row">
                           <div class="col-6">
                              <p class="font-weight-bold m-0">Delivery</p>
                              <p class="text-muted m-0">Free</p>
                           </div>
                           <div class="col-6 text-right">
                              <p class="font-weight-bold m-0">Available in:</p>
                              <p class="text-muted m-0">1 kg, 2 kg, 5 kg</p>
                           </div>
                        </div>
                     </div>
                     -->
                     <div class="details">
                        <div class="pt-3">
                           <!--
                           <div class="input-group mb-3 border rounded shadow-sm overflow-hidden bg-white">
                              <div class="input-group-prepend">
                                 <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                              </div>
                              <input type="text" class="shadow-none border-0 form-control form-control-lg pl-0" placeholder="Type your city (e.g Chennai, Pune)" aria-label="" aria-describedby="basic-addon1">
                           </div>
                           -->
                           <p class="font-weight-bold mb-2">Product Details</p>
                           <p class="text-muted small mb-0">{{ $product_info->details }}</p>
                        </div>
                        <div class="pt-3 bg-white">
                           <div class="d-flex align-items-center">
                              <!--
                              <div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons">
                                 <label class="btn btn-secondary active">
                                 <input type="radio" name="options" id="option1" checked> 4 pcs
                                 </label>
                                 <label class="btn btn-secondary">
                                 <input type="radio" name="options" id="option2"> 6 pcs
                                 </label>
                                 <label class="btn btn-secondary">
                                 <input type="radio" name="options" id="option3"> 1 kg
                                 </label>
                              </div>
                              -->
                              <a class="mr-auto" href="#">
                                 <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                    <input type='button' value='-' class='details_minus btn btn-success btn-sm' field='quantity_details' />
                                    <input type='text' name='quantity_details' value='1' class='qty form-control quantity_details' />
                                    <input type='button' value='+' class='details_plus btn btn-success btn-sm' field='quantity_details' />
                                 </form>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="pd-f d-flex align-items-center mb-3" style="margin-top: 1rem!important;">
                     @if(session()->has('client_id'))
                        <a style="color:#fff; background-color:#7ed957;" href="#" name={{$product_info->id}} class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg add_to_cart_details"><i class="icofont-plus m-0 mr-2"></i> ADD TO CART</a>
                        <a href="{{URL::to('/resAddToCartAndCheckout/'.$product_info->id)}}" class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0"><i class="icofont-cart m-0 mr-2"></i> BUY NOW</a>
                     @else
                        <a style="color:#fff; background-color:#7ed957;" href="#" class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg loginAlert"><i class="icofont-plus m-0 mr-2" onclick=""></i> ADD TO CART</a>
                        <a href="#" class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0 loginAlert" ><i class="icofont-cart m-0 mr-2" onclick=""></i> BUY NOW</a>
                     @endif
                  </div>
               </div>
            </div>
            @include('restaurant/layouts/restaurant_may_like')
         </div>
      </section>

@endsection
