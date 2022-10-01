<!-- Promos -->
<div class="py-3 osahan-promos">
   <div class="d-flex align-items-center mb-3">
      <!--<h5 class="m-0">Promos for you</h5>-->
      <!-- <a href="promos.html" class="ml-auto btn btn-outline-success btn-sm">See more</a> -->
   </div>
   <div class="promo-slider pb-0 mb-0">
      <div class="promo-slider">
          @if((1+1) == 1)
         @foreach($promo_all as $promo)
            <div class="osahan-slider-item mx-2">
               <a href="{{ URL::to('/grocery_promo_details/'.base64_encode($promo->id)) }}">
               @if($promo->banner_image)
                  <?php if (file_exists('https://manage.naturexbd.com'.$promo->banner_image)){ ?>
                     <img style="height: 230px" src="{{asset('https://manage.naturexbd.com'.$promo->image)}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                  <?php } else{ ?>
                     <img style="height: 230px;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                  <?php } ?>
               @else
                  <img style="height: 230px;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
               @endif
               </a>
            </div>
         @endforeach
         @endif
      </div>
   </div>
</div>
