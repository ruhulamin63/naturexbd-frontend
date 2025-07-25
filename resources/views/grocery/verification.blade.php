<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="{{asset('img/logo.svg')}}">
      <title>Grofarweb - Online Grocery Supermarket HTML Template</title>
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
   </head>
   <body class="fixed-bottom-padding">
      <div class="border-bottom p-3 d-none mobile-nav">
         <div class="title d-flex align-items-center">
            <a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
               <img class="osahan-logo mr-2" src="{{asset('img/logo.svg')}}">
               <h4 class="font-weight-bold text-success m-0">Grocery</h4>
            </a>
            <p class="ml-auto m-0">
               <a href="listing.html" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
               <i class="text-dark icofont-sale-discount"></i>
               <span class="badge badge-danger p-1 ml-1 small">50%</span>
               </a>
            </p>
            <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
         </div>
         <a href="search.html" class="text-decoration-none">
            <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
               <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
               </div>
               <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Search for Products.." aria-label="" aria-describedby="basic-addon1">
            </div>
         </a>
      </div>
      <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div>
      <!-- verification -->
      <section class="osahan-main-body">
         <div class="container">
            <div class="row d-flex align-items-center justify-content-center vh-100">
               <div class="col-lg-6">
                  <div class="osahan-verification shadow bg-white p-4 rounded">
                     <div class="osahan-form p-3 text-center mt-3">
                        <h2>Verify your number</h2>
                        <p>Enter the 4-digit code we sent to you</p>
                        <p>98*** ***76</p>
                        <form action="home.html">
                           <div class="row my-5 px-5">
                              <div class="col px-2">
                                 <input type="text" placeholder="0" class="form-control opt form-control-lg text-center">
                              </div>
                              <div class="col px-2">
                                 <input type="text" placeholder="0" class="form-control opt form-control-lg text-center">
                              </div>
                              <div class="col px-2">
                                 <input type="text" placeholder="0" class="form-control opt form-control-lg text-center">
                              </div>
                              <div class="col px-2">
                                 <input type="text" placeholder="0" class="form-control opt form-control-lg text-center">
                              </div>
                           </div>
                           <p><a href="#" class="text-decoration-none text-success">Resend Code</a></p>
                           <p><a href="#" class="text-decoration-none text-dark">Call me instead</a></p>
                           <button class="btn btn-success btn-block btn-lg">Continue</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <nav id="main-nav">
         <ul class="second-nav">
            <li><a href="home.html"><i class="icofont-smart-phone mr-2"></i> Home</a></li>
            <li>
               <a href="#"><i class="icofont-login mr-2"></i> Authentication</a>
               <ul>
                  <li><a class="dropdown-item" href="signin.html">Sign In</a></li>
                  <li><a class="dropdown-item" href="signup.html">Sign Up</a></li>
                  <li><a href="verification.html">Verification</a></li>
               </ul>
            </li>
            <li><a class="dropdown-item" href="listing.html">Listing</a></li>
            <li><a class="dropdown-item" href="product_details.html">Detail</a></li>
            <li><a class="dropdown-item" href="picks_today.html">Trending</a></li>
            <li><a class="dropdown-item" href="recommend.html">Recommended</a></li>
            <li><a class="dropdown-item" href="fresh_vegan.html">Most Popular</a></li>
            <li><a class="dropdown-item" href="cart.html">Cart</a></li>
            <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
            <li><a class="dropdown-item" href="successful.html">Successful</a></li>
            <li>
               <a href="#"><i class="icofont-sub-listing mr-2"></i> My Order</a>
               <ul>
                  <li><a class="dropdown-item" href="my_order.html">My order</a></li>
                  <li><a class="dropdown-item" href="status_complete.html">Status Complete</a></li>
                  <li><a class="dropdown-item" href="status_onprocess.html">Status on Process</a></li>
                  <li><a class="dropdown-item" href="status_canceled.html">Status Canceled</a></li>
                  <li><a class="dropdown-item" href="review.html">Review</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="icofont-ui-user mr-2"></i> My Account</a>
               <ul>
                  <li><a class="dropdown-item" href="my_account.html">My account</a></li>
                  <li><a class="dropdown-item" href="promos.html">Promos</a></li>
                  <li><a class="dropdown-item" href="my_address.html">My address</a></li>
                  <li><a class="dropdown-item" href="terms_conditions.html">Terms & conditions</a></li>
                  <li><a class="dropdown-item" href="help_support.html">Help & support</a></li>
                  <li><a class="dropdown-item" href="help_ticket.html">Help ticket</a></li>
                  <li><a class="dropdown-item" href="signin.html">Logout</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="icofont-page mr-2"></i> Pages</a>
               <ul>
                  <li><a class="dropdown-item" href="verification.html">Verification</a></li>
                  <li><a class="dropdown-item" href="promos.html">Promos</a></li>
                  <li><a class="dropdown-item" href="promo_details.html">Promo Details</a></li>
                  <li><a class="dropdown-item" href="terms_conditions.html">Terms & Conditions</a></li>
                  <li><a class="dropdown-item" href="privacy.html">Privacy</a></li>
                  <li><a class="dropdown-item" href="terms&conditions.html">Conditions</a></li>
                  <li><a class="dropdown-item" href="help_support.html">Help Support</a></li>
                  <li><a class="dropdown-item" href="help_ticket.html">Help Ticket</a></li>
                  <li><a class="dropdown-item" href="refund_payment.html">Refund Payment</a></li>
                  <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                  <li><a class="dropdown-item" href="signin.html">Sign In</a></li>
                  <li><a class="dropdown-item" href="signup.html">Sign Up</a></li>
                  <li><a class="dropdown-item" href="search.html">Search</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="icofont-link mr-2"></i> Navigation Link Example</a>
               <ul>
                  <li>
                     <a href="#">Link Example 1</a>
                     <ul>
                        <li>
                           <a href="#">Link Example 1.1</a>
                           <ul>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#">Link Example 1.2</a>
                           <ul>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li><a href="#">Link Example 2</a></li>
                  <li><a href="#">Link Example 3</a></li>
                  <li><a href="#">Link Example 4</a></li>
                  <li data-nav-custom-content>
                     <div class="custom-message">
                        You can add any custom content to your navigation items. This text is just an example.
                     </div>
                  </li>
               </ul>
            </li>
         </ul>
         <ul class="bottom-nav">
            <li class="email">
               <a class="text-success" href="home.html">
                  <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                  Home
               </a>
            </li>
            <li class="github">
               <a href="cart.html">
                  <p class="h5 m-0"><i class="icofont-cart"></i></p>
                  CART
               </a>
            </li>
            <li class="ko-fi">
               <a href="help_ticket.html">
                  <p class="h5 m-0"><i class="icofont-headphone"></i></p>
                  Help
               </a>
            </li>
         </ul>
      </nav>
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
                              <form action="verification.html">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input placeholder="Enter Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input placeholder="Enter Password" type="password" class="form-control" id="exampleInputPassword1">
                                 </div>
                                 <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign in</button>
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
                     </div>
                     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="osahan-signup bg-white p-4">
                           <div class="p-2">
                              <h2 class="my-0">Let's get started</h2>
                              <p class="small mb-4">Create account to see our top picks for you!</p>
                              <form action="verification.html">
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
   </body>
   </html