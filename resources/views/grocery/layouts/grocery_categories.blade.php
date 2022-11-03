<!-- categories -->
<div class="pt-3 pb-2  osahan-categories">
   <div class="d-flex align-items-center mb-2">
      <h5 class="m-0">What are you looking for?</h5>
   </div>

   {{-- <div class="categories-slider"> --}}
      @foreach($category_all as $category)
         <div class="row">
            <div class="col-md-4">
            </div>
            
            <div class="col-md-4">
               <div class="my-2 px-2 py-3 c-it bg-white shadow-sm rounded text-center ">
                  <a href="{{ URL::to('/grocery_product_category/'.$category->category) }}">
                        {{-- @if($category->thumbnail)
                           <?php if (file_exists("http://127.0.0.1:8000".$category->thumbnail)){ ?>
                              <img src="{{asset('http://127.0.0.1:8000'.$category->thumbnail)}}" class="img-fluid px-2 mx-auto">
                           <?php } else{ ?>
                              <img src="{{asset('/B0eS.gif')}}" class="img-fluid px-2 mx-auto">
                           <?php } ?>
                        @else
                           <img src="{{asset('/B0eS.gif')}}" class="img-fluid px-2 mx-auto">
                        @endif --}}

                        @if($category->thumbnail)
                        <img src="{{asset('http://127.0.0.1:8000'.$category->thumbnail)}}" class="img-fluid px-2 mx-auto">
                        @else
                           <img src="{{asset('/B0eS.gif')}}" class="img-fluid px-2 mx-auto">
                        @endif
                     <p class="m-0 pt-2 text-muted text-center">{{$category->category}}</p>
                  </a>
               </div>
            </div>

            <div class="col-md-4">
            </div>
      
         </div>
      @endforeach
   {{-- </div> --}}
</div>
