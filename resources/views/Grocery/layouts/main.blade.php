<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="author" content="">

      <!-- HTML Meta Tags -->
    <meta name="title" content="NatureX">
    <meta name="description" content="We aim to deliver fresh and organic products from nature to the people of the country. NatureX has started its journey as a sister concern of Khaidai Today Ltd.">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Naturex">
    <meta itemprop="description" content="We aim to deliver fresh and organic products from nature to the people of the country. NatureX has started its journey as a sister concern of Khaidai Today Ltd.">
    <meta itemprop="image" content="{{asset('img/meta_image.jpg')}}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="http://naturexbd.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="NatureX">
    <meta property="og:description" content="We aim to deliver fresh and organic products from nature to the people of the country. NatureX has started its journey as a sister concern of Khaidai Today Ltd.">
    <meta property="og:image" content="{{asset('img/meta_image.jpg')}}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NatureX">
    <meta name="twitter:description" content="We aim to deliver fresh and organic products from nature to the people of the country. NatureX has started its journey as a sister concern of Khaidai Today Ltd.">
    <meta name="twitter:image" content="{{asset('img/meta_image.jpg')}}">



      <!-- Pencil Analytics -->
      <script data-host="https://analytics.penciltech.co" data-dnt="false" src="https://analytics.penciltech.co/js/script.js" id="ZwSg9rf6GA" async defer></script>
      <!-- Pencil Analytics -->

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
      <!--jquery 1.8.3-->
      <script src="https://code.jquery.com/jquery-1.8.3.min.js" integrity="sha256-YcbK69I5IXQftf/mYD8WY0/KmEDCv1asggHpJk1trM8=" crossorigin="anonymous"></script>
       <script>
           var jq183 = jQuery.noConflict();
       </script>
      <!--jquery 3.5.1-->
      <script src="{{asset('js/jquery.min.js')}}"></script>
       <script>
           var jq351 = jQuery.noConflict();
       </script>
       <!-- Font Awesome CSS -->
      <link rel='stylesheet' id='font-awesome-official-css' href='https://use.fontawesome.com/releases/v5.12.0/css/all.css' type='text/css' media='all' integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous" />
      <link rel='stylesheet' id='font-awesome-official-v4shim-css' href='https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css' type='text/css' media='all' integrity="sha384-AL44/7DEVqkvY9j8IjGLGZgFmHAjuHa+2RIWKxDliMNIfSs9g14/BRpYwHrWQgz6" crossorigin="anonymous" />
       <style>
           .preloader
           {
               /*position: fixed;*/
               /*left: 0px;*/
               /*top: 0px;*/
               /*width: 100%;*/
               /*height: 100%;*/
               /*z-index: 9999;*/
               /*backdrop-filter: blur( 10.0px );*/
               /*-webkit-backdrop-filter: blur( 10.0px );*/
                                /*background: url('https://www.govetoyota.com.au/2018toyota/images/loading_blue.gif') 50% 50% no-repeat rgba(249,249,249,1) ;*/ /*this line commented*/
               /*background: url({{asset('loader4.svg')}}) 50% 50% no-repeat ;*/
               /*background-color: rgba( 0, 0, 0, 0.30 );*/
               /*background-size: 150px 150px;*/
           }

           #search_row:hover{
               background-color: #8DC63Fab !important;
           }

           @media only screen and (min-width: 180px){
               .special_offer_slider{
                   height:100px;
               }


               .product_custom_image{
                   height:200px;
               }

               .modal-cus{
                   width: 100% !important;
               }

               .modal-dialog-cus{
                   max-width: 100% !important;
               }
           }

           @media only screen and (min-width: 380px){
               .special_offer_slider{
                   height:150px;
               }


               .product_custom_image{
                   height:180px;
               }

               .modal-cus{
                   width: 100% !important;
               }

               .modal-dialog-cus{
                   max-width: 100% !important;
               }
           }

           @media only screen and (min-width: 480px){
               .special_offer_slider{
                   height:230px;
               }

               .product_custom_image{
                   height:250px;
               }

               .modal-cus{
                   width: 100% !important;
               }

               .modal-dialog-cus{
                   max-width: 100% !important;
               }

           }

           @media only screen and (min-width: 768px){
               .special_offer_slider{
                   height:350px;
               }


               .product_custom_image{
                   height:300px;
               }

               .modal-cus{
                   width: 400px !important;
               }

               .modal-dialog-cus{
                   max-width: 400px !important;
               }
           }

           @media only screen and (min-width: 1024px){
               .special_offer_slider{
                   height:400px;
               }


               .product_custom_image{
                   height:300px;
               }

               .modal-cus{
                   width: 400px !important;
               }

               .modal-dialog-cus{
                   max-width: 400px !important;
               }
           }

       </style>
       <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -27px;
            position: relative;
            z-index: 2;
            padding-right: 25px;
            cursor: pointer;
            font-size: 1.3em;
         }

          .required:after {
            content:" *";
            color: red;
          }

        </style>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-QPEKMGNYLZ"></script>
        <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'G-QPEKMGNYLZ');
        </script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/60931b3cb1d5182476b60ed6/1f4va4p87';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
   </head>
   <!--<body class="fixed-bottom-padding" onload="loaderStop()">-->
    <body class="fixed-bottom-padding">
      <div id="preloaders" class="preloader"></div>
      <div style="z-index: 10; background: #ffffff;" class="sticky border-bottom p-3 d-none mobile-nav">
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
         <div class="input-group pt-3 mr-sm-2 col-lg-12">
              <input type="search" class="form-control product_search" placeholder="Search for Products..">
              <div class="input-group-prepend">
                 <div class="btn btn-success rounded-right"><i class="icofont-search"></i></div>
              </div>
               <table class="search_table" style="width: 90%;position: absolute;top: 50px;">
                   <tbody>

                   </tbody>
               </table>
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
      <div id="nav_bar" style="z-index: 9999999;" class="sticky bg-white shadow-sm osahan-main-nav">
         <nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container">
            <a class="navbar-brand mr-0" href="{{ URL::to('/') }}"><img class="img-fluid logo-img " src="{{asset('app/website/logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ml-3 d-flex align-items-center">
               <div class="dropdown mr-3">
                  <a class="text-dark dropdown-toggle d-flex align-items-center osahan-location-drop" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <div><i class="icofont-location-pin d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm mr-2"></i></div>
                     <div class="location_holder">
                        <span style="font-size: 1vw;" class="current_location">{{$cur_location}}</span>
                     </div>
                  </a>
                   <!-- <div class="dropdown-menu osahan-select-loaction p-3" aria-labelledby="navbarDropdown">
                      <span>Select your city to start shopping</span>
                      <form class="form-inline my-2">

                        <div class="input-group p-0 col-lg-12">
                           <input type="text" class="form-control form-control-sm" id="inlineFormInputGroupUsername2" placeholder="Search Location">
                           <div class="input-group-prepend">
                              <div class="btn btn-success rounded-right btn-sm"><i class="icofont-location-arrow"></i> Detect</div>
                           </div>
                        </div>
                     </form>
                     <div class="city pt-2">
                        <h6>Top Citys</h6>
                        <p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Cumilla</a></p>
                        <p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Chittagong</a></p>
                        <p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Barishal</a></p>
                        <p class="m-0 py-1"><a href="#" class="text-dark">Rangpur</a></p>
                     </div>
                  </div>-->
               </div>
               <!-- search  -->
               <div class="input-group mr-sm-2 col-lg-12">
                  <input type="search" class="form-control product_search" placeholder="Search for Products..">
                  <div class="input-group-prepend">
                     <div class="btn btn-success rounded-right"><i class="icofont-search"></i></div>
                  </div>
                   <table class="search_table" style="width: 400px;position: absolute;top: 34px;">
                       <tbody>

                       </tbody>
                   </table>
               </div>
            </div>
            <div class="ml-auto d-flex align-items-center">
               <!-- login/signup -->
               <!--<a href="#" data-toggle="modal" data-target="#login" class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
               <i class="icofont-login"></i>
               </a>-->
               @if(session()->has('client_id'))
                  <!-- my account -->
                  <div class="dropdown mr-3">
                     <a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     @if(session()->has('client_img')!='0' || session()->has('client_img')!='no image' )
                        <?php if (file_exists("../public/user_images/".session('client_img'))){ ?>
                           <img src="{{asset('user_images/'.session('client_img'))}}" class="img-fluid rounded-circle header-user mr-2">
                        <?php } else{ ?>
                           <img src="{{asset('user_images/tenor.gif')}}" class="img-fluid rounded-circle header-user mr-2">
                        <?php } ?>
                     @else
                        <img src="{{asset('user_images/tenor.gif')}}" class="img-fluid rounded-circle header-user mr-2">
                     @endif
                     </a>
                     <div class="dropdown-menu dropdown-menu-right top-profile-drop" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ URL::to('/profile') }}">My account</a>
                        <!-- <a class="dropdown-item" href="my_address.html">My address</a> -->
                        <a href="#!" class="dropdown-item contactUsModel" onclick="">Contact</a>
                        <a class="dropdown-item termsConditionsModel" href="#!" onclick="">Terms & conditions</a>
                        <a href="#!" class="dropdown-item privacyPolicyModel" onclick="">Privacy Policy</a>
                        <!-- <a class="dropdown-item" href="help_support.html">Help & support</a> -->
                        <!-- <a class="dropdown-item" href="help_ticket.html">Help ticket</a> -->
                     </div>
                  </div>
               @endif
               <!-- notification -->
               <div class="dropdown">
               <!-- <a href="#" class="mr-2 text-dark dropdown-toggle not-drop" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="icofont-notification d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm">
                         <p class="mt-n2 mb-0 font-weight-bold text-success">2</p>
                     </i>
                  </a> -->
                  <div class="dropdown-menu dropdown-menu-right p-0 osahan-notifications-main" aria-labelledby="dropdownMenuNotification">
                     <!-- notification 1 -->
                     <div class="osahan-notifications bg-white border-bottom p-2">
                        <div class="position-absolute ml-n1 py-2"><i class="icofont-check-circled text-white bg-success rounded-pill p-1"></i></div>
                        <a href="status_complete.html" class="text-decoration-none text-dark">
                           <div class="notifiction small">
                              <div class="ml-3">
                                 <p class="font-weight-bold mb-1">Yay! Order Complete</p>
                                 <p class="small m-0"><i class="icofont-ui-calendar"></i> Today, 05:14 AM</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <!-- notification 2 -->
                     <div class="osahan-notifications bg-white border-bottom p-2">
                        <a href="status_onprocess.html" class="text-decoration-none text-muted">
                           <div class="notifiction small">
                              <div class="ml-3">
                                 <p class="font-weight-bold mb-1">Yipiee. order Success</p>
                                 <p class="small m-0"><i class="icofont-ui-calendar"></i> Monday, 08:30 PM</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <!-- notification 3 -->
                     <div class="osahan-notifications bg-white p-2">
                        <a href="status_onprocess.html" class="text-decoration-none text-muted">
                           <div class="notifiction small">
                              <div class="ml-3">
                                 <p class="font-weight-bold mb-1">New Promos Coming</p>
                                 <p class="small m-0"><i class="icofont-ui-calendar"></i> Sunday, 10:30 AM</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <!-- cart -->
               <!--<a href="cart.html" class="ml-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
               <i class="icofont-shopping-cart"></i>
               </a>-->
               <!--<a href="#" data-toggle="modal" data-target="#cart" class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
                  <i class="icofont-shopping-cart"></i>
               </a>-->
               @if(session()->has('client_id'))
                  <a href="{{URL::to('/signout')}}" class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm" >
                     <i class="icofont-logout"> Sign out </i>
                  </a>
               @else
                  <a href="{{URL::to('/signin')}}" class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm" >
                     <i class="icofont-login"> Sign in </i>
                  </a>
               @endif
            </div>
         </nav>
         <!-- Menu bar -->
         <div class="bg-color-head">
            <div class="container menu-bar d-flex align-items-center">
               <ul class="list-unstyled form-inline mb-0">
                  <li class="nav-item active">
                     <a class="nav-link text-white pl-0" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                     <!--<a class="nav-link text-white pl-0" href="{{URL::to('/restaurant')}}">Restaurant </a>-->
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($category_all as $category)
                           <a class="dropdown-item" href="{{ URL::to('/grocery_product_category/'.$category->category) }}">
                           {{$category->category}}
                           </a>
                        @endforeach
                     </div>
                  </li>

