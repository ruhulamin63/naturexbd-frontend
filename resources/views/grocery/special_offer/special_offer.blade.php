@extends('grocery.layouts.main')
@section('content')

<!-- bread_cum -->
   <nav aria-label="breadcrumb" class="breadcrumb mb-0">
      <div class="container">
         <ol class="d-flex align-items-center mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}" class="text-success">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Special Offer</li>
         </ol>
      </div>
   </nav>
      <!-- body -->

   <section class="py-4 osahan-main-body">
      <div class="container">
         <h5 class="mt-3 mb-3">Special Offer</h5>
         <div class="row">
         @foreach($special_products_list as $special_product)
            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
                 <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image" style="height:100%;">
                       <a href="{{ URL::to('/grocery_product_details/'.base64_encode($special_product->id)) }}" class="text-dark">
                          <div class="member-plan position-absolute"><!--<span class="badge m-3 badge-danger">10%</span>--></div>
                          <div class="p-3" style="height:100%;">
                             <div style="height:80%;">
                                @if($special_product->product_thumbnail)
                                <?php if (file_exists("../../naturexbd-manage/public".$special_product->product_thumbnail)){ ?>
                                   <img style=" object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$special_product->product_thumbnail)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                <?php } else{ ?>
                                   <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                <?php } ?>
                                @else
                                   <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                @endif
                                <h6>{{$special_product->product_name}}</h6>
                             </div>
                             <h6>&nbsp</h6>
                             <div class="d-flex align-items-center">
                                <h6 class="price m-0 text-success">BDT {{$special_product->product_price}}</h6>
                                <br><br>
                                <h6 class="price m-0 text-success">/ {{$special_product->measuring_unit_new}}</h6>
                                <!-- <a data-toggle="collapse" href='#collapseExample' role="button" aria-expanded="false" aria-controls='collapseExample' class="btn btn-success btn-sm ml-auto">+</a> -->
                                <div style="display:contents;" class="collapse qty_show" id='collapseExample'>
                                   <div class="ml-auto">
                                      <!-- <span class="ml-auto" href="#">
                                         <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                            <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
                                            <input type='text' name='quantity' value='0' class='qty form-control' />
                                            <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
                                         </form>   
                                      </span> -->
                                      <button type='button' name={{$special_product->id}} class='btn btn-success btn-sm add_to_cart' ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Cart</button>
                                     
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
            