<!-- Most sales -->
<div class="title d-flex align-items-center py-3">
   <h5 class="m-0">Recommended for You</h5>
   <a class="ml-auto btn btn-outline-success btn-sm" href="recommend.html">26 more</a>
</div>
<!-- osahan recommend -->
<div class="osahan-recommend">
   <div class="row">
      <div class="col-12 col-md-4 mb-3">
         
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
               <div class="recommend-sli rounded mb-0">
                  @foreach($recommended_products1 as $recommended_product1)
                     <div class="osahan-slider-item m-2 rounded">
                        <a href="{{ URL::to('/grocery_product_details/'.base64_encode($recommended_product1->id)) }}" class="text-dark text-decoration-none">
                           @if($recommended_product1->product_thumbnail)
                           <?php if (file_exists("../../public".$recommended_product1->product_thumbnail)){ ?>
                              <img style="height:250px; object-fit: contain;" src="{{asset('https://manage.naturexbd.com'.$recommended_product1->product_thumbnail)}}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                           <?php } else{ ?>
                              <img style="height:250px; object-fit: contain;" src="https://i.gifer.com/B0eS.gif" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                           <?php } ?>
                           @else
                              <img style="height:250px; object-fit: contain;" src="https://i.gifer.com/B0eS.gif" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                           @endif
                        </a>
                     </div>
                  @endforeach
               </div>
               <div class="p-3 position-relative">
                  <h6 class="mb-1 font-weight-bold text-success">{{$recommended_category[0]->category}}
                  </h6>
                  <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                  <div class="d-flex align-items-center">
                     <h6 class="m-0">$8.8/kg</h6>
         <a class="ml-auto" href="#">
         <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
         <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
         <input type='text' name='quantity' value='1' class='qty form-control' />
         <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
         </form>   
         </a>
         </div>
         </div>
         </div>
      </div>
      <div class="col-12 col-md-4 mb-3">
         
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
               <div class="recommend-sli rounded mb-0">
               @foreach($recommended_products2 as $recommended_product2)
                  <div class="osahan-slider-item m-2 rounded">
                     <a href="{{ URL::to('/grocery_product_details/'.base64_encode($recommended_product2->id)) }}" class="text-dark text-decoration-none">
                        @if($recommended_product2->product_thumbnail)
                        <?php if (file_exists("../public".$recommended_product2->product_thumbnail)){ ?>
                           <img style="height:250px; object-fit: contain;" src="{{asset(''.$recommended_product2->product_thumbnail)}}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                        <?php } else{ ?>
                           <img style="height:250px; object-fit: contain;" src="https://i.gifer.com/B0eS.gif" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                        <?php } ?>
                        @else
                           <img style="height:250px; object-fit: contain;" src="https://i.gifer.com/B0eS.gif" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                        @endif
                     </a>
                  </div>
               @endforeach
               </div>
               <div class="p-3 position-relative">
                  <h6 class="mb-1 font-weight-bold text-success">{{$recommended_category[1]->category}}
                  </h6>
                  <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                  <div class="d-flex align-items-center">
                     <h6 class="m-0">$8.8/kg</h6>
         <a class="ml-auto" href="#">
         <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
         <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
         <input type='text' name='quantity' value='1' class='qty form-control' />
         <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
         </form>   
         </a>
         </div>
         </div>
         </div>
      </div>
      <div class="col-12 col-md-4 mb-3">
         
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
               <div class="recommend-sli rounded mb-0">
                  @foreach($recommended_products3 as $recommended_product3)
                     <div class="osahan-slider-item m-2 rounded">
                        <a href="{{ URL::to('/grocery_product_details/'.base64_encode($recommended_product3->id)) }}" class="text-dark text-decoration-none">
                           @if($recommended_product3->product_thumbnail)
                           <?php if (file_exists("../public".$recommended_product3->product_thumbnail)){ ?>
                              <img style="height:250px; object-fit: contain;" src="{{asset(''.$recommended_product3->product_thumbnail)}}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                           <?php } else{ ?>
                              <img style="height:250px; object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                           <?php } ?>
                           @else
                              <img style="height:250px; object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                           @endif
                        </a>
                     </div>
                  @endforeach
               </div>
               <div class="p-3 position-relative">
                  <h6 class="mb-1 font-weight-bold text-success">{{$recommended_category[2]->category}}
                  </h6>
                  <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                  <div class="d-flex align-items-center">
                     <h6 class="m-0">$8.8/kg</h6>
         <a class="ml-auto" href="#">
         <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
         <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
         <input type='text' name='quantity' value='1' class='qty form-control' />
         <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
         </form>   
         </a>
         </div>
         </div>
         </div>
      </div>
   </div>
</div>