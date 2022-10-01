<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
      <meta name="description" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
      <title>{{$title}}</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick-theme.min.css')}}"/>
      <!-- Icofont Icon-->
      <link href="{{asset('vendor/icons/icofont.min.css')}}" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="{{asset('vendor/sidebar/demo.css')}}" rel="stylesheet">
      <!--jquery 3.5.1-->
      <script src="{{asset('js/jquery.min.js')}}"></script>
       <script>
           var jq351 = jQuery.noConflict();
       </script>
       <!-- Font Awesome CSS -->
      <link rel='stylesheet' id='font-awesome-official-css' href='https://use.fontawesome.com/releases/v5.12.0/css/all.css' type='text/css' media='all' integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous" />
      <link rel='stylesheet' id='font-awesome-official-v4shim-css' href='https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css' type='text/css' media='all' integrity="sha384-AL44/7DEVqkvY9j8IjGLGZgFmHAjuHa+2RIWKxDliMNIfSs9g14/BRpYwHrWQgz6" crossorigin="anonymous" />
       <style>

           #search_row:hover{
               background-color: #7ed957ab !important;
           }

           @media only screen and (min-width: 768px){
               .special_offer_slider{
                   height:350px;
               }

               .floating_cart{
                   display:none;
               }

               .floating_cart1{
                   display:none;
               }
               
               .product_custom_image{
                   height:300px;
               }
           }

           @media only screen and (min-width: 1024px){
               .special_offer_slider{
                   height:400px;
               }

               .floating_cart{
                   display:block;
               }

               .floating_cart1{
                   display:block;
               }
               
               .product_custom_image{
                   height:300px;
               }
           }

       </style>

   </head>

   <body class="fixed-bottom-padding">
   <div id="preloaders" class="preloader"></div>
      <div style="z-index: 10; background: #f0f2f5;" class="sticky border-bottom p-3 d-none mobile-nav">
         <div class="title d-flex align-items-center">
            <a href="{{ URL::to('/') }}" class="text-decoration-none text-dark d-flex align-items-center">
               <img class="osahan-logo mr-2" src="{{asset('app/website/logo.png')}}">
               <!--<h4 class="font-weight-bold text-success m-0">Grocery</h4>-->
            </a>
            <!--
             <p class="ml-auto m-0">
               <a href="listing.html" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
               <i class="text-dark icofont-sale-discount"></i>
               <span class="badge badge-danger p-1 ml-1 small">50%</span>
               </a>
            </p>
            -->
            <a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
         </div>
      </div>

      <!-- Dark mode -->
      <!--(also uncomment oshahan js line 181 )<div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div>-->
      <!-- End Dark mode -->
      <!-- Nav bar -->
      

      <section class="py-4 osahan-main-body">
        <div class="container">
            <div style="margin-top:10px">
                <div class="col-6 col-sm-4 col-md-12">
                        @if($MaintenanceInfo->image)
                            <?php if (file_exists("../../naturexbd-manage/public".$MaintenanceInfo->image)){ ?>
                                <div class="d-flex h-100 position-relative">
                                    <img style=" object-fit: contain;" src="{{asset('http://manage.https://naturexbd.com'.$MaintenanceInfo->image)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                </div>
                            <?php } else{ ?>
                                <div class="d-flex h-100 position-relative">
                                    <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                </div>
                            <?php } ?>
                        @else
                            <div class="d-flex h-100 position-relative">
                                <img style=" object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                            </div>
                        @endif
                        
                </div>
                <div class="col-6 col-sm-4 col-md-12 ">
                    <h2 style="text-align: center;">{{$MaintenanceInfo->text}}</h2>
                </div>
            </div>
        </div>
   </section>
   </body>
</html>
