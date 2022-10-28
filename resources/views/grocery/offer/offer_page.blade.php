@extends('grocery.layouts.main')
@section('content')

<!-- bread_cum -->
   <nav aria-label="breadcrumb" class="breadcrumb mb-0">
      <div class="container">
         <ol class="d-flex align-items-center mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}" class="text-success">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Offer Product</li>
         </ol>
      </div>
   </nav>
      <!-- body -->

   <section class="py-4 osahan-main-body">
      <div class="container">
         <h5 class="mt-3 mb-3">Offer Product</h5>
         <div class="row">
         @if(count($offer_products)>0)
            @foreach($offer_products as $product)
               <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
                  <div class="list-card d-flex bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image" style="height:100%;">
                        <div class="member-plan position-absolute"></div>
                        <div class="p-3 row">
                           <div class="col-md-8">
                              @if($product->offer_image)
                                 <?php if (file_exists("../../naturexbd-manage/public".$product->offer_image)){ ?>
                                    <img style=" object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$product->offer_image)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                 <?php } else{ ?>
                                    <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                 <?php } ?>
                              @else
                                 <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                              @endif
                           </div>
                           <div class="col-md-4">
                              <div >
                                 @if($product->product_thumbnail)
                                    <?php if (file_exists("../../naturexbd-manage/public".$product->product_thumbnail)){ ?>
                                       <img style="height: 150px;object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$product->product_thumbnail)}}" class="img-fluid item-img w-100 mb-3" alt="">
                                    <?php } else{ ?>
                                       <img style="height: 150px;object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid item-img w-100 mb-3" alt="">
                                    <?php } ?>
                                 @else
                                    <img style="height: 150px;object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid item-img w-100 mb-3" alt="">
                                 @endif
                                 <!-- <p style="font-size: 12px">Godrej Protekt Skin Wipes (Buy 1 Get 1 Free)</p> -->
                                 <h6 style="font-size: 14px; text-align: center">{{$product->product_name}}</h6>
                                 <p style="font-size: 12px; text-align: justify">{{$product->product_description}}</p>
                                 <p style="font-size: 14px; text-align: center"><del>{{$product->offer_old_price}} TK</del><b>  {{$product->product_price}} TK</b></p>
                              </div>
                              <div style="text-align: center">
                                 <button type='button' name="{{$product->id}}" class='btn btn-success btn-sm add_to_cart'><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Cart</button>
                                 @if(session()->has('client_id'))
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         @else
            <div class="col-md-12 px-3 py-5" style="text-align: center;">
                <img style=" height:150px;object-fit: contain;" src="{{asset('/error.gif')}}" class="img-fluid item-img w-100 mb-3" alt="">
                <h4>Currently No Offer Available!</h4>
            </div>
         @endif
         </div>
         {!! $offer_products->links() !!}
      </div>
   </section>
@endsection
