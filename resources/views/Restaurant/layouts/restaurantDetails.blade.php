@extends('restaurant.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{URL::to('/restaurant')}}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Restaurant details</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
           
            <div class="row">
               <div class="col-lg-8">
                  <div class="recommend-slider mb-3">
                     @if($restaurantInfo->coverImage)
                        <?php if (file_exists("../../naturexbd-manage/public".$restaurantInfo->coverImage)){ ?>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('https://manage.naturexbd.com'.$restaurantInfo->coverImage)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                  <div class="p-4 bg-white rounded shadow-sm" style="height:400px;">
                     <div class="pt-0">
                        <p class="font-weight-bold m-0">{{ $restaurantInfo->name}}</p>
                     </div>
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
                     
                    <div class="pt-2">
                        <div class="row">
                            <div class="col-6">
                                <p class="font-weight-bold m-0">Open</p>
                                <p class="text-muted m-0">{{ $restaurantInfo->opening_time }}</p>
                            </div>
                            <div class="col-6 text-left">
                                <p class="font-weight-bold m-0">Close</p>
                                <p class="text-muted m-0">{{ $restaurantInfo->closing_time }}</p>
                            </div>
                        </div>
                    </div>

                     <div class="pt-2">
                        <div class="row">
                           <div class="col-12">
                              <p class="font-weight-bold m-0">Address</p>
                              <p class="text-muted m-0">{{ $restaurantInfo->address}}</p>
                           </div>
                        </div>
                     </div>
                    
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
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <h5 class="mt-3 mb-3">Restaurant Food</h5>
            <div class="row">
                @foreach( $res_products as $product )
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image" style="height:100%;">
                            <a href="{{ URL::to('/restaurant_product_details/'.base64_encode($product->id)) }}" class="text-dark">
                                <div class="member-plan position-absolute"><!--<span class="badge m-3 badge-danger">10%</span>--></div>
                                <div class="p-3" style="height:100%;">
                                    <div style="height:80%;">
                                        @if($product->image)
                                        <?php if (file_exists("../../naturexbd-manage/public".$product->image)){ ?>
                                        <img style=" object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$product->image)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                        <?php } else{ ?>
                                        <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                        <?php } ?>
                                        @else
                                        <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                        @endif
                                        <h6>{{$product->name}}</h6>
                                    </div>
                                    <h6>&nbsp</h6>
                                    <div class="d-flex align-items-center">
                                        <h6 class="price m-0 text-success">BDT {{$product->price}}</h6>
                                        <div style="display:contents;" class="collapse qty_show" id=>
                                        <div class="ml-auto">
                                            
                                            @if(session()->has('client_id'))
                                            <button type='button' name={{$product->id}} class='btn btn-success btn-sm add_to_cart' ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Cart</button>
                                            @else
                                            <button type='button' class='btn btn-success btn-sm loginAlert' ><i class="fa fa-plus-circle" aria-hidden="true" onclick=""></i> Add to Cart</button>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
      </section>
      
@endsection