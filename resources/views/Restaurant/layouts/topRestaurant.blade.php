<!-- Promos -->
<div class="py-3 osahan-promos">
   <div class="d-flex align-items-center mb-3">
      <h5 class="m-0">Top 5 Restaurant</h5>
      <!-- <a href="promos.html" class="ml-auto btn btn-outline-success btn-sm">See more</a> -->
   </div>
   <div class="promo-slider pb-0 mb-0">
      <!-- <div class="promo-slider"> -->
         @foreach($topRestaurant as $topRes)
            <div class="osahan-slider-item mx-2">
                <div class="my-2 px-2 py-3 c-it bg-white shadow-sm rounded text-center ">
                    <a href="{{ URL::to('/restaurant_details/'.base64_encode($topRes->id)) }}">
                        @if($topRes->logo)
                            <?php if (file_exists("../../naturexbd-manage/public".$topRes->logo)){ ?>
                                <img style="height: 230px" src="{{asset('https://manage.naturexbd.com'.$topRes->logo)}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                            <?php } else{ ?>
                                <img style="height: 230px;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                            <?php } ?>
                        @else
                            <img style="height: 230px;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                        @endif
                        <p class="m-0 pt-2 text-muted text-center">{{$topRes->name}}</p>
                    </a>
                </div>
            </div>
         @endforeach
      <!-- </div> -->
   </div>
</div>