{{--                   start writing by ruhul--}}
                   <li class="nav-item active">
                       <a class="nav-link text-white pl-0" href="{{URL::to('/grocery_blog')}}">Blog <span class="sr-only">(current)</span></a>
                   </li>
{{--                   end writing by ruhul--}}

                  <!--<li class="nav-item active">-->
                  <!--   <a class="nav-link text-white pl-0" href="{{URL::to('/offer_Product')}}">Offer </a>-->
                  <!--</li>-->
                   @if(session()->has('client_id'))
                      <li class="nav-item active">
                         <a class="nav-link text-white pl-0" href="{{URL::to('/MyOrder')}}">My Order </a>
                      </li>
                   @endif
                  <!-- <li class="nav-item dropdown">
                     <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Products
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="listing.html">Listing</a>
                        <a class="dropdown-item" href="product_details.html">Detail</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="picks_today.html">Trending</a>
                        <a class="dropdown-item" href="recommend.html">Recommended</a>
                        <a class="dropdown-item" href="fresh_vegan.html">Most Popular</a>
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Checkout Process
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cart.html">Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                        <a class="dropdown-item" href="successful.html">Successful</a>
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     My Order
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my_order.html">My order</a>
                        <a class="dropdown-item" href="status_complete.html">Status Complete</a>
                        <a class="dropdown-item" href="status_onprocess.html">Status on Process</a>
                        <a class="dropdown-item" href="status_canceled.html">Status Canceled</a>
                        <a class="dropdown-item" href="review.html">Review</a>
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Extra Pages
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="verification.html">Verification</a>
                        <a class="dropdown-item" href="promos.html">Promos</a>
                        <a class="dropdown-item" href="promo_details.html">Promo Details</a>
                        <a class="dropdown-item" href="terms_conditions.html">Terms & Conditions</a>
                        <a class="dropdown-item" href="privacy.html">Privacy</a>
                        <a class="dropdown-item" href="terms&conditions.html">Conditions</a>
                        <a class="dropdown-item" href="help_support.html">Help Support</a>
                        <a class="dropdown-item" href="help_ticket.html">Help Ticket</a>
                        <a class="dropdown-item" href="refund_payment.html">Refund Payment</a>
                        <a class="dropdown-item" href="faq.html">FAQ</a>
                        <a class="dropdown-item" href="{{ URL::to('/signin') }}">Sign In</a>
                        <a class="dropdown-item" href="signup.html">Sign Up</a>
                        <a class="dropdown-item" href="search.html">Search</a>
                     </div>
                  </li> -->
               </ul>
               <div class="list-unstyled form-inline mb-0 ml-auto">
                  <!-- <a href="picks_today.html" class="text-white px-3 py-2">Trending</a>
                  <a href="promos.html" class="text-white bg-offer px-3 py-2"><i class="icofont-sale-discount h6"></i>Promos</a> -->
               </div>
            </div>
         </div>
      </div>
      @yield('content')
      <!-- footer -->
      <footer class="section-footer border-top bg-white">
         <section class="footer-top py-4">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-inline footer_top_custom">
                        <select class="custom-select mr-2">
                           <option>BDT</option>
                           <!-- <option>USD</option>
                           <option>EUR</option>
                           <option>RUBL</option> -->
                        </select>
                        <select class="custom-select">
                           <option>Bangladesh</option>
                           <!-- <option>United States</option>
                           <option>Russia</option>
                           <option>Uzbekistan</option> -->
                        </select>
                     </div>
                     <!-- form-inline.// -->
                  </div>
                  <!-- <div class="col-md-4">
                     <form>
                        <div class="input-group">
                           <input type="text" placeholder="Email" class="form-control" name="">
                           <span class="input-group-append">
                           <button type="submit" class="btn btn-success"> Subscribe</button>
                           </span>
                        </div>
                     </form>
                  </div>-->
                  <div class="col-md-6 text-md-right">
                     <a href="https://web.facebook.com/naturexbdofficial" class="btn btn-icon btn-light"><i class="icofont-facebook"></i></a>
                     <a href="https://web.facebook.com/naturexbdofficial" class="btn btn-icon btn-light"><i class="icofont-twitter"></i></a>
                     <a href="https://web.facebook.com/naturexbdofficial" class="btn btn-icon btn-light"><i class="icofont-instagram"></i></a>
                     <a href="https://web.facebook.com/naturexbdofficial" class="btn btn-icon btn-light"><i class="icofont-youtube"></i></a>
                  </div>
               </div>
               <!-- row.// -->
            </div>
            <!-- //container -->
         </section>
         <!-- footer-top.// -->
         <section class="footer-main border-top pt-4 pb-4">
            <div class="container">
               <!-- <div class="row">
                  <aside class="col-md">
                     <h6 class="title">Products</h6>
                     <ul class="list-unstyled list-padding">
                        <li> <a href="listing.html" class="text-dark">Listing</a></li>
                        <li> <a href="product_details.html" class="text-dark">Detail</a></li>
                        <li> <a href="picks_today.html" class="text-dark">Trending</a></li>
                        <li> <a href="recommend.html" class="text-dark">Recommended</a></li>
                        <li> <a href="fresh_vegan.html" class="text-dark">Most Popular</a></li>
                     </ul>
                  </aside>
                  <aside class="col-md">
                     <h6 class="title">Checkout Process</h6>
                     <ul class="list-unstyled list-padding">
                        <li> <a href="cart.html" class="text-dark">Cart</a></li>
                        <li> <a href="cart.html" class="text-dark">Order Address</a></li>
                        <li> <a href="cart.html" class="text-dark">Delivery Time</a></li>
                        <li> <a href="cart.html" class="text-dark">Order Payment</a></li>
                        <li> <a href="checkout.html" class="text-dark">Checkout</a></li>
                        <li> <a href="successful.html" class="text-dark">Successful</a></li>
                     </ul>
                  </aside>
                  <aside class="col-md">
                     <h6 class="title">My Order</h6>
                     <ul class="list-unstyled list-padding">
                        <li> <a href="my_order.html" class="text-dark">My order</a></li>
                        <li> <a href="status_complete.html" class="text-dark">Status Complete</a></li>
                        <li> <a href="status_onprocess.html" class="text-dark">Status on Process</a></li>
                        <li> <a href="status_canceled.html" class="text-dark">Status Canceled</a></li>
                        <li> <a href="review.html" class="text-dark">Review</a></li>
                     </ul>
                  </aside>
                  <aside class="col-md">
                     <h6 class="title">My Account</h6>
                     <ul class="list-unstyled list-padding">
                        <li> <a class="text-dark" href="{{ URL::to('/profile') }}"> My account</a></li>
                        <li> <a class="text-dark" href="promos.html"> Promos</a></li>
                        <li> <a class="text-dark" href="my_address.html"> My address</a></li>
                        <li> <a class="text-dark" href="terms_conditions.html"> Terms &amp; conditions</a></li>
                        <li> <a class="text-dark" href="help_support.html"> Help &amp; support</a></li>
                        <li> <a class="text-dark" href="help_ticket.html"> Help ticket</a></li>
                        <li> <a class="text-dark" href="{{ URL::to('/logout') }}"> Logout</a></li>
                     </ul>
                  </aside>
                  <aside class="col-md">
                     <h6 class="title">Extra Pages</h6>
                     <ul class="list-unstyled list-padding">
                        <li><a href="promo_details.html" class="text-dark"> Promo Details </a></li>
                        <li><a href="terms_conditions.html" class="text-dark"> Conditions </a></li>
                        <li><a href="help_support.html" class="text-dark"> Help Support </a></li>
                        <li><a href="refund_payment.html" class="text-dark"> Refund Payment </a></li>
                        <li><a href="faq.html" class="text-dark"> FAQ </a></li>
                        <li><a href="{{ URL::to('/signin') }}" class="text-dark"> Sign In </a></li>
                     </ul>
                  </aside>
               </div> -->
               <!-- row.// -->
               <div class="row">
                  <div class="col-lg-3 col-md-3 mb-30">
                     <div class="footer-widget logo-widget mr-20">
                        <div class="footer-logo">
                              <a href="https://https://naturexbd.com"><img src="{{asset('/app/website/logo.png')}}" alt="footer logo" width="210"></a>
                        </div>
                        <!-- <p style="font-size: 14px; margin-top:20px;"><b>Naturex</b> started it's journey in Rangpur and Bogra in 2018 with the tagline <b>DELIVERING HAPPINESS</b> and served food items 40 thousand+ times.</p> -->
                        <p style="font-size: 14px; margin-top:20px;">We aim to deliver fresh and organic products from nature to the people of the country. <b>NatureX</b> has started its journey as a sister concern of <b>Khaidai Today Ltd.</b></p>
                        <!-- <div class="col-md-4 text-md-right">
                           <a href="https://www.facebook.com/khaidaitoday/" class="btn btn-icon btn-light"><i class="icofont-facebook"></i></a>
                           <a href="https://www.instagram.com/khaidaitoday/" class="btn btn-icon btn-light"><i class="icofont-instagram"></i></a>
                        </div> -->
                     </div>
                  </div>

            <div class="col-lg-3 col-md-3 mb-30">
                <div class="footer-widget links-widget float-lg-right mr-40">
                     <h6 class="title"><b>Company</b></h6>
                     <ul class="list-unstyled list-padding">
                        <li> <a href="#!" class="text-dark aboutModel" onclick="">About Us</a></li>
                        <li> <a href="#!" class="text-dark contactUsModel" onclick="">Contact</a></li>
                        <li> <a href="#!" class="text-dark termsConditionsModel" onclick="">Terms &amp; Condition</a></li>
                        <li> <a href="#!" class="text-dark privacyPolicyModel" onclick="">Privacy Policy</a></li>
                        <li> <a href="#!" class="text-dark returnRefundCanModel" onclick="">Refund, Return &amp; Cancellation</a></li>
                     </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 mb-30">
                <div class="footer-widget form-widget ml-115 mr-30">
                     <h6 class="title"><b>Business</b></h6>
                    <p style="font-size: 14px;">Do you have any partership proposal or want any collaboration with Naturex ? Please send your queries at <a href="mailto:csr@naturexbd.com" style="color: #8DC63F">csr@naturexbd.com</a>. We will get back to you!</p>
                    <!-- <form class="subscribe">
                        <input type="email" placeholder="Your Email" required>
                        <button type="submit">Send</button>
                    </form> -->
                </div>
            </div>

            <div class="col-lg-2 col-md-2 mb-30" >
                <div class="footer-widget pament-widget float-lg-right">
                    <h6 class="title"><b>Product from</b></h6>
                    <div class="row">
                        <div class="col-md-6 col-3"><a href="https://khaidaitoday.com/" target="_blank"><img src="{{asset('khaidai.png')}}" alt="" height="50"></a></div>
                    </div>
                    <br>
                    <h6 class="title"><b>Brand Partner</b></h6>
                    <div class="row">
                        <div class="col-md-6 col-3"><a href="#" target="_blank"><img src="{{asset('img/robi-elite.png')}}" alt="" height="50"></a></div>
                    </div>
                    <br>
                </div>
            </div>

             <div class="col-lg-2 col-md-5 mb-30">
                <div class="footer-widget pament-widget float-lg-right">
                    <h6 class="title"><b>Payment Partner</b></h6>
                    <div class="col-md-6 col-3" ><a href="#" target="_blank"><img class="" src="{{asset('img/bkash.png')}}" alt="" height="50"></a></div>
                    <br>
                    <div class="col-md-6 col-3" ><a href="#" target="_blank"><img class="" src="{{asset('img/nagad.png')}}" alt="" height="50"></a></div>

                </div>
            </div>
        </div>
            </div>
            <!-- //container -->
         </section>
         <!-- footer-top.// -->
         <section class="footer-bottom border-top py-4">
            <div class="container">
               <div class="row">
                  <!-- <div class="col-md-6">
                     <span class="pr-2">© 2020 Grofarweb</span>
                     <span class="pr-2"><a href="privacy.html" class="text-dark">Privacy</a></span>
                     <span class="pr-2"><a href="terms&conditions.html" class="text-dark">Terms & Conditions</a></span>
                  </div>
                  <div class="col-md-6 text-md-right">
                     <a href=""><img src="{{asset('img/appstore.png')}}" height="30"></a>
                     <a href=""><img src="{{asset('img/playmarket.png')}}" height="30"></a>
                  </div> -->
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="copyright text-center pl-10 pr-10 pt-30 pb-100 mt-55 rmt-35 mb-65" style="font-size: 14px">
                              <p style="margin-bottom:0px;">©2021 Copyright Khaidai Today Ltd. | All rights reserved<br>
                                 Helpline: <a href="tel:+8801791865234" class="footer-link" style="color: #8DC63F;">Helpline:  01791 865 234</a>
                                 | Made by <a href="https://penciltech.co" class="footer-link" target="_blank" style="color: #8DC63F;">PencilTech</a></p>
                           </div>
                           <!-- copyright -->
                        </div>
                        <!-- col-lg-12 -->
                     </div>
                     <!-- row -->
                  </div>
                  <!-- col-md-12 -->
               </div>
               <!-- row.// -->
            </div>
            <!-- //container -->
         </section>

      </footer>
      <?php
            $client_id = session('client_id');
            $guest_id = session('guest_id');
            if(!$client_id && !$guest_id){
                   Session::put('guest_id',rand(1000,99999));
                   $guest_id = session('guest_id');
            }

          $cart_data=DB::table('grocery_temp_cart');
          if($client_id){
            $cart_data->where('client_id',$client_id);
          }else{
               $cart_data->where('guest_id',$guest_id);
          }
          $cart_data = $cart_data->get();

          $cart_item=count($cart_data);
          $total_price=0;
        //   dump(session('guest_id'));
          ?>
          @include('grocery/layouts/cart_sidebar')
          @include('grocery/layouts/mobile_sidenav')
      <a href="#" data-toggle="modal" data-target="#cart" class="mr-2 text-dark bg-light  p-2 icofont-size border shadow-sm floating_cart" style="z-index:999;text-align:center;line-height: 0.8rem;background-color: #8DC63F !important;box-shadow: 0px 0px 3px #00000069!important;font-size: 25px;color: #333 !important;top: 450px;position: fixed;right: 0; width:57px;border: none !important;">
          <i class="icofont-shopping-cart"></i><br>
          <label class="floating_cart_item" items="{{$cart_item}}" style="color: #333;font-weight: 900;font-size: 18px;">{{$cart_item}}</label>
      </a>
      <a href="#" data-toggle="modal" data-target="#cart" class="mr-2 text-dark bg-light  p-2 icofont-size border shadow-sm floating_cart1" style="z-index:999;text-align:center;line-height: 0.1rem;background-color: #fff !important;box-shadow: 0px 3px 3px #00000069!important;font-size: 20px;color: #333 !important;top: 502px;position: fixed;right: 0; width:57px;">
          <label style="color: #333;font-weight: 900;">ITEMS</label>
      </a>
      <!-- Modal -->
      <!--<div class="modal fade" id="add_cart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <form class="" method="post">
                      @csrf
                      <div class="modal-body">
                          <div class="form-row">

                              <img src="{{asset('add_cart.gif')}}" style="width:150px; margin:auto;"/>
                          </div>
                          <div align="center">
                              <h3 class="modal-title" id="exampleModalLabel">Product Added to Cart!!</h3>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>-->

    <div class="modal fade" id="loginAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form class="" method="post">
                  @csrf
                  <div class="modal-body">
                      <div class="form-row">

                          <img src="{{asset('error_bgWhite.gif')}}" style="width:150px; margin:auto;"/>
                      </div>
                      <div align="center">
                          <h3 class="modal-title" id="exampleModalLabel">Please Login First!!</h3>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </div>

    <div class="modal fade" id="emptyCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form class="" method="post">
                  @csrf
                  <div class="modal-body">
                      <div class="form-row">

                          <img src="{{asset('cart_empty1.gif')}}" style="width:150px; margin:auto;"/>
                      </div>
                      <div align="center">
                          <h3 class="modal-title" id="exampleModalLabel">Your Cart is Empty!!</h3>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </div>
    <div class="modal fade" id="aboutModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog footer_modal modal-dialog-centered" >
          <div class="modal-content modal-content1">
              <div class="modal-header" style="padding: 1rem 2rem;">
                  <h4 class="modal-title" id="exampleModalLabel"><b>About NatureX</b></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                  <div class="modal-body" style="padding: 1rem 2rem;">
                      <div align="center">
                          <p class="modal-title" id="exampleModalLabel" style="color: #414243; text-align: justify;">
                          <b>Naturex</b>has started its journey as a sister concern of Khaidai Today Ltd. NatureX is marketing the product by collecting pure fruits, nuts, vegetables, spices, mustard oil, honey from remote areas of Bangladesh and processing them in specific places and packaging them at the right time.
                          <br><br>
                          <b>About Khaidai Today:</b>
                          <br><br>
                            Khaidai Today has been masterminded under the Guidance of the CEO (Chief Executive Officer) of Khaidai Today Ltd. , Ar Aminul Islam Shagor. With the experience from StartUp Bangladesh, Parking Koi Inc. Ltd. and TOOLBOX. Khaidai Today has modeled itself to be a customer first company with 100% utilization of data analytics. Khaidai Today started its journey back in 2017 with the tagline DELIVERING HAPPINESS and served 50,000+ times of restaurant foods. Following the success of the restaurant food delivery service at Rangpur and Bogra we have started our grocery delivery service, so you can now order your daily needs essential groceries, vegetables, fish, meat, fruits, baby care items, chocolates,OTC medicine and restaurant food if available, through the app and website. At this moment we have 5 warehouses with 100+ delivery men actively working in Dhaka. Services provided by Khaidai Today are handled delivery service for the best of the best experience in town.

                          <br><br>
                          If you have any queries please let us know in our mail, hotline or via app.
                          <br>
                            Mail: support@naturexbd.com
                            <br>
                            Hotline: 01791 865 233, 01791 865 234
                            <br>
                            Thanks a bunch for being with NatureX.

                          </p>
                      </div>
                  </div>
          </div>
      </div>
    </div>

    <div class="modal fade" id="contactUsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog footer_modal modal-dialog-centered" >
            <div class="modal-content modal-content1">
                <div class="modal-header" style="padding: 1rem 2rem;">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Contact Naturex</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" style="padding: 1rem 2rem;">
                        <div align="center">
                            <p class="modal-title" id="exampleModalLabel" style="color: #414243; text-align: justify;">
                            <b>Order anytime we will deliver within a few hours.</b>
                            <br><br> At Naturex, you’re never a guest, You’re our family member. So, If you have any queries please let us know in our mail, hotline or via app.
                            <br><br><br>
                            Mail: support@naturexbd.com
                            <br>
                            Hotline: 01791 865 233, 01791 865 234
                            <br>
                            Thanks a bunch for being with NatureX.
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="termsConditionsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog footer_modal modal-dialog-centered" >
            <div class="modal-content modal-content1">
                <div class="modal-header" style="padding: 1rem 2rem;">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Terms & Conditions</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" style="padding: 1rem 2rem;">
                        <div align="center">
                            <p class="modal-title" id="exampleModalLabel" style="color: #414243; text-align: justify;">
                            <b>1. Terms of Use </b>
                                <br><br>
                                1.1 Welcome to naturexbd.com by Khaidai Today Ltd. (“NatureX”) provides access to the naturexbd.com website or the mobile application/app or any other media ("Website") to you subject to the terms and conditions (“Terms”) set out on this page. By using the Website, you, a registered or guest user in terms of the eligibility criteria set out herein (“User”) agree to be bound by the Terms. Please read them carefully as your continued usage of the Website, you signify your agreement to be bound by these Terms. If you do not want to be bound by the Terms, you must not subscribe to or use the Website or our services.
                                <br><br>
                                1.2 By implicitly or expressly accepting these Terms, you also accept and agree to be bound by NatureX Policies (including but not limited to Privacy Policy as amended from time to time.
                                <br><br>
                                1.3 In these Terms, references to "you", "User" shall mean the end user/customer accessing the Website, its contents and using the Services offered through the Website. References to the “Website”, "NatureX", “naturexbd.com”, "we", "us" and "our" shall mean the Website and/or NatureX Limited.
                                <br><br>
                                1.4 The contents set out herein form an electronic record in terms of তথ্য ও যোগাযোগ প্রযুক্তি আইন, ২০০৬ (Information & Communication Technology Act, 2006) and rules there under as applicable and as amended from time to time. As such, this document does not require any physical or digital signatures and forms a valid and binding agreement between the Website and the User.
                                <br><br>
                                1.5 The Website is operated by NatureX Limited., a company incorporated under the laws of Bangladesh having its registered office at Arma Majeda Malik Tower, 3rd Floor, Merul Badda, Dhaka, Bangladesh. All references to the Website in these Terms shall deem to refer to the aforesaid entity in inclusion of the online portal.
                                <br><br>
                                1.6 This Website may also contain links to other websites, which are not operated by NatureX, and NatureX has no control over the linked sites and accepts no responsibility for them or for any loss or damage that may arise from your use of them. Your use of the linked sites will be subject to the terms of use and service contained within each such site.
                                <br><br>
                                1.7 We reserve the right to change these Terms at any time. Such changes will be effective when posted on the Website. By continuing to use the Website after we post any such changes, you accept the Terms as modified.
                                <br><br>
                                1.8 These Terms will continue to apply until terminated by either You or NatureX in accordance with the terms set out below:
                                <br><br>
                                1.9 The agreement with NatureX Can be terminated by (i) not accessing the Website; or (ii) closing Your Account, if such option has been made available to You.
                                <br><br>
                                1.10 Notwithstanding the foregoing, these provisions set out in these Terms which by their very naturex are meant to survive termination, shall survive the termination / expiry of this agreement.
                                <br><br>
                                <b> 2. Eligibility </b>
                                <br><br>
                                2.1 Use of the Website is available only to such persons who can legally contract under the Contract Act, 1872.
                                <br><br>
                                2.2 If you are a minor i.e. under the age of 18 years, you shall not register as a user of naturexbd.com and shall not transact on or use the Website. As a minor if you wish to use or transact on a website, such use or transaction may be made by your legal guardian or parents on the Website. NatureX reserves the right to terminate your membership and / or refuse to provide you with access to the website if it is brought to NatureX’s notice or if it is discovered that you are under the age of 18 years.
                                <br><br>
                                2.3 By accepting the Terms or using or transacting on the Website, the User irrevocably declares and undertakes that he/she is of legal age i.e. 18 years or older and capable of entering into a binding contract and such usage shall be deemed to form a contract between the Website and such User to the extent permissible under applicable laws.
                                <br><br>
                                2.4 NatureX is delivering over 6 districts now. They are delivering goods inside Dhaka City, Rajshahi, Chattagram, Mymensingh, Khulna, Rangpur. Khaidai offers a very fast delivery charge and ensures the quality products.
                                <br><br>
                                <b>3. Communication</b>
                                 <br><br>
                                3.1 When you use naturexbd.com, or contact us via phone or email, you consent to receive communication from us. You authorize us to communicate with you by email, SMS, phone call or by posting notices on the website or by any other mode of communication. For contractual purposes, you consent to receive communications (including transactional, promotional and/or commercial messages), from us with respect to your use of the website and/or your order placed on the Website. Additionally any disclosures posted on the site, or sent to you by email fulfill the legal obligation of communication made in writing.
                                 <br><br>
                                <b>4. Your Account and Responsibilities </b>
                                 <br><br>
                                4.1 Any person may access the Website either by registering to the Website or using the Website as a guest. However, a guest user may not have access to all sections of the Website including certain benefits/promotional offers, which shall be reserved only for the purpose of registered Users, and which may change from time to time at the sole discretion of the Website.
                                 <br><br>
                                4.2 If you wish to register your account with the Website, you shall be required to create an account by registering with a valid Bangladeshi mobile number and/or with your Facebook account or your email address or by filling in the details prescribed in the Website registration form. You will then receive a password or one-time PIN with which you can login to the website to place orders.
                                 <br><br>
                                4.3 If you use the website, you will be responsible for maintaining the confidentiality of your username and password and you will be responsible for all activities that occur under your username and you will be under the obligation to restrict access to your computer or mobile phone to prevent unauthorised access to your account. You should inform us immediately if you have any reason to believe that your password has become known to anyone else, or if the password is being, or is likely to be, used in an unauthorised manner. You agree that if you provide any information that is untrue, inaccurate, not current or incomplete or we have reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, or not in accordance with this Terms of Use, we have the right to suspend or terminate your membership on the website.
                                 <br><br>
                                4.4 The Website may be inaccessible for such purposes as it may, at its sole discretion deem necessary, including but not limited to regular maintenance. However, under no circumstances will NatureX be held liable for any losses or claims arising out of such inaccessibility to the Users and the Users expressly waive any claims against NatureX In this regard
                                 <br><br>
                                <b>5. Charges </b>
                                 <br><br>
                                5.1 Membership on the website is free for users. NatureX does not charge any fee for browsing and buying on the website. NatureX Reserves the right to change its fee policy from time to time. In particular, NatureX may at its sole discretion introduce new services and modify some or all of the existing services offered on the website. In such an event, NatureX reserves the right to introduce fees for the new services offered or amend/introduce fees for existing services, as the case may be. Changes to the fee policy will be posted on the website and such changes will automatically become effective immediately after they are posted on the website.
                                 <br><br>
                                <b>6. Copyright </b>
                                 <br><br>
                                6.1 The material (including the content, and any other content, software or services) contained on naturexbd.com are the property of NatureXLimited, its subsidiaries, affiliates and/or third party licensors. No material on this site may be copied, reproduced, republished, installed, posted, transmitted, stored or distributed without written permission from NatureX Limited.
                                 <br><br>
                                6.2 You may not use any “deep-link”, “page-scrape”, “robot”, “spider” or other automatic device, program, algorithm or methodology, or any similar or equivalent manual process, to access, acquire, copy or monitor any portion of the website or any content, or in any way reproduce or circumvent the navigational structure or presentation of the website or any content, to obtain or attempt to obtain any materials, documents or information through any means not purposely made available through the website. We reserve our right to bar any such activity.
                                 <br><br>
                                <b>7. Cookies </b>
                                 <br><br>
                                7.1 This site uses cookies, which means that you must have cookies enabled on your computer in order for all functionality on this site to work properly. A cookie is a small data file that is written to your hard drive when you visit certain Websites. Cookie files contain certain information, such as a random number user ID that the site assigns to a visitor to track the pages visited. A cookie cannot read data off your hard disk or read cookie files created by other sites. Cookies, by themselves, cannot be used to find out the identity of any user.
                                 <br><br>
                               <b> 8. Promotional Activity </b>
                                 <br><br>
                                8.1 To promote its services NatureX uses various advertisements and commercials which are truthful and are not deceptive or unfair to the best of our knowledge and belief. Every user is under the obligation to go through the relevant information contained in the Website before using the service and it will be assumed that each user is aware of every information provided in the Website. Images of products in the Website are for and by reference only and actual products may vary from the corresponding image exhibited. The Website disclaims any liabilities arising out of any discrepancies to this end to the fullest extent permitted by law.
                                 <br><br>
                                <b>9. The Contract </b>
                                 <br><br>
                                9.1 Your order is an offer to us to buy the product(s) in your order. When you place an order to purchase a product from us, you will receive an e-mail and/or SMS to your mobile phone number confirming receipt of your order and/or containing the details of your order (the "Order Confirmation E-mail and/or SMS"). The Order Confirmation E-mail and/or SMS is acknowledgement that we have received your order, but does not confirm acceptance of your offer to buy the product(s) ordered; that when we send the Order Confirmation Email and/or SMS a contract called an “agreement to sell” is concluded in accordance with Section 4(3) of the Sale of Goods Act, 1930 i.e. the transfer of the property in the goods is to take place at a future time when the product(s) is/are delivered to your designated address. We only accept your offer, and the above “agreement to sell” becomes a contract of sale for product(s) ordered by you in accordance with Section 4(4) of the Sale of Goods Act, 1930, when the product(s) is/are delivered to your designated address and at that time the property in the goods is transferred from us to you.
                                 <br><br>
                                9.2 You can cancel your order for a product at no cost any time before the goods are delivered to you.
                                 <br><br>
                                9.3 Please note that we sell products only in quantities which correspond to the typical needs of an average household. This applies both to the number of products ordered within a single order and the placing of several orders for the same product where the individual orders comprise a quantity typical for a normal household.
                                 <br><br>
                                <b>10. Product Descriptions </b>
                                 <br><br>
                                10.1 NatureX Attempts to be as accurate as possible. NatureX does not manufacture or produce any product by themselves. Therefore, NatureX does not warrant that product descriptions or other content of any NatureX product is accurate, complete, reliable, current, or error-free. If a product offered by NatureX itself is not as described, your sole remedy is to return it in unused condition.
                                 <br><br>
                                <b>11. Pricing </b>
                                 <br><br>
                                11.1 Except where noted otherwise, the list price or suggested price displayed for products on NatureX represents the full retail price listed on the product itself, suggested by the manufacturer or supplier, or estimated in accordance with standard industry practice; or the estimated retail value for a comparably featured item offered elsewhere. The list price or suggested price is a comparative price estimate and may or may not represent the prevailing price in every area on any particular day.
                                 <br><br>
                                11.2 Despite our best efforts, a small number of the items in our catalog may be mispriced. If the MRP of an item sold by NatureX is higher than our stated price, we will, at our discretion, either contact you for instructions before shipping or cancel your order and notify you of such cancellation. And if the stated price on the product is lower than NatureX, we will, either refund the amount or replace the product according to your preference, when acknowledged.
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="privacyPolicyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog footer_modal modal-dialog-centered" >
            <div class="modal-content modal-content1">
                <div class="modal-header" style="padding: 1rem 2rem;">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Privacy Policy</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" style="padding: 1rem 2rem;">
                        <div align="center">
                            <p class="modal-title" id="exampleModalLabel" style="color: #414243; text-align: justify;">
                            This privacy policy describes how the https://naturexbd.com website and related application (the "Site", "we" or "us") collects, uses, shares and protects the personal information that we collect through this Site. Naturex has established this Site to link up users who need food parcel delivered ("Customers") with individuals who will provide the delivery services. This policy also applies to any mobile applications that we develop for use with our services and Team specific pages on the Site, and references to this "Site", "we" or "us" is intended to also include these mobile applications. Please read below to learn more about our information practices. By using this Site, you agree to these practices.
                            <br><br>
                            <b>Information Provided By Your Web Browser</b>
                            <br><br>
                            You have to provide us with personal information like your name, contact no, mailing address and email id, our app will also fetch your location information in order to give you the best service. Like many other websites, we may record information that your web browser routinely shares, such as your browser type, browser language, software and hardware attributes, the date and time of your visit, the web page from which you came, your Internet Protocol address and the geographic location associated with that address, the pages on this Site that you visit and the time you spent on those pages. This will generally be anonymous data that we collect on an aggregate basis. We may also use Google Analytics or a similar service to gather statistical information about the visitors to this Site and how they use the Site. This, also, is done on an anonymous basis.
                            <br><br>
                            <b>Personal Information That You Provide</b>
                            <br><br>
                            If you want to use our service or contact a Naturex member, you must create an account on our Site. To establish your account, we will ask for personally identifiable information that can be used to contact or identify you, which may include your name, phone number, and e-mail address. We may also collect demographic information about you, such as your zip code, and allow you to submit additional information that will be part of your Naturex profile. Other than basic information that we need to establish your account, it will be up to you to decide how much information to share as part of your profile. We encourage you to think carefully about the information that you share and we recommend that you guard your identity and your sensitive information. Of course, you can review and revise your profile at any time. From time to time, we may run contests or promotions and ask for a postal mailing address and other personal information relating to the contest or promotion. It will always be your choice whether to provide your personal information in order to participate in these events.
                            <br><br>
                            <b>Payment Information</b>
                            <br><br>
                            Our only payment channel is cash on delivery. Thus, if you are a Customer, you will make payments once the parcel is at your doorstep. We will have your address and contact no. in order to identify the customer.
                            <br><br>
                            <b>Session And Persistent Cookies</b>
                            <br><br>
                            As is commonly done on websites, we may use cookies and similar technology to keep track of our users and the services they have elected. A “cookie” is a small text file containing alphanumeric characters that is stored on your computer’s hard drive and uniquely identifies your browser. We use both “session” and “persistent” cookies. Session cookies are deleted after you leave our website and when you close your browser. We use data collected with session cookies to enable certain features on our Site, to help us understand how users interact with our Site, and to monitor at an aggregate level Site usage and web traffic routing.
                            If you have created an account, we will also use persistent cookies that remain on your computer’s hard-drive between visits, so that when you return to our Site we can remember who you are and your preferences. For example, after you log out of our Site, these persistent cookies can enable you to return to our Site without the need to log back in.
                            We may allow business partners who provide services to our Site to place cookies on your computer that assist us in analyzing usage data. We do not allow these business partners to collect your personal information from our website except as may be necessary for the services that they provide.
                            You can manage these cookies. For example, you can configure your browser to accept all cookies, reject all cookies, or notify you when a cookie is set. If you disable cookies, however, it may interfere with the functionality of our Site and you may not be able to use all of the Site’s features.
                            <br><br>
                            <b>Web Beacons</b>
                            <br><br>
                            We may also use web beacons or similar technology to help us track the effectiveness of our communications. For example, if you have elected to receive any of our email newsletters, we may use technology that allows us to see how many recipients have opened the message and how many have clicked on one of its links.
                            <br><br>
                            <b>Advertising Cookies</b>
                            <br><br>
                            We may use third parties, such as Google, to serve ads about our website over the internet. These third parties may use cookies to identify ads that may be relevant to your interest (for example, based on your recent visit to our website), to limit the number of times that you see an ad, and to measure the effectiveness of the ads.
                            <br><br>
                            <b>What We Do With The Information We Collect</b>
                            <br><br>
                            We will generally use the information that we collect to provide our services, to monitor and analyze visitor activity on our website, promote and support our services, and develop a knowledge base regarding our website users. As detailed below, certain information that you provide may be available to visitors to the Site, and some information will be shared between Customers and Naturex Teams.
                            <br><br>
                            <b>This Policy Is An Agreement</b>
                            <br><br>
                            When you visit this Site, you are accepting the practices described in this Privacy Policy.
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="returnRefundCanModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog footer_modal modal-dialog-centered" >
            <div class="modal-content modal-content1">
                <div class="modal-header" style="padding: 1rem 2rem;">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Return, Refund & Cancellation</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" style="padding: 1rem 2rem;">
                        <div align="left">
                            <p class="modal-title" id="exampleModalLabel" style="color: #414243; text-align: justify;">
                                <b>Return Policy</b>
                                <br><br>
                                A user may return any product during the time of delivery, or within 12 hours if:
                                <br><br>
                                <ul style="text-align: left;">
                                    <li>Product does not fulfill expectations.</li>
                                    <li>Found damaged while receiving delivery</li>
                                    <li>Found the product in unhygienic condition</li>
                                    <li>If the user finds the product unusable or in poor condition.</li>
                                </ul>
                                <br>
                                A user may return any unopened or defective up to 20% and less, item within 12 hours of receiving the item. But following products may not be eligible for return or replacement:
                                <br><br>
                                <ul style="text-align: left;">
                                    <li>Damaged by the customer because of misuse of it.</li>
                                    <li>Incidental damage due to malfunctioning of product</li>
                                    <li>Any consumable item which has been used/installed</li>
                                    <li>Any damage/defect which are not covered under the manufacturer's warranty</li>
                                </ul>
                                <br>
                                Any product that is returned without all original packaging and accessories, including the box, manufacturer's packaging if any, and all other items originally included with the product/s delivered.
                                <br><br>
                                <b>Refund Policy</b>
                                <br><br>
                                Refund policy will only be applicable :
                                <br><br>
                                <ul style="text-align: left;">
                                    <li>If you have made an online payment/card payment against your order.</li>
                                    <li>The product is not available in the stock currently.</li>
                                    <li>If you want to cancel the order before the order has been delivered.</li>
                                    <li>If you found any problem in the product (damaged,tempered,unhygienic or unusable)</li>
                                </ul>
                                <br>
                                For that you need to call the 01791865233 and talk to the CRM , the CRM might offer you the product replacement or product of same price but if you don’t want to take that then the CRM will take the necessary steps of refund, after that as per the policy of aamar pay refund policy will start. It may take 5 or 6 working days.
                                <br>
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                      <h4>Login / Quick signup</h4>
                    </div>
                    <form method="POST" >
                          @csrf
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="required">
                                  <div id="wrong_user" style="color:red;display:none;">Wrong Email or Password!</div>
                              <div id="right_user" style="color:green;display:none;">Signed in!</div>Email</label>
                              <input placeholder="Enter Email" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword1" class="required">Password</label>
                              <input placeholder="Enter Password" type="password" name="password" class="form-control" id="exampleInputPassword1">
                              <span toggle="#exampleInputPassword1" class="icofont-eye-blocked field-icon toggle-password"></span>
                           </div>
                           <p class="small mb-4">Forgot password ? <a href="{{ URL::to('/forgot-pass') }}">Reset now</a></p>
                           <button type="submit" class="btn btn-success btn-lg rounded btn-block" id="user_signin_btn">Sign in</button>
                    </form>
                </div>

                </div>
            </div>
        </div>
      <!-- Bootstrap core JavaScript -->

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="{{asset('vendor/sidebar/hc-offcanvas-nav.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/osahan.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/map/bing/location.js')}}"></script>
    <script>
     jQuery(document).ready(function() {
         function delay(fn, ms) {
             let timer = 0
             return function(...args) {
                 clearTimeout(timer)
                 timer = setTimeout(fn.bind(this, ...args), ms || 0)
             }
         }

         function doesFileExist(urlToFile) {
             var xhr = new XMLHttpRequest();
             xhr.open('HEAD', urlToFile, false);
             xhr.send();

             if (xhr.status == "404") {
                 return false;
             } else {
                 return true;
             }
         }

     jQuery(".product_search").on("input", delay(function() {
        jQuery('.search_table tbody').empty();
        var keyword = jQuery(this).val();
        if(!keyword.trim()){
            jQuery('.search_table tbody').empty();
        }
        else{
            var tr_str1 = "<tr id='search_row' style='width: 100%;height:50px;border-bottom: 2px solid #f0f2f542;background-color: #607d8b87;'>"+
                "<td style='width: 100%; text-align: center;color:#fff;text-shadow: 0px 0px 2px #000;font-weight: 600;'>"+
                "<img height='50px' src='{{asset('search.gif')}}'>"+
                "</td>"+
                "</tr>";

            jQuery(".search_table tbody").append(tr_str1);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('/search_keyword')}}",
                type: "post",
                data: {
                    keyword: keyword
                },
                success: function(data) {
                    jQuery('.search_table tbody').empty();
                    if (data.message=='Found') {
                        for(var i=0; i<data.product.length; i++){

                            /*var result = doesFileExist("/public"+data.product[i].product_thumbnail);
                            if (result == true){*/
                                var tr_str = "<tr id='search_row' style='width: 100%;border: 2px solid #f0f2f542;background-color: #607d8b87;'>"+
                                    "<td style='width: 30%; text-align: center;'>"+
                                    "<a href='/grocery_product_details/"+btoa(data.product[i].id)+"'>"+
                                    "<img height='50px' src='https://manage.naturexbd.com"+data.product[i].product_thumbnail +"' alt='No Img'>"+
                                    "</a>"+
                                    "</td>"+
                                    "<td style='width: 70%; text-align: left;'>"+
                                    "<a style='color:#fff;text-shadow: 0px 0px 2px #000;font-weight: 600;' href='/grocery_product_details/"+btoa(data.product[i].id)+"'>"+
                                    data.product[i].product_name+
                                    "</a>"+
                                    "</td>"+
                                    "</tr>";
                            /*}
                            else {
                                var tr_str = "<tr id='search_row' style='width: 100%;border: 2px solid #f0f2f542;background-color: #607d8b87;'>"+
                                    "<td style='width: 30%; text-align: center;'>"+
                                    "<a href='/grocery_product_details/"+btoa(data.product[i].id)+"'>"+
                                    "<img height='50px' src='{{asset('B0eS.gif')}}'>"+
                                    "</a>"+
                                    "</td>"+
                                    "<td style='width: 70%; text-align: left;'>"+
                                    "<a style='color:#fff;text-shadow: 0px 0px 2px #000;font-weight: 600;' href='/grocery_product_details/"+btoa(data.product[i].id)+"'>"+
                                    data.product[i].product_name+
                                    "</a>"+
                                    "</td>"+
                                    "</tr>";
                            }*/


                            jQuery(".search_table tbody").append(tr_str);
                        }
                    } else {
                        var tr_str = "<tr id='search_row' style='width: 100%;height:50px;border-bottom: 2px solid #f0f2f542;background-color: #607d8b87;'>"+
                            "<td style='width: 100%; text-align: center;color:#fff;text-shadow: 0px 0px 2px #000;font-weight: 600;'>"+
                            "No Match Found"+
                            "</td>"+
                            "</tr>";

                        jQuery(".search_table tbody").append(tr_str);
                    }
                }
            });
        }
     }, 500));
     });
    </script>

    <script>
              jQuery(document).click(function (e) {
                  jQuery('.search_table tbody').empty();
                  if (!jQuery(e.target).closest("#cart,.cart_remove").length) {
                      jQuery('#cart').modal('hide');
                  }

              });
          </script>

    <script>
                function changeButton(payMethod) {
                    if (payMethod == "bKash") {
                        /*jQuery("#place_order").html("Continue to Payment");
                        jQuery("#pay_method_data").val("bKash");*/
                        jQuery("#place_order").hide();
                        jQuery("#nagad_button").hide();
                        jQuery("#bKash_button").show();

                    } else if(payMethod == "nagad"){
                        jQuery("#place_order").hide();
                        jQuery("#bKash_button").hide();
                        jQuery("#nagad_button").show();

                    } else {
                        /*jQuery("#place_order").html("Place Order");
                        jQuery("#pay_method_data").val("COD");*/

                        jQuery("#bKash_button").hide();
                        jQuery("#nagad_button").hide();
                        jQuery("#place_order").show();
                    }
                }

                function changeButtonCheckout(payMethod) {
                    if (payMethod == "bKash") {
                        /*jQuery("#place_order").html("Continue to Payment");
                        jQuery("#pay_method_data").val("bKash");*/
                        jQuery(".place_order").hide();
                        jQuery(".nagad_button").hide();
                        jQuery(".bKash_button").show();

                    } else if(payMethod == "nagad"){
                        jQuery(".place_order").hide();
                        jQuery(".bKash_button").hide();
                        jQuery(".nagad_button").show();

                    } else {
                        /*jQuery("#place_order").html("Place Order");
                        jQuery("#pay_method_data").val("COD");*/

                        jQuery(".bKash_button").hide();
                        jQuery(".nagad_button").hide();
                        jQuery(".place_order").show();
                    }
                }

                $(document).on("click","#check-client",function() {
                    <?php if(!session('client_id')):?>
                    if(checkoutValidate()){
                       showLoginPop();
                    };

                    <?php endif?>
                });



                function showLoginPop(){
                    var email = $("#checkout-form").find('input[name="email"]').val();
                    $('#loginModal').find('input[name="email"]').val(email).prop('disabled',true);
                    $('#loginModal').modal('show');
                      $(function () {
                        $('[data-toggle="tooltip"]').tooltip()
                      })
                }


                 $(".toggle-password").click(function() {

                    $(this).toggleClass("icofont-eye");
                    var input = $($(this).attr("toggle"));

                    if ($(this).closest('div').find('input').attr("type") == "password")
                    {
                        $(this).closest('div').find('input').attr("type", "text");
                    }
                    else
                    {
                        $(this).closest('div').find('input').attr("type", "password");
                    }
                });

                $(document).ready(function() {
             $("#user_signin_btn").click(function(e) {

                $.ajaxSetup({
                   headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                });

                e.preventDefault();
                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();
                var formData = $("#checkout-form").serialize();

                $.ajax({
                   url: '{{url('/quick-sign')}}',
                   type: 'POST',
                   data: {
                         email: email,
                         password: password,
                         formData: formData
                   },
                   success: function(data) {
                         if(data.message=='Wrong Email or Password!'){
                            /*setTimeout(() => {
                            toastr.options.positionClass = 'toast-top-center';
                            toastr.error(data.message, data.title);
                            },500);*/
                            $('#wrong_user').hide();
                            setTimeout(function(){ $('#wrong_user').show(); }, 1000);
                         }
                         else{
                            window.location = "{{ URL::to('/checkout?') }}";
                            $('#wrong_user').hide();
                            $('#right_user').show();
                         }

                   }
                });

             });

             });
            </script>
    <script>
              /*jQuery(function(){
                  jQuery(window).on("load", function(){
                      jQuery('.preloader').fadeOut('slow', function() {
                          jQuery(this).remove();
                      });
                  });
              });*/

              function loaderStop() {
                  jQuery('.preloader').fadeOut('slow', function() {
                      jQuery(this).remove();
                  });
              }

              setTimeout(function(){
                  jQuery('.preloader').fadeOut('slow', function() {
                      jQuery(this).remove();
                  });
              }, 2000);

          </script>

    <script>
              /*jQuery(document).ready(function() {
                  jQuery("#product_search").on("keyup", function() {
                      var value = jQuery(this).val().toLowerCase();
                      jQuery("#test div").filter(function() {
                          jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
                      });
                  });
              });*/

          </script>

    <script>
               // var accessToken='';

                jQuery(document).ready(function(){

                    jQuery(".loginAlert").click(function(e){
                      e.preventDefault();
                      jQuery('#loginAlert').modal('show');
                      setTimeout(function() {jQuery('#loginAlert').modal('hide');}, 2000);
                  });

                    jQuery(".emptyCart").click(function(e){
                      e.preventDefault();
                      jQuery('#emptyCart').modal('show');
                      setTimeout(function() {jQuery('#emptyCart').modal('hide');}, 2000);
                  });

                    jQuery(".aboutModel").click(function(e){
                      e.preventDefault();
                      jQuery('#aboutModel').modal('show');
                      //setTimeout(function() {jQuery('#aboutModel').modal('hide');}, 2000);
                  });

                    jQuery(".contactUsModel").click(function(e){
                      e.preventDefault();
                      jQuery('#contactUsModel').modal('show');
                      //setTimeout(function() {jQuery('#contactUsModel').modal('hide');}, 2000);
                  });

                    jQuery(".termsConditionsModel").click(function(e){
                      e.preventDefault();
                      jQuery('#termsConditionsModel').modal('show');
                      //setTimeout(function() {jQuery('#termsConditionsModel').modal('hide');}, 2000);
                  });

                    jQuery(".privacyPolicyModel").click(function(e){
                      e.preventDefault();
                      jQuery('#privacyPolicyModel').modal('show');
                      //setTimeout(function() {jQuery('#privacyPolicyModel').modal('hide');}, 2000);
                  });

                    jQuery(".returnRefundCanModel").click(function(e){
                      e.preventDefault();
                      jQuery('#returnRefundCanModel').modal('show');
                      //setTimeout(function() {jQuery('#returnRefundCanModel').modal('hide');}, 2000);
                  });

                    jQuery(".add_to_cart").click(function(e){

                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                          }
                      });

                      e.preventDefault();
                      const product_id = jQuery(this).attr('name');

                      /*jQuery('#add_cart_modal').modal('show');
                      setTimeout(function() {jQuery('#add_cart_modal').modal('hide');}, 2000);*/
                      /*jQuery(".floating_cart").animate({
                          height: 'toggle'
                        });
                      jQuery(".floating_cart").animate({
                          height: 'toggle'
                        });*/

                        jQuery(".floating_cart").animate({
                            right: '+=10px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '+=10px'
                        },"fast");

                        jQuery(".floating_cart").animate({
                            right: '-=20px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '-=20px'
                        },"fast");

                        jQuery(".floating_cart").animate({
                            right: '+=20px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '+=20px'
                        },"fast");

                        jQuery(".floating_cart").animate({
                            right: '-=10px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '-=10px'
                        },"fast");



                      $.ajax({
                          url: '{{url('/grocery/product/add_to_cart')}}',
                          type: 'post',
                          data: {
                              product_id: product_id
                          },
                          success: function(data) {
                              if(data.cart_count==0){
                                  jQuery(".floating_cart").click();
                              }
                              if(data.message=='Product found!'){
                                  /*setTimeout(() => {
                                  toastr.options.positionClass = 'toast-top-center';
                                  toastr.error(data.message, data.title);
                                  },500);*/


                                  let floating_cart_item = parseInt(jQuery(".floating_cart_item").attr('items'));
                                  floating_cart_item+=1;
                                  jQuery(".floating_cart_item").remove();
                                  const floating_cart = "<label class='floating_cart_item' items='"+floating_cart_item+"' style='color: #333;font-weight: 900;font-size: 18px;'>"+floating_cart_item+"</label>";
                                  jQuery(".floating_cart").append(floating_cart);
                                    var style = data.quantity<=1? 'pointer-events: none':'pointer-events: inharit';
                                    console.log(style);
                                    console.log(data.quantity);
                                  const markup = "<tr class='"+data.product_id1+"row' style='width: 100%;border-bottom: 2px solid #9e9e9e45;'>" +
                                      "<td style='width: 10%; text-align: center;'><a class='cart_remove' name='"+data.product_id1+"' price='"+data.price+"' style='color:#d50000;padding:20%;cursor:pointer;' ><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<img height='80px' src='https://manage.naturexbd.com" + data.product_img + "' ></td><td style='width: 30%; text-align: center;'>" + data.product_name + "<br><label>"+data.price+"tk</label></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<span class='ml-auto' href='#'>" +
                                      "<form id='' class='cart-items-number d-flex' >" +
                                      "<input type='button' value='-' name='"+data.price+"' class='qtyminus btn btn-success btn-sm' style='"+style+"' field='" + data.product_id1 + "quantity' />" +
                                      "<input type='text' name='" + data.product_id1 + "quantity' value='" + data.quantity + "' class='qty form-control " + data.product_id1 + "' readonly/>" +
                                      "<input type='button' value='+' name='"+data.price+"' class='qtyplus btn btn-success btn-sm' field='" + data.product_id1 + "quantity' />" +
                                      "</form></span></td></tr>";
                                  jQuery("#cart_table").append(markup);
                                  document.getElementsByName(data.product_id1)[0].setAttribute('price',data.price);
                                  var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                                  jQuery(".cart_total").remove();
                                  total_price_int+=parseInt(data.price);
                                  const markup1 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                                  jQuery(".cart_price_table").append(markup1);
                              }
                              else if(data.message=='Product found without img!'){

                                  let floating_cart_item = parseInt(jQuery(".floating_cart_item").attr('items'));
                                  floating_cart_item+=1;
                                  jQuery(".floating_cart_item").remove();
                                  const floating_cart = "<label class='floating_cart_item' items='"+floating_cart_item+"' style='color: #333;font-weight: 900;font-size: 18px;'>"+floating_cart_item+"</label>";
                                  jQuery(".floating_cart").append(floating_cart);
                                    var style = data.quantity<=1? 'pointer-events: none':'';
                                  const markup2 = "<tr class='"+data.product_id1+"row' style='width: 100%;border-bottom: 2px solid #9e9e9e45;'>" +
                                      "<td style='width: 10%; text-align: center;'><a class='cart_remove' name='"+data.product_id1+"' price='"+data.price+"' style='color:#d50000;padding:20%;cursor:pointer;' ><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<img height='80px' src='{{asset('B0eS.gif')}}' ></td><td style='width: 30%; text-align: center;'>" + data.product_name + "<br><label>"+data.price+"tk</label></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<span class='ml-auto' href='#'>" +
                                      "<form id='' class='cart-items-number d-flex' >" +
                                      "<input type='button' value='-' name='"+data.price+"' class='qtyminus btn btn-success btn-sm' style='"+style+"' field='" + data.product_id1 + "quantity' />" +
                                      "<input type='text' name='" + data.product_id1 + "quantity' value='" + data.quantity + "' class='qty form-control " + data.product_id1 + "' readonly/>" +
                                      "<input type='button' value='+' name='"+data.price+"' class='qtyplus btn btn-success btn-sm' field='" + data.product_id1 + "quantity' />" +
                                      "</form></span></td></tr>";
                                  jQuery("#cart_table").append(markup2);
                                  document.getElementsByName(data.product_id1)[0].setAttribute('price',data.price);
                                  var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                                  jQuery(".cart_total").remove();
                                  total_price_int+=parseInt(data.price);
                                  const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                                  jQuery(".cart_price_table").append(markup3);
                              }
                              else if(data.message=='cart updated!'){
                                  document.getElementsByName(data.product_id1)[0].setAttribute('price',data.total_price);
                                  jQuery('input[name='+data.product_id1+"quantity"+']').val(data.quantity);
                                  if(data.quantity>1){
                                    jQuery('input[field='+data.product_id1+"quantity"+']').attr('style','pointer-events: inherit');
                                  }

                                  var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                                  jQuery(".cart_total").remove();
                                  total_price_int+=parseInt(data.price);
                                  const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                                  jQuery(".cart_price_table").append(markup3);
                              }
                              else{
                                  window.location = "{{ URL::to('/') }}";
                              }

                              jQuery(".proceed_to_checkout").remove();
                              const checkout_btn = "<button style='border-radius: unset !important;' formaction='{{URL::to('/checkout')}}' class='xxx1 btn btn-success btn-lg rounded btn-block proceed_to_checkout' ><i class='far fa-credit-card'></i> Proceed to Checkout</button>";
                              jQuery(".checkout_btn_holder").append(checkout_btn);

                          }
                      });
                  });

                    jQuery(".add_to_cart_details").click(function(e){

                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                          }
                      });

                      e.preventDefault();
                      const product_id = jQuery(this).attr('name');
                      const quantity_details = jQuery(".quantity_details").val();

                      /*jQuery('#add_cart_modal').modal('show');
                      setTimeout(function() {jQuery('#add_cart_modal').modal('hide');}, 2000);*/

                        jQuery(".floating_cart").animate({
                            right: '+=10px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '+=10px'
                        },"fast");

                        jQuery(".floating_cart").animate({
                            right: '-=20px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '-=20px'
                        },"fast");

                        jQuery(".floating_cart").animate({
                            right: '+=20px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '+=20px'
                        },"fast");

                        jQuery(".floating_cart").animate({
                            right: '-=10px'
                        },"fast");

                        jQuery(".floating_cart1").animate({
                            right: '-=10px'
                        },"fast");

                      $.ajax({
                          url: '{{url('/grocery/product/add_to_cart_details')}}',
                          type: 'post',
                          data: {
                              product_id: product_id,
                              quantity_details: quantity_details
                          },
                          success: function(data) {
                              if(data.cart_count==0){
                                  jQuery(".floating_cart").click();
                              }
                              if(data.message=='Product found!'){
                                  /*setTimeout(() => {
                                  toastr.options.positionClass = 'toast-top-center';
                                  toastr.error(data.message, data.title);
                                  },500);*/

                                  let floating_cart_item = parseInt(jQuery(".floating_cart_item").attr('items'));
                                  floating_cart_item+=1;
                                  jQuery(".floating_cart_item").remove();
                                  const floating_cart = "<label class='floating_cart_item' items='"+floating_cart_item+"' style='color: #333;font-weight: 900;font-size: 18px;'>"+floating_cart_item+"</label>";
                                  jQuery(".floating_cart").append(floating_cart);
                                    var style = data.quantity<=1? 'pointer-events: none':'';
                                  const markup = "<tr class='"+data.product_id1+"row' style='width: 100%;border-bottom: 2px solid #9e9e9e45;'>" +
                                      "<td style='width: 10%; text-align: center;'><a class='cart_remove' name='"+data.product_id1+"' price='"+data.price+"' style='color:#d50000;padding:20%;cursor:pointer;' ><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<img height='80px' src='https://manage.naturexbd.com" + data.product_img + "' ></td><td style='width: 30%; text-align: center;'>" + data.product_name + "<br><label>"+data.price1+"tk</label></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<span class='ml-auto' href='#'>" +
                                      "<form id='' class='cart-items-number d-flex' >" +
                                      "<input type='button' value='-' name='"+data.price1+"' class='qtyminus btn btn-success btn-sm' style='"+style+"' field='" + data.product_id1 + "quantity' />" +
                                      "<input type='text' name='" + data.product_id1 + "quantity' value='" + data.quantity + "' class='qty form-control " + data.product_id1 + "' readonly/>" +
                                      "<input type='button' value='+' name='"+data.price1+"' class='qtyplus btn btn-success btn-sm' field='" + data.product_id1 + "quantity' />" +
                                      "</form></span></td></tr>";
                                  jQuery("#cart_table").append(markup);


                                  document.getElementsByName(data.product_id1)[0].setAttribute('price',data.price);
                                  var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                                  jQuery(".cart_total").remove();
                                  total_price_int+=parseInt(data.price);

                                     if(total_price_int>0){
                                      jQuery(".proceed_to_checkout").remove();
                                      const checkout_btn = "<button style='border-radius: unset !important;' formaction='{{url('/checkout?')}}' class='xxx7 btn btn-success btn-lg rounded btn-block proceed_to_checkout' ><i class='far fa-credit-card' onclick=''></i> Proceed to Checkout</button>";
                                      jQuery(".checkout_btn_holder").append(checkout_btn);
                                  }

                                  const markup1 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                                  jQuery(".cart_price_table").append(markup1);

                              }
                              else if(data.message=='Product found without img!'){

                                  let floating_cart_item = parseInt(jQuery(".floating_cart_item").attr('items'));
                                  floating_cart_item+=1;
                                  jQuery(".floating_cart_item").remove();
                                  const floating_cart = "<label class='floating_cart_item' items='"+floating_cart_item+"' style='color: #333;font-weight: 900;font-size: 18px;'>"+floating_cart_item+"</label>";
                                  jQuery(".floating_cart").append(floating_cart);
                                    var style = data.quantity<=1? 'pointer-events: none':'';
                                  const markup2 = "<tr class='"+data.product_id1+"row' style='width: 100%;border-bottom: 2px solid #9e9e9e45;'>" +
                                      "<td style='width: 10%; text-align: center;'><a class='cart_remove' name='"+data.product_id1+"' price='"+data.price+"' style='color:#d50000;padding:20%;cursor:pointer;' ><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<img height='80px' src='{{asset('B0eS.gif')}}' ></td><td style='width: 30%; text-align: center;'>" + data.product_name + "<br><label>"+data.price1+"tk</label></td>" +
                                      "<td style='width: 30%; text-align: center;'>" +
                                      "<span class='ml-auto' href='#'>" +
                                      "<form id='' class='cart-items-number d-flex' >" +
                                      "<input type='button' value='-' name='"+data.price1+"' class='qtyminus btn btn-success btn-sm' style='"+style+"' field='" + data.product_id1 + "quantity' />" +
                                      "<input type='text' name='" + data.product_id1 + "quantity' value='" + data.quantity + "' class='qty form-control " + data.product_id1 + "' readonly/>" +
                                      "<input type='button' value='+' name='"+data.price1+"' class='qtyplus btn btn-success btn-sm' field='" + data.product_id1 + "quantity' />" +
                                      "</form></span></td></tr>";
                                  jQuery("#cart_table").append(markup2);
                                  document.getElementsByName(data.product_id1)[0].setAttribute('price',data.price);
                                  var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                                  jQuery(".cart_total").remove();
                                  total_price_int+=parseInt(data.price);
                                  const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                                  jQuery(".cart_price_table").append(markup3);
                              }
                              else if(data.message=='cart updated!'){
                                  document.getElementsByName(data.product_id1)[0].setAttribute('price',data.total_price);
                                  jQuery('input[name='+data.product_id1+"quantity"+']').val(data.quantity);
                                  if(data.quantity>1){
                                    jQuery('input[field='+data.product_id1+"quantity"+']').attr('style','pointer-events: inherit');
                                  }
                                  var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                                  jQuery(".cart_total").remove();
                                  total_price_int+=parseInt(data.price);
                                  const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                                  jQuery(".cart_price_table").append(markup3);
                              }
                              else{
                                  window.location = "{{ URL::to('/') }}";
                              }

                          }
                      });
                  });

                    jQuery('body').on('click', '.qtyplus', function(e) {
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                          }
                      });



                      e.preventDefault();
                      const product_price = jQuery(this).attr('name');
                      var product_id = parseInt(jQuery(this).attr('field'));
                      var field_name = jQuery(this).attr('field');

                      jQuery('[field="'+field_name+'"]').attr('style','pointer-events: inherit');

                      let product_price1=parseInt(document.getElementsByName(product_id)[0].getAttribute('price'));
                      if(product_price1){

                      }else{
                          product_price1=parseInt(jQuery("#"+product_id+"anchor").attr('price'));
                      }
                      product_price1+=parseInt(product_price);
                      document.getElementsByName(product_id)[0].setAttribute('price',product_price1);

                      var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                      jQuery(".cart_total").remove();
                      total_price_int+=parseInt(product_price);
                      const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                      jQuery(".cart_price_table").append(markup3);

                      $.ajax({
                          url: '{{url('/grocery/product/add_to_cart_plus')}}',
                          type: 'post',
                          data: {
                              product_id: product_id
                          },
                          success: function(data) {

                          }
                      });
                  });

                    jQuery('body').on('click', '.qtyminus', function(e) {

                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      fieldName = jQuery(this).attr('field');
                      var currentVal = parseInt(jQuery('input[name='+fieldName+']').val());
                      if(currentVal <= 1){
                          jQuery(this).attr('style','pointer-events: none');
                      }else{
                          jQuery(this).attr('style','pointer-events: inherit');
                      }

                      if(currentVal>0){
                          e.preventDefault();
                          const product_price = jQuery(this).attr('name');
                          var product_id = parseInt(jQuery(this).attr('field'));

                          let product_price1=parseInt(document.getElementsByName(product_id)[0].getAttribute('price'));
                          if(product_price1){

                          }else{
                              product_price1=parseInt(jQuery("#"+product_id+"anchor").attr('price'));
                          }

                          product_price1-=parseInt(product_price);
                          document.getElementsByName(product_id)[0].setAttribute('price',product_price1);

                          var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                          jQuery(".cart_total").remove();
                          total_price_int-=parseInt(product_price);
                          const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                          jQuery(".cart_price_table").append(markup3);

                          $.ajax({
                              url: '{{url('/grocery/product/add_to_cart_minus')}}',
                              type: 'post',
                              data: {
                                  product_id: product_id
                              },
                              success: function(data) {

                              }
                          });
                      }


                  });

                    jQuery('body').on('click', '.details_plus', function(e){
                      e.preventDefault();
                      // Get the field name
                      fieldName = jQuery(this).attr('field');
                      // Get its current value
                      var currentVal = parseInt(jQuery('input[name='+fieldName+']').val());
                      // If is not undefined
                      if (!isNaN(currentVal)) {
                          // Increment
                          jQuery('input[name='+fieldName+']').val(currentVal + 1);
                      } else {
                          // Otherwise put a 0 there
                          jQuery('input[name='+fieldName+']').val(1);
                      }
                  });

                    jQuery('body').on('click', '.details_minus', function(e){
                      e.preventDefault();
                      // Get the field name
                      fieldName = jQuery(this).attr('field');
                      // Get its current value
                      var currentVal = parseInt(jQuery('input[name='+fieldName+']').val());
                      // If is not undefined
                      if (currentVal!=1) {
                          // Increment
                          jQuery('input[name='+fieldName+']').val(currentVal - 1);
                      } else {
                          // Otherwise put a 0 there
                          jQuery('input[name='+fieldName+']').val(1);
                      }
                  });

                    jQuery('body').on('click', '.cart_remove', function(e) {
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      let floating_cart_item = parseInt(jQuery(".floating_cart_item").attr('items'));
                      floating_cart_item-=1;
                      jQuery(".floating_cart_item").remove();
                      const floating_cart = "<label class='floating_cart_item' items='"+floating_cart_item+"' style='color: #333;font-weight: 900;font-size: 18px;'>"+floating_cart_item+"</label>";
                      jQuery(".floating_cart").append(floating_cart);
                      const product_id = jQuery(this).attr('name');
                      var total_price_int = parseInt(jQuery(".cart_total").attr('name'));
                      var total_price_product = parseInt(document.getElementsByName(product_id)[0].getAttribute('price'));
                      if(total_price_product){

                      }else{
                          total_price_product=parseInt(jQuery(this).attr('price'));
                      }

                      jQuery("."+product_id+"row").remove();
                      total_price_int-=total_price_product;
                      jQuery(".cart_total").remove();
                      const markup3 = "<span class='ml-auto cart_total' name='"+total_price_int+"BDT' href='#'>"+total_price_int+"BDT</span>";
                      jQuery(".cart_price_table").append(markup3);
                      if(total_price_int<=0){
                          jQuery(".proceed_to_checkout").remove();
                          const checkout_btn = "<button style='border-radius: unset !important;' formaction='#' class='xxx2 btn btn-success btn-lg rounded btn-block emptyCart proceed_to_checkout' ><i class='far fa-credit-card' onclick=''></i> Proceed to Checkout</button>";
                          jQuery(".checkout_btn_holder").append(checkout_btn);
                      }

                      $.ajax({
                          url: '{{url('/grocery/product/remove_cart')}}',
                          type: 'post',
                          data: {
                              product_id: product_id
                          },
                          success: function(data) {

                          }
                      });

                  });

                    if(window.location.href=="{{url('/checkout?')}}"){

                    jQuery('.floating_cart').hide();
                    jQuery('.floating_cart1').hide();


                }

                });

          </script>


   </body>
</html>
