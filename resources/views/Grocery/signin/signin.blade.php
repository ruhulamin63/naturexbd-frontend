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
       
          .required:after {
            content:" *";
            color: red;
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
                  <a class="position-absolute btn-sm btn btn-outline-light m-4 zindex" href="{{URL::to('/')}}">Skip <i class="icofont-bubble-right"></i></a>         
                  <!-- slider -->
                  <div class="osahan-slider m-0">
                      @foreach($marketingBanners as $key=> $banner)
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <!--<i class="icofont-sale-discount display-1 text-warning"></i>-->
                           <img style="width: 100%;object-fit: cover;" class="img-fluid "  src="{{asset('https://manage.naturexbd.com'.$banner->banner_image)}}">
                           <!--<h4 class="my-4 text-white">Best Prices & Offers</h4>
                           <p class="text-center text-white mb-5 px-4">Cheaper prices than your local<br>supermarket, great cashback offers to top it off.</p>-->
                        </div>
                     </div>
                     @endforeach
                     <!--<div class="osahan-slider-item text-center">-->
                     <!--   <div class="d-flex align-items-center justify-content-center vh-100 flex-column">-->
                           <!--<i class="icofont-cart display-1 text-warning"></i>-->
                     <!--      <img style="height: 100px !important;" class="img-fluid logo-img " src="{{asset('app/website/logo.png')}}">-->
                           <!--<h4 class="my-4 text-white">Wide Assortment</h4>
                     <!--      <p class="text-center text-white mb-5 px-4">Choose from 5000+ products across food<br>, personal care, household & other categories.</p>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <!--<div class="osahan-slider-item text-center">-->
                     <!--   <div class="d-flex align-items-center justify-content-center vh-100 flex-column">-->
                           <!--<i class="icofont-support-faq display-1 text-warning"></i>-->
                     <!--      <img style="height: 100px !important;" class="img-fluid logo-img " src="{{asset('app/website/logo.png')}}">-->
                           <!--<h4 class="my-4 text-white">Easy Returns</h4>
                     <!--      <p class="text-center text-white mb-5 px-4">Not satisfied with a product? Return<br> it at the doorstep & get a refund within hours.</p>-->
                     <!--   </div>-->
                     <!--</div>-->
                  </div>
               </div>
               <div class="col-lg-4 pl-lg-5">
                  <div class="osahan-signin shadow-sm bg-white p-4 rounded">
                     <div class="p-3">
                        <h2 class="my-0">Welcome Back</h2>
                        <p class="small mb-4">Sign in to Continue.</p>
                        <form method="POST">
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
                        <p class="text-muted text-center small m-0 py-3">or</p>
                        <!-- <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
                           <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                        </a>
                        <a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
                           <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                        </a> -->
                        <p class="text-center mt-3 mb-0"><a href="{{ URL::to('/signup') }}" class="text-dark">Don't have an account?<font class="text-primary"> Sign up</font> </a></p>
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
      <div class="modal fade right-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header p-0">
                  <nav class="schedule w-100">
                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                           <p class="mb-0 font-weight-bold">Sign in</p>
                        </a>
                        <a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                           <p class="mb-0 font-weight-bold">Sign up</p>
                        </a>
                        <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                           <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
                        </a>
                     </div>
                  </nav>
               </div>
               <div class="modal-body p-0">
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="osahan-signin p-4 rounded">
                           <div class="p-2">
                              <h2 class="my-0">Welcome Back</h2>
                              <p class="small mb-4">Sign in to Continue.</p>
                              <form method="POST">
                              @csrf
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input placeholder="Enter Email" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input placeholder="Enter Password" type="password" name="password" class="form-control" id="exampleInputPassword1">
                                 </div>
                                 <button type="submit" class="btn btn-success btn-lg rounded btn-block" id="">Sign in</button>
                              </form>
                              <p class="text-muted text-center small m-0 py-3">or</p>
                              <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
                              <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                              </a>
                              <a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
                              <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                              </a>
                              <p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't have an account? Sign up</a></p>
                           </div>
                        </div>
                     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="osahan-signup bg-white p-4">
                           <div class="p-2">
                              <h2 class="my-0">Let's get started</h2>
                              <p class="small mb-4">Create account to see our top picks for you!</p>
                              <form action="">
                                 <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input placeholder="Enter Name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputNumber1">Phone Number</label>
                                    <input placeholder="Enter Phone Number" type="number" class="form-control" id="exampleInputNumber1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input placeholder="Enter Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input placeholder="Enter Password" type="password" class="form-control" id="exampleInputPassword1">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword2">Confirmation Password</label>
                                    <input placeholder="Enter Confirmation Password" type="password" class="form-control" id="exampleInputPassword2">
                                 </div>
                                 <button type="submit" class="btn btn-success rounded btn-lg btn-block">Create Account</button>
                              </form>
                              <p class="text-muted text-center small py-2 m-0">or</p>
                              <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
                              <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                              </a>
                              <a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
                              <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                              </a>
                              <p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already have an account! Sign in</a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer p-0 border-0">
                  <div class="col-6 m-0 p-0">
                     <a href="#" class="btn border-top border-right btn-lg btn-block" data-dismiss="modal">Close</a>
                  </div>
                  <div class="col-6 m-0 p-0">
                     <a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
            var password = $("input[name='password']").val();

            $.ajax({
               url: '{{url('/signin')}}',
               type: 'POST',
               data: {
                     email: email,
                     password: password
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
                        window.location = "{{ URL::to('/') }}";
                        $('#wrong_user').hide();
                        $('#right_user').show();
                     }

               }
            });

         });
         
         });
         
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
      </script>
   </body>
</html>
