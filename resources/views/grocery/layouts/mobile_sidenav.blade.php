<nav id="main-nav">
   <ul class="second-nav">
      <li><a href="{{ URL::to('/') }}"><i class="icofont-home mr-2"></i> Home</a></li>
      @if(session()->has('client_id'))
      <!-- <li>
         <a href="#"><i class="icofont-sub-listing mr-2"></i> My Order</a>
         <ul>
            <li><a class="dropdown-item" href="my_order.html">My order</a></li>
            <li><a class="dropdown-item" href="status_complete.html">Status Complete</a></li>
            <li><a class="dropdown-item" href="status_onprocess.html">Status on Process</a></li>
            <li><a class="dropdown-item" href="status_canceled.html">Status Canceled</a></li>
            <li><a class="dropdown-item" href="review.html">Review</a></li>
         </ul>
      </li> -->
      
      <li>
         <a href="#"><i class="icofont-ui-user mr-2"></i> My Account</a>
         <ul>
            <li><a class="dropdown-item" href="{{ URL::to('/profile') }}">My account</a></li>
            <!-- <li><a class="dropdown-item" href="promos.html">Promos</a></li> -->
            <!--<li><a class="dropdown-item" href="my_address.html">My address</a></li>-->
            <!--<li><a class="dropdown-item" href="terms_conditions.html">Terms & conditions</a></li>-->
            <!--<li><a class="dropdown-item" href="help_support.html">Help & support</a></li>-->
            <!-- <li><a class="dropdown-item" href="help_ticket.html">Help ticket</a></li> -->
            <li><a class="dropdown-item" href="{{ URL::to('/signout') }}">Sign out</a></li>
         </ul>
      </li>
      @endif
      @if(!session()->has('client_id'))
      <li>
         <a href="#"><i class="icofont-login mr-2"></i> Sign in</a>
         <ul>
            <li><a class="dropdown-item" href="{{ URL::to('/signin') }}">Sign In</a></li>
            <li><a class="dropdown-item" href="{{ URL::to('/signup') }}">Sign Up</a></li>
         </ul>
      </li>
      @endif
      <!-- <li><a class="dropdown-item" href="listing.html">Listing</a></li> -->
      <!-- <li><a class="dropdown-item" href="product_details.html">Detail</a></li> -->
      <!-- <li><a class="dropdown-item" href="picks_today.html">Trending</a></li> -->
      <li><a class="dropdown-item" href="{{ URL::to('/seeAllProduct') }}">All Products</a></li>
      <li><a class="dropdown-item" href="{{ URL::to('/offer_Product') }}">Offers</a></li>
      @if(session()->has('client_id'))
          <li><a class="dropdown-item" href="{{ URL::to('/MyOrder') }}">My Orders</a></li>
          <li><a class="dropdown-item" href="{{ URL::to('/checkout') }}">Checkout</a></li>
      @endif
      <!-- <li><a class="dropdown-item" href="successful.html">Successful</a></li> -->
      
      <li><a class="dropdown-item termsConditionsModel" href="#">Terms & Conditions</a></li>
      <li><a class="dropdown-item privacyPolicyModel" href="#">Privacy Policy</a></li>
      <li><a class="dropdown-item returnRefundCanModel" href="#">Refund, Return & Cancellation</a></li>
      <li><a class="dropdown-item contactUsModel" href="#">Contacts</a></li>
      <li><a class="dropdown-item aboutModel" href="#">About Us</a></li>
      
      <!--<li>
         <a href="#"><i class="icofont-page mr-2"></i> Pages</a>
         <ul>
            <li><a class="dropdown-item" href="verification.html">Verification</a></li>
            <li><a class="dropdown-item" href="promos.html">Promos</a></li>
            <li><a class="dropdown-item" href="promo_details.html">Promo Details</a></li>
            <li><a class="dropdown-item aboutModel" href="#">About Us</a></li>
            <li><a class="dropdown-item contactUsModel" href="#">Contacts</a></li>
            <li><a class="dropdown-item termsConditionsModel" href="#">Terms & Conditions</a></li>
            <li><a class="dropdown-item privacyPolicyModel" href="#">Privacy Policy</a></li>
            <li><a class="dropdown-item returnRefundCanModel" href="#">Refund, Return & Cancellation</a></li>
         </ul>
      </li>-->
      
      <!-- <li>
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
      </li> -->
   </ul>
   <ul class="bottom-nav">
      <li class="email">
         <a class="text-success" href="{{ URL::to('/') }}">
            <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
            Home
         </a>
      </li>
      <li class="github">
         <a href="{{ URL::to('/cart') }}">
            <p class="h5 m-0"><i class="icofont-cart"></i></p>
            Cart
         </a>
      </li>
      <li class="ko-fi">
         <a href="#">
            <p class="h5 m-0"><i class="icofont-headphone"></i></p>
            Help
         </a>
      </li>
   </ul>
</nav>