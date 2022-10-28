<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
       <title>Signin -Naturex</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick-theme.min.css')}}"/>
      <!-- Icofont Icon-->
      <link href="{{asset('vendor/icons/icofont.min.css')}}" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
     
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
        </style>
      <!-- Sidebar CSS -->
      <link href="{{asset('vendor/sidebar/demo.css')}}" rel="stylesheet">
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
   <body class="fixed-bottom-padding">
       <div style="z-index: 4; background: #f0f2f5;" class="sticky border-bottom p-3 d-none mobile-nav">
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
      
      <!-- sign in -->
      <section class="osahan-main-body osahan-signin-main">
         <div class="">
            <div class="row d-flex align-items-center justify-content-center vh-100">
               <div class="landing-page shadow-sm bg-success col-lg-6">
                  <a class="position-absolute btn-sm btn btn-outline-light m-4 zindex" href="{{URL::to('/')}}">Skip <i class="icofont-bubble-right"></i></a>         <!-- slider -->
                  <div class="osahan-slider m-0">
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <!--<i class="icofont-sale-discount display-1 text-warning"></i>-->
                           <img style="height: 100px !important;" class="img-fluid logo-img "  src="{{asset('app/website/logo.png')}}">
                           <!--<h4 class="my-4 text-white">Best Prices & Offers</h4>
                           <p class="text-center text-white mb-5 px-4">Cheaper prices than your local<br>supermarket, great cashback offers to top it off.</p>-->
                        </div>
                     </div>
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <!--<i class="icofont-cart display-1 text-warning"></i>-->
                           <img style="height: 100px !important;" class="img-fluid logo-img " src="{{asset('app/website/logo.png')}}">
                           <!--<h4 class="my-4 text-white">Wide Assortment</h4>
                           <p class="text-center text-white mb-5 px-4">Choose from 5000+ products across food<br>, personal care, household & other categories.</p>-->
                        </div>
                     </div>
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <!--<i class="icofont-support-faq display-1 text-warning"></i>-->
                           <img style="height: 100px !important;" class="img-fluid logo-img " src="{{asset('app/website/logo.png')}}">
                           <!--<h4 class="my-4 text-white">Easy Returns</h4>
                           <p class="text-center text-white mb-5 px-4">Not satisfied with a product? Return<br> it at the doorstep & get a refund within hours.</p>-->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 pl-lg-5">
                  <div class="osahan-signin shadow-sm bg-white p-4 rounded">
                     <div class="p-3">
                        <h2 class="my-0">Reset password</h2>
                        <p class="small mb-4">Enter your email to Continue.</p>
                        <div hidden class="alert alert-success" role="alert"></div>
                        <div hidden class="alert alert-danger" role="alert"></div>
                        <form method="POST" action="javascript:void(0)">
                        @csrf
                           <div class="form-group">
                              <label for="exampleInputEmail1"><div id="wrong_user" style="color:red;display:none;">Wrong Email or Password!</div>
                              <div id="right_user" style="color:green;display:none;">Signed in!</div>Email</label>
                              <input placeholder="Enter Email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"  aria-describedby="emailHelp">
                            @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                           </div>
                           <button type="submit" class="btn btn-success btn-lg rounded btn-block" id="user_signin_btn">Continue</button>
                        </form>
                        <p class="text-muted text-center small m-0 py-3">or</p>
                    
                        <p class="text-center mt-3 mb-0"><a href="{{ URL::to('/signup') }}" class="text-dark">Don't have an account? Sign up</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 pl-lg-5">

               </div>
            </div>
         </div>
      </section>
      @include('grocery/layouts/mobile_sidenav')
      <!-- Bootstrap core JavaScript -->
     
      <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="{{asset('vendor/sidebar/hc-offcanvas-nav.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('js/osahan.js')}}"></script>
      <script>
         $(document).ready(function() {
         $("#user_signin_btn").click(function(e) {

            $.ajaxSetup({
               headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

            e.preventDefault();
            var email = $("input[name='email']").val();
          

            $.ajax({
               url: '{{url('/forgot-pass')}}',
               type: 'POST',
               data: {
                     email: email,
            
               },
               success: function(data) {
               
                  if(data.status == true){
                      $('.alert-danger').prop('hidden',true);
                      $('.alert-success').removeAttr('hidden style').text(data.message).fadeOut(6000);;
                   
                  }else if(data.status == false){
                      $('.alert-success').prop('hidden',true);
                      $('.alert-danger').removeAttr('hidden style').text(data.message).fadeOut(6000);
                        
                  }else{
                      $('.alert-success').attr('hidden');
                      $('.alert-danger').attr('hidden');
                  };
                   
               }
            });

         });
         
         });
      </script>
   </body>
</html>
