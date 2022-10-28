<!-- special offer -->
<div class="py-3 osahan-promos">
   <div class="d-flex align-items-center mb-3">
      <h5 class="m-0">Special Offer</h5>
   </div>
   <div class="">
    
        @foreach($special_offer_list as $special_offer)
        <?php
            $special_offer_exist=DB::table('grocery_products')->where('status',"Active")->where('cityID',$cityID)->where('seasonal_id',$special_offer->id)->get();
            if(count($special_offer_exist)>0)
            {
                ?>
                <div class="">
                    <a href="{{ URL::to('/specialOffer/'.base64_encode($special_offer->id)) }}">
                        @if($special_offer->banner)
                            <?php if (file_exists("../../naturexbd-manage/public".$special_offer->banner)){ ?>
                                <img style="width: 100%;background-color: #ffffff;object-fit: cover;" src="{{asset('https://manage.naturexbd.com'.$special_offer->banner)}}" class="img-fluid mx-auto rounded special_offer_slider" alt="Responsive image">
                            <?php } else{ ?>
                                <img style="width: 100%; background-color: #ffffff;object-fit:contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded special_offer_slider" alt="Responsive image">
                            <?php } ?>
                        @else
                            <img style="width: 100%; background-color: #ffffff;object-fit:contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded special_offer_slider" alt="Responsive image">
                        @endif
                    </a>
                </div>
                
                <?php
            }
        ?>
            
        @endforeach
      <!-- </div> -->
   </div>
</div>
