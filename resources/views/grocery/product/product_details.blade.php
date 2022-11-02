@extends('grocery.layouts.main')
@section('content')
<style>
.modal.fade {
  z-index: 10000000 !important;
}
</style>
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{URL::to('/')}}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Product details</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
            @include('grocery/layouts/grocery_categories')
            <div class="row">
               <div class="col-lg-8">
                  <div class="recommend-slider mb-3">
                     @if($product_info->product_thumbnail)
                        <?php if (file_exists("http://127.0.0.1:8000/storage".$product_info->product_thumbnail)){ ?>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('http://127.0.0.1:8000/storage'.$product_info->product_thumbnail)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('http://127.0.0.1:8000/storage'.$product_info->product_thumbnail)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('http://127.0.0.1:8000/storage'.$product_info->product_thumbnail)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                        <h2 class="font-weight-bold" style="font-size:20px;line-height: inherit;">{{ $product_info->product_name }}</h2>
                        <h6 class="font-weight-light text-dark m-0 d-flex align-items-center">
                           <b class="h6 text-dark m-0 pb-1">QTY: {{ $product_info->measuring_unit_new }}</b>
                           <!--<span class="badge badge-danger ml-2">50% OFF</span>-->
                        </h6>
                        <h6 class="font-weight-light text-dark m-0 d-flex align-items-center">
                           Product MRP : <b class="h6 text-dark m-0"> BDT {{ $product_info->product_price }}@if($product_info->measuring_unit!="None" && $product_info->measuring_unit!="N/A")/{{$product_info->measuring_unit}}@endif</b>
                           <!--<span class="badge badge-danger ml-2">50% OFF</span>-->
                        </h6>
                        <a href="#">
                           <div class="rating-wrap d-flex align-items-center mt-0">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star"></i>
                                 </li>
                              </ul>
                              <p class="label-rating text-muted ml-2 small"> ({{rand(36,174)}} Reviews)</p>
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
                        <div class="pt-0">
                           <!--
                           <div class="input-group mb-3 border rounded shadow-sm overflow-hidden bg-white">
                              <div class="input-group-prepend">
                                 <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                              </div>
                              <input type="text" class="shadow-none border-0 form-control form-control-lg pl-0" placeholder="Type your city (e.g Chennai, Pune)" aria-label="" aria-describedby="basic-addon1">
                           </div>
                           -->
                           <p class="font-weight-bold mb-2">Product Details</p>
                           @if(strlen($product_info->product_description) > 100)
                           <p class="text-muted small mb-0">{{strip_tags(substr_replace($product_info->product_description, "...", 100) )}}<a href="javascript:void(0)" class="text-primary" data-toggle="modal" data-target="#productDetailsModal"> <b>Read more</b></a></p>
                           @else
                           <p class="text-muted small mb-0">{{strip_tags($product_info->product_description )}}</p>
                           @endif
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
                      <a style="color:#fff; background-color:#8DC63F;" href="#" name={{$product_info->id}} class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg add_to_cart_details"><i class="icofont-plus m-0 mr-2"></i> ADD TO CART</a>
                        <a href="{{URL::to('/addToCartAndCheckout/'.$product_info->id)}}" class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0"><i class="icofont-cart m-0 mr-2"></i> BUY NOW</a>
                  </div>
               </div>
            </div>
            @include('grocery/layouts/grocery_may_like')
         </div>
         <!-- Modal -->
        <div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ $product_info->product_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="font-size:13px">
                <p>{!!$product_info->product_description!!}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
