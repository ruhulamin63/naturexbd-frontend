@extends('restaurant.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{ URL::to('/restaurant') }}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{$categoryName->category}}</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="osahan-listing">
                  @include('restaurant/layouts/restaurant_menu')
                     <div class="d-flex align-items-center mb-3">
                        <h4>{{$categoryName->category}}</h4>
                        <div class="m-0 text-center ml-auto">
                           <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white mr-2"><i class="icofont-filter mr-1"></i> Filter</a>
                           <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white"><i class="icofont-signal mr-1"></i> Sort</a> -->
                        </div>
                     </div>
                     <div id="test" class="pick_today">
                        <div class="row">
                           <?php $i=0;?>
                           @foreach( $products as $product )
                              <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
                                 <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-image" style="height:100%;">
                                       <a href="{{ URL::to('/restaurant_product_details/'.base64_encode($product->id)) }}" class="text-dark">
                                          <div class="member-plan position-absolute"><!--<span class="badge m-3 badge-danger">10%</span>--></div>
                                          <div class="p-3" style="height:100%;">
                                             <div style="height:80%;">
                                                @if($product->image)
                                                <?php if (file_exists("../../naturexbd-manage/public".$product->image)){ ?>
                                                   <img style=" object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$product->product_thumbnail)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
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
                                        <!--<a data-toggle="collapse" href={{'#collapseExample'.$i}} role="button" aria-expanded="false" aria-controls={{'collapseExample'.$i}} class="btn btn-success btn-sm ml-auto">+</a>-->
                                        <div style="display:contents;" class="collapse qty_show" id={{'collapseExample'.$i}}>
                                            <div class="ml-auto">
                                            <!-- <span class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                                            <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field={{'quantity'.$i}} />
                                                            <input type='text' name={{'quantity'.$i}} value='0' class='qty form-control' />
                                                            <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field={{'quantity'.$i}} />
                                                        </form>
                                                    </span> -->
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
                              <?php $i+=1;?>
                              @endforeach
                               <div class="col-md-12 col-12 overflow-auto">
                                   {!! $products->links() !!}
                               </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="modal fade right-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body p-0">
                  <div class="osahan-filter">
                     <div class="filter">
                        <!-- SORT BY -->
                        <div class="p-3 bg-light border-bottom">
                           <h6 class="m-0">SORT BY</h6>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                           <input type="radio" id="customRadio1" name="location" class="custom-control-input" checked>
                           <label class="custom-control-label py-3 w-100 px-3" for="customRadio1">Top Rated</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                           <input type="radio" id="customRadio2" name="location" class="custom-control-input">
                           <label class="custom-control-label py-3 w-100 px-3" for="customRadio2">Nearest Me</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                           <input type="radio" id="customRadio3" name="location" class="custom-control-input">
                           <label class="custom-control-label py-3 w-100 px-3" for="customRadio3">Cost High to Low</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                           <input type="radio" id="customRadio4" name="location" class="custom-control-input">
                           <label class="custom-control-label py-3 w-100 px-3" for="customRadio4">Cost Low to High</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                           <input type="radio" id="customRadio5" name="location" class="custom-control-input">
                           <label class="custom-control-label py-3 w-100 px-3" for="customRadio5">Most Popular</label>
                        </div>
                        <!-- Filter -->
                        <div class="p-3 bg-light border-bottom">
                           <h6 class="m-0">FILTER</h6>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="defaultCheck1" checked>
                           <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck1">Open Now</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="defaultCheck2">
                           <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck2">Credit Cards</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="defaultCheck3">
                           <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck3">Alcohol Served</label>
                        </div>
                        <!-- Filter -->
                        <div class="p-3 bg-light border-bottom">
                           <h6 class="m-0">ADDITIONAL FILTERS</h6>
                        </div>
                        <div class="px-3 pt-3">
                           <input type="range" class="custom-range" min="0" max="100" name="">
                           <div class="form-row">
                              <div class="form-group col-6">
                                 <label>Min</label>
                                 <input class="form-control" placeholder="$0" type="number">
                              </div>
                              <div class="form-group text-right col-6">
                                 <label>Max</label>
                                 <input class="form-control" placeholder="$1,0000" type="number">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer p-0 border-0">
                  <div class="col-6 m-0 p-0">
                     <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col-6 m-0 p-0">
                     <button type="button" class="btn btn-success btn-lg btn-block">Apply</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection
