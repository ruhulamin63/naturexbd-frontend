<!-- Pick's Today -->
<div class="title d-flex align-items-center py-3">
   <h5 class="m-0">Made For You</h5>
   <a class="ml-auto btn btn-outline-success btn-sm" href="{{ URL::to('/seeAllFood')}}">See all</a>
</div>
<!-- pick today -->
<div id="test" class="pick_today">
   <div class="row">
   <?php $i=0;?>
   @foreach( $feature_products as $feature_product )
      <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
         <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image" style="height:100%;">
               <a href="{{ URL::to('/restaurant_product_details/'.base64_encode($feature_product->id)) }}" class="text-dark">
                  <div class="member-plan position-absolute"><!--<span class="badge m-3 badge-danger">10%</span>--></div>
                  <div class="p-3" style="height:100%;">
                     <div style="height:80%;">
                        @if($feature_product->image)
                        <?php if (file_exists("../../naturexbd-manage/public".$feature_product->image)){ ?>
                           <img style=" object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$feature_product->image)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                        <?php } else{ ?>
                           <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                        <?php } ?>
                        @else
                           <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                        @endif
                        <h6>{{$feature_product->name}}</h6>
                     </div>
                     <h6>&nbsp</h6>
                     <div class="d-flex align-items-center">
                        <h6 class="price m-0 text-success">BDT {{$feature_product->price}}</h6>
                           <!--<a data-toggle="collapse" href={{'#collapseExample'.$i}} role="button" aria-expanded="false" aria-controls={{'collapseExample'.$i}} class="btn btn-success btn-sm ml-auto" >
                                    +
                           </a>-->

               </a>
                  <div style="display:contents;" class="collapse qty_show" id={{'collapseExample'.$i}}>
                     <div class="ml-auto">
                           <!--<span class="ml-auto" href="#">
                              <form id='' class="cart-items-number d-flex" >
                                 <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field={{'quantity'.$i}} />
                                 <input type='text' name={{'quantity'.$i}} value='0' class='qty form-control' readonly/>
                                 <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field={{'quantity'.$i}} />
                                 <input type='button' value='Add to cart' name={{$feature_product->id}} class='btn btn-success btn-sm add_to_cart'  />
                              </form>
                        </span>-->
                        @if(session()->has('client_id'))
                           <button type='button' name={{$feature_product->id}} class='btn btn-success btn-sm add_to_cart' ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Cart</button>
                        @else
                           <button type='button' class='btn btn-success btn-sm loginAlert' ><i class="fa fa-plus-circle" aria-hidden="true" onclick=""></i> Add to Cart</button>
                        @endif
                     </div>
               </div>
               </div>
               </div>
            </div>
         </div>
      </div>
      <?php $i+=1;?>
   @endforeach
        <div class="col-md-12 col-12 overflow-auto">
            {!! $feature_products->links() !!}
        </div>
   </div>
</div>


