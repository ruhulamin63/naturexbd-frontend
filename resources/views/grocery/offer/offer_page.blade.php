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

      <section class="header">
         @foreach($offers as $offer)
            <h1>{{ $offer->offer_name }}</h1>
            <p>{!! $offer->description !!}</p>
            <a href="#" class="btn-bgstroke">Go</a>
         @endforeach
      </section>

         <h5 class="mt-3 mb-3">Offer Product</h5>
         <div class="row">
         @if(count($offer_products)>0)
            @foreach($offer_products as $product)
               
               <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image" style="height:100%;">
                        <a href="{{ URL::to('/grocery_product_details/'.base64_encode($product->id)) }}" class="text-dark">
                           <div class="member-plan position-absolute"><!--<span class="badge m-3 badge-danger">10%</span>--></div>
                           <div class="p-3" style="height:100%;">
                              <div style="height:80%;">
                                 {{-- @foreach($productsMultiImage as $image) --}}
                                    @if($product->product_thumbnail)
                                          <img style="object-fit: contain;" src="{{ asset('http://127.0.0.1:8000/storage'.$product->product_thumbnail) }}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="...">
                                    @else
                                          <img style="object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                    @endif
                                 {{-- @endforeach --}}

                                 <h6>{{$product->product_name}}</h6>
                              </div>
                              <h6>&nbsp</h6>
                              <h6 class="price m-0 text-success">{{$product->measuring_unit}}</h6>
                           <div class="d-flex align-items-center">
                           <h6 class="price m-0 text-success">BDT {{$product->product_price}}</h6>
                                 <div class="ml-auto">
                                    @if(session()->has('client_id'))
                                       <button type='button' name="{{$product->id}}" class='btn btn-success btn-sm add_to_cart' ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Cart</button>
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
