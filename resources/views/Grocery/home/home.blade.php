@extends('grocery.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0 d-none">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{ URL::to('/') }}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
         </div>
      </nav>
      <section class="py-4 osahan-main-body">
          
         <div class="container">
             
             <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" style="height: 100%;">
              @foreach($homepage_banners as $key=>$banner)
            <div class="carousel-item {{$key == 0?'active':''}}">
              <img class="d-block w-100" src="{{asset('https://manage.naturexbd.com'.$banner->banner_image)}}" alt="Naturex slide">
            </div>
            @endforeach
            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
             
             
            <div class="row">
               <div class="col-lg-12">
                  <!-- home page -->
                  <div class="osahan-home-page">
                     <!-- body -->
                     <div class="osahan-body">
                        @include('grocery/layouts/grocery_categories')
                        @if($special_offer_is_active==1)
                            @include('grocery/layouts/grocery_specialOffer')
                        @endif
                        @include('grocery/layouts/grocery_promos')
                        @include('grocery/layouts/grocery_made_for_you')

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
