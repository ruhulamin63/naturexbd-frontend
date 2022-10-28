@extends('grocery.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
         </div>
      </nav>



      <form method="post"  id="checkout-form">
          @csrf
          <section class="py-4 osahan-main-body">
             <div class="container">
                 @if(session()->has('error') && !session()->get('error'))
                     <div id="checkOutAlert" class="alert alert-success alert-dismissible mb-2" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">×</span>
                         </button>
                         <div class="d-flex align-items-center">
                             <i class="bx bx-like"></i>
                             <span>
                    {{ session()->get('message') }}
                    </span>
                         </div>
                     </div>
                 @endif
                 @if(session()->has('error') && session()->get('error'))
                     <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">×</span>
                         </button>
                         <div class="d-flex align-items-center">
                             <i class="bx bx-error"></i>
                             <span>
                        {{ session()->get('message') }}
                    </span>
                         </div>
                     </div>
                 @endif
                <div class="row">
                   <div class="col-lg-8">
                      <div class="bg-white rounded shadow-sm overflow-hidden">
                         <div class="row">
                             <div class="address p-3 bg-light col-md-6">
                                <h6 class="m-0 text-dark">Name</h6>
                             </div>
                              <div class="address p-3 bg-light col-md-6">
                                  <h6 class="m-0 text-dark">Mobile Number</h6>
                              </div>
                              <div class="p-3 col-md-6">
                                  @if($client_info->name)
                                  <p class="small text-muted m-0">{{$client_info->name}}</p>
                                  @else
                                  <input placeholder="Input your name" type="text" value="{{old('name')}}"  name="name" id="name"class="name form-control @error('name') is-invalid @enderror">
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                  @endif
                              </div>
                              <div class="p-3 col-md-6">
                                  @if($client_info->mobile)
                                  <p class="small text-muted m-0">{{$client_info->mobile}}</p>
                                  @else
                                  <input placeholder="Input your mobile no." type="text" value="{{old('mobile')}}"  name="mobile" class="mobile form-control @error('mobile') is-invalid @enderror">
                                  @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                  @endif
                              </div>
                         </div>
                          <div class="row">
                              <div class="address p-3 bg-light col-md-6">
                                  <h6 class="m-0 text-dark">Division</h6>
                              </div>
                              <div class="address p-3 bg-light col-md-6">
                                  <h6 class="m-0 text-dark">Email</h6>
                              </div>
                              <div class="p-3 col-md-6">
                                  @if($client_info->division)
                                  <p class="small text-muted m-0">{{$client_info->division}}</p>
                                  @else
                                  <input placeholder="Input your division name" type="text" value="{{old('division')}}" name="division" class="division form-control @error('division') is-invalid @enderror">
                                  @error('division')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                  @endif
                              </div>
                              <div class="p-3 col-md-6">
                                  @if($client_info->email)
                                  <p class="small text-muted m-0">{{$client_info->email}}</p>
                                  @else
                                  <input placeholder="Input your email" type="text" value="{{old('email')}}" name="email" class="emailx form-control @error('email') is-invalid @enderror">
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                  @endif
                              </div>
                          </div>
                         <div class="address p-3 bg-light">
                            <h6 class="m-0 text-dark d-flex align-items-center">Address <span class="small ml-auto"><a href="#" class="font-weight-bold text-decoration-none text-success" data-toggle="modal" data-target="#exampleModal"><i class="icofont-location-arrow"></i> Change</a></span></h6>
                         </div>
                         <div class="p-3">
                             <!--<div class="d-flex align-items-center">
                                <p class="mb-2 font-weight-bold">Home</p>
                                <p class="mb-2 badge badge-danger ml-auto">Default</p>
                            </div>-->
                            @if($client_info->address_primary)
                                  <p class="small text-muted m-0">{{$client_info->address_primary}}</p>
                                  @else
                                  <input placeholder="Input your address" type="text" value="{{old('address_primary')}}" name="address_primary" class="address_primary form-control @error('address_primary') is-invalid @enderror">
                                  @error('address_primary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                  @endif
                            <!--<p class="small text-muted m-0">Redwood City, CA 94063</p>-->
                         </div>
                          <div class="address p-3 bg-light">
                              <h6 class="m-0 text-dark d-flex align-items-center">Delivery Instructions</h6>
                          </div>
                          <div class="p-3">
                              <label class="containerRadioBox" style="font-size: 14px;">Inside Dhaka (ঢাকার মধ্যে) - BDT 60.00
                                    <input type="radio" @if(session()->has('delivery_zone') && session('delivery_zone') == 1) checked="checked" @endif name="radio" onclick="deliveryZoneChange('1')">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="containerRadioBox" style="font-size: 14px;">Sub Dhaka(Tongi,Keranigonj, Turag, Demra, Diabari, Purbachal, 100 feet, Bosila, Nowabpur, Dohar, Kamrangirchar, Doniya, Amin Bazar) - BDT 75.00
                                    <input type="radio" @if(session()->has('delivery_zone') && session('delivery_zone') == 2) checked="checked" @endif name="radio" onclick="deliveryZoneChange('2')">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="containerRadioBox" style="font-size: 14px;">Outside Dhaka -Advance delivery charge for COD (ঢাকার বাহিরে কভারেজ এরিয়ার উপর ভিত্তি করে ক্যাশ অন ডেলিভারি প্রযোজ্য) - BDT 110.0
                                    <input type="radio" @if(session()->has('delivery_zone') && session('delivery_zone') == 3) checked="checked" @endif name="radio" onclick="deliveryZoneChange('3')">
                                    <span class="checkmark"></span>
                                </label>
                              <input placeholder="Delivery Instructions e.g. Opposite Jamuna Future Park" type="text" name="delivery_note" class="delivery_note form-control">
                              <input placeholder="Total Amount" name="total_amount_to_pay" type="text" class="form-control" value="{{$total_price_to_pay}}" hidden>
                              <input placeholder="Payment Method" name="pay_method_data" id="pay_method_data" type="text" class="form-control" value="COD" hidden>
                          </div>
                         <!--<div class="address p-3 bg-light">
                            <h6 class="m-0 text-dark">Payment Method</h6>
                         </div>
                         <div class="p-3">
                            <a href="#" class="text-success text-decoration-none w-100" data-toggle="modal" data-target="#paymentModal">
                               <div class="d-flex align-items-center">
                                  <i class="icofont-credit-card"></i> <span class="ml-3">Edit Payment Method</span> <i class="icofont-rounded-right ml-auto"></i>
                               </div>
                            </a>
                         </div>-->
                         @if(session()->has('promo_code') && session('promo_amount')>0)

                         @else
                              <div class="address p-3 bg-light">
                                  <h6 class="text-dark m-0">Promo Code</h6>
                              </div>
                              <div>
                                  <div class="accordion" id="accordionExample">
                                      <div class="d-flex align-items-center" id="headingThree">
                                          <a class="p-3 d-flex align-items-center text-decoration-none text-success w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              <i class="icofont-badge mr-3"></i> Add Promo Code
                                              <i class="icofont-rounded-down ml-auto"></i>
                                          </a>
                                      </div>
                                      <div id="collapseThree" class="collapse p-3 border-top" aria-labelledby="headingThree" data-parent="#accordionExample">
                                          <div class="clearfix">
                                              <div class="input-group-sm mb-2 input-group">
                                                  <input placeholder="Enter promo code" name="promo_code" type="text" class="form-control">
                                                  <div class="input-group-append"><button id="button-addon2" type="submit" formaction="{{URL::to('/applyPromo')}}" class="btn btn-success" ><i class="icofont-percent"></i> APPLY</button></div>
                                              </div>
                                              <!--<div class="mb-0 input-group">
                                                 <div class="input-group-prepend"><span class="input-group-text"><i class="icofont-ui-message"></i></span></div>
                                                 <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control"></textarea>
                                              </div>-->
                                          </div>
                                      </div>
                                  </div>
                              </div>
                         @endif

                          <div class="address p-3 bg-light">
                              <h6 class="m-0 text-dark d-flex align-items-center">Chose Payment Method</h6>
                          </div>
                          <div class="p-3 row">
                              <div class="col-md-4" style="padding-left: 35px;padding-top: 10px;">
                                  <input type="radio" class="custom-control-input" id="cod" value="COD" name="paymentMethod" checked onclick="changeButtonCheckout(this.value)">
                                  <label class="custom-control-label collapsed" style="font-size: 16px;" for="cod" >Cash On Delivery</label>
                              </div>
                              <div class="col-md-4" style="padding-left: 35px;padding-top: 10px;">
                                  <input type="radio" class="custom-control-input m-0 kasghjkm " id="bkash" value="bKash" name="paymentMethod" onclick="changeButtonCheckout(this.value)">
                                  <label class="custom-control-label collapsed" for="bkash" ><img src="{{asset('bKash-logo.png')}}" width="52px" /></label>
                              </div>
                              <!--<div class="col-md-4" style="padding-left: 35px;padding-top: 10px;">-->
                              <!--    <input type="radio" class="custom-control-input m-0" id="nagad" value="nagad" name="paymentMethod" onclick="changeButtonCheckout(this.value)">-->
                              <!--    <label class="custom-control-label collapsed" for="nagad" ><img src="{{asset('Nagad-Logo.png')}}" width="52px" /></label>-->
                              <!--</div>-->
                          </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div> <!--class="sticky_sidebar"-->
                         <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
                            <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                               <img alt="osahan" src="{{asset('img/favicon.png')}}" class="mr-3  img-fluid">
                               <div class="d-flex flex-column">
                                  <h6 class="mb-1 font-weight-bold">NatureX</h6>
                                  <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Sector 4, Road 20, House 14, Uttara, Dhaka - 1230</p>
                               </div>
                            </div>
                            <div>
                               <div class="bg-white p-3 clearfix">
                                  <p class="font-weight-bold small mb-2">Bill Details</p>
                                  <p class="mb-1">Item Total <span class="small text-muted">({{$total_items}} item)</span> <span class="float-right text-dark">{{$total_price_to_pay}}BDT</span></p>
                                  <!-- <p class="mb-1">Store Charges <span class="float-right text-dark">0BDT</span></p> -->
                                  <p class="mb-3">Delivery Fee <span  data-toggle="tooltip" data-placement="top" title="Free Delivery" class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark">{{session('delivery_charge')}}BDT</span></p>
                                   <?php
                                       $total_price_to_pay +=session('delivery_charge');
                                    ?> 
                                   <p class="mb-1">Total <span class="float-right text-dark">{{$total_price_to_pay}}BDT</span></p>
                                   @if(session()->has('promo_code') && session('promo_amount')>0)
                                       <h6 class="mb-0 text-success">Total Discount<span class="float-right text-success"><a href="{{URL::to('/removePromo')}}" style="color:#d20707;font-size: 12px;" >(Remove)</a> - {{session('promo_amount')}}BDT</span></h6>
                                   @else
                                       <h6 class="mb-0 text-success">Total Discount<span class="float-right text-success">0BDT</span></h6>
                                   @endif
                               </div>
                               <div class="p-3 border-top">
                                   @if(session()->has('promo_code') && session('promo_amount')>0)
                                       <?php
                                       $total_price_to_pay -=session('promo_amount');
                                       ?>
                                       <h5 class="mb-0">TO PAY  <span class="float-right text-danger">{{$total_price_to_pay}}BDT</span></h5>
                                   @else
                                       <h5 class="mb-0">TO PAY  <span class="float-right text-danger">{{$total_price_to_pay}}BDT</span></h5>
                                   @endif
                               </div>
                            </div>
                         </div>
                         <button formaction="{{URL::to('/place_order')}}" class="btn btn-success btn-lg btn-block mt-3 mb-3 place_order" name="place_order" id="place_order">Place Order</button>

                          <!--<a href="#" class="btn btn-success btn-lg btn-block mt-3 mb-3" data-toggle="modal" data-target="#paymentModal">Place Order</a>-->
                         <!--<p class="text-success text-center">Your Total Savings on this order $8.52</p>-->

                      </div>
                      <!--<a style="display: none;color:#fff;"  class="btn btn-success btn-lg btn-block mt-3 mb-3 bKash_button checkout_validate" name="{{$total_price_to_pay}}" orgName="{{$client_info->name?$client_info->name:'Guest'}}" id="bKash_button" onclick="BkashPayment()" >Continue to Payment with Bkash</a>-->
                      <a style="display: none;color:#fff;" class=" btn btn-success btn-lg btn-block bKash_button">Continue to Payment with Bkash</a>
                      <a style="display: none;color:#fff;"  class="btn btn-success btn-lg btn-block mt-3 mb-3 bkash_popup " name="{{$total_price_to_pay}}" orgName="{{$client_info->name?$client_info->name:'Guest'}}" id="bKash_button" ></a>
                      
                      <a  style="display: none;color:#fff;" class=" btn btn-success btn-lg btn-block nagad_button" href="javascript:void(0)" name="{{$total_price_to_pay}}" id="nagad_button">Continue to Payment with Nagad</a
                       
                   </div>
                </div>
             </div>
          </section>
      </form>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Delivery Address</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form class="" method="post">
                   @csrf
                   <div class="modal-body">
                         <div class="form-row">
                            <!--<div class="col-md-12 form-group">
                               <label class="form-label">Delivery Area</label>
                               <div class="input-group">
                                  <input placeholder="Delivery Area" type="text" class="form-control">
                                  <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-pin"></i></button></div>
                               </div>
                            </div>-->
                            <div class="col-md-12 form-group"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" name="new_address" class="form-control" value="{{$client_info->address_primary}}" required></div>
                             <!--<div class="col-md-12 form-group"><label class="form-label">Delivery Instructions</label><input placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control"></div>-->
                             <!--<div class="mb-0 col-md-12 form-group">
                                <label class="form-label">Nickname</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                   <label class="btn btn-outline-secondary active">
                                   <input type="radio" name="options" id="option1" checked> Home
                                   </label>
                                   <label class="btn btn-outline-secondary">
                                   <input type="radio" name="options" id="option2"> Work
                                   </label>
                                   <label class="btn btn-outline-secondary">
                                   <input type="radio" name="options" id="option3"> Other
                                   </label>the tiems iy
                                </div>
                             </div>-->
                         </div>
                   </div>
                   <div class="modal-footer p-0 border-0">
                      <div class="col-6 m-0 p-0">
                         <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                      </div>
                      <div class="col-6 m-0 p-0">
                         <button type="submit" formaction="{{URL::to('/change_address')}}" class="btn btn-success btn-lg btn-block">Save changes</button>
                      </div>
                   </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="paymentModalLabel">Choose Payment Method</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="schedule">
                          <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                  <a class="nav-link active text-dark" id="credit-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit"
                                     aria-selected="true" style="padding: 0px !important;">
                                      <img src="{{asset('bKash-logo.png')}}" height="52px" />
                                  </a>
                              </li>
                              <!--<li class="nav-item" role="presentation">
                                  <a class="nav-link text-dark" id="banking-tab" data-toggle="tab" href="#banking" role="tab" aria-controls="banking"
                                     aria-selected="false">
                                      <p class="mb-0 font-weight-bold"><i class="icofont-globe mr-2"></i> Net Banking</p>
                                  </a>
                              </li>-->
                              <li class="nav-item" role="presentation">
                                  <a class="nav-link text-dark" id="cash-tab" data-toggle="tab" href="#cash" role="tab" aria-controls="cash"
                                     aria-selected="false">
                                      <p class="mb-0 font-weight-bold"><i class="icofont-dollar mr-2"></i> Cash on Delivery</p>
                                  </a>
                              </li>
                          </ul>
                          <div class="tab-content bg-white" id="myTabContent">
                              <div class="tab-pane fade show active" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                  <div class="osahan-card-body pt-3">
                                      <!--<h6 class="m-0">Add new card</h6>
                                      <p class="small">WE ACCEPT <span class="osahan-card ml-2 font-weight-bold">( Master Card / Visa Card / Rupay )</span></p>-->
                                      <form>
                                          <div class="form-row">
                                              <div class="col-md-12 form-group">
                                                  <label class="form-label font-weight-bold small">Bkash Number</label>
                                                  <div class="input-group">
                                                      <input placeholder="Your Bkash Number" type="number" name="bkash_number" class="form-control">
                                                      <!--<div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-credit-card"></i></button></div>-->
                                                  </div>
                                              </div>
                                              <div class="col-md-8 form-group"><label class="form-label font-weight-bold small">Valid through(MM/YY)</label><input placeholder="Enter Valid through(MM/YY)" type="number" class="form-control"></div>
                                              <div class="col-md-4 form-group"><label class="form-label font-weight-bold small">CVV</label><input placeholder="Enter CVV Number" type="number" class="form-control"></div>
                                              <div class="col-md-12 form-group"><label class="form-label font-weight-bold small">Name on card</label><input placeholder="Enter Card number" type="text" class="form-control"></div>
                                              <div class="col-md-12 form-group">
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" id="custom-checkbox1" class="custom-control-input">
                                                      <label title="" type="checkbox" for="custom-checkbox1" class="custom-control-label small pt-1">Securely save this card for a faster checkout next time.</label>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <!--<div class="tab-pane fade" id="banking" role="tabpanel" aria-labelledby="banking-tab">
                                  <div class="osahan-card-body pt-3">
                                      <form>
                                          <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                              <label class="btn btn-outline-secondary active">
                                                  <input type="radio" name="options" id="option1" checked=""> HDFC
                                              </label>
                                              <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="options" id="option2"> ICICI
                                              </label>
                                              <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="options" id="option3"> AXIS
                                              </label>
                                          </div>
                                          <div class="form-row pt-3">
                                              <div class="col-md-12 form-group">
                                                  <label class="form-label small font-weight-bold">Select Bank</label><br>
                                                  <select class="custom-select form-control">
                                                      <option>Bank</option>
                                                      <option>KOTAK</option>
                                                      <option>SBI</option>
                                                      <option>UCO</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>-->
                              <div class="tab-pane fade" id="cash" role="tabpanel" aria-labelledby="cash-tab">
                                  <div class="custom-control custom-checkbox pt-3">
                                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                      <label class="custom-control-label" for="customControlAutosizing">
                                          <b>Cash</b><br>
                                          <p class="small text-muted m-0">Please keep exact change handy to help us serve you better</p>
                                      </label>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer p-0 border-0">
                      <div class="col-6 m-0 p-0">
                          <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                      </div>
                      <div class="col-6 m-0 p-0">
                          <button type="button" class="btn btn-success btn-lg btn-block">Proceed</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
     

      </div>
      
      
      
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script>
          $(".bKash_button").on("click", function(){
              if(checkoutValidate()){
                $('.bkash_popup').trigger('click');   
              }
                
            });
            
            $(".nagad_button").on("click", function(event){
              if(!checkoutValidate()){
                event.preventDefault();  
              }else{
                  let total_price_to_pay = '{{base64_encode($total_price_to_pay)}}';
                  
                  let params = "name="+jQuery(".name").val()+
                  "&email="+jQuery(".emailx").val()+
                  "&mobile=" + jQuery(".mobile").val() +
                  "&division=" + jQuery(".division").val() +
                  "&address_primary=" + jQuery(".address_primary").val() +
                  "&delivery_note=" + jQuery(".delivery_note").val() +
                  "&total_price_to_pay="+total_price_to_pay+"&type=2";
                  let createNagadURL = '{{ url('/nagad-payment')}}';
                  
                  
                   window.location.href = createNagadURL+"?"+params;
                    //set session
                    
                  
              }
                
            });
            
            function checkoutValidate(){
                      var empty = [];
                      
                            if($("#checkout-form").find('input[name="name"]').val() ==""){
                                $("#checkout-form").find('input[name="name"]').addClass('is-invalid');
                                empty[0]= false;
                            }else{
                                $("#checkout-form").find('input[name="name"]').removeClass('is-invalid');
                                empty[0]= true;
                                
                            };
                            if($("#checkout-form").find('input[name="mobile"]').val() ==""){
                                $("#checkout-form").find('input[name="mobile"]').addClass('is-invalid');
                                empty[1]= false;
                            }else{
                                $("#checkout-form").find('input[name="mobile"]').removeClass('is-invalid');
                                empty[1]= true;
                                
                            };
                            if($("#checkout-form").find('input[name="division"]').val() ==""){
                                $("#checkout-form").find('input[name="division"]').addClass('is-invalid');
                                empty[2]= false;;
                            }else{
                                $("#checkout-form").find('input[name="division"]').removeClass('is-invalid');
                                empty[2]= true;
                                
                            };
                            if($("#checkout-form").find('input[name="address_primary"]').val() ==""){
                                $("#checkout-form").find('input[name="address_primary"]').addClass('is-invalid');
                                empty[3]= false;
                            }else{
                                $("#checkout-form").find('input[name="address_primary"]').removeClass('is-invalid');
                                empty[3]= true;
                                
                            };
                            if($("#checkout-form").find('input[name="email"]').val() ==""){
                                $("#checkout-form").find('input[name="email"]').addClass('is-invalid');
                                empty[4]= false;
                            }else{
                                $("#checkout-form").find('input[name="email"]').removeClass('is-invalid');
                                empty[4]= true;
                                
                            };
                            if(empty.includes(false)){
                                return false;
                            }else{
                                return true;
                            }
                          
                       
                    }
      </script>
      <script>
        var accessToken='';
        jQuery(document).ready(function(){
            $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                      }
                });
                //create token
            $.ajax({
                  url: '{{url('/token')}}',
                  type: 'POST',
                  contentType: 'application/json',
                  success: function (data) {
                      console.log('got data from token  ..');
                      console.log(JSON.stringify(data));
            
                      accessToken=JSON.stringify(data);
                  },
                  error: function(err){
                      //console.log('error');
                      console.error(err.responseJSON.message)
                  }
            });
                
            var paymentRequest = { amount:jQuery("#bKash_button").attr('name'),intent:'sale',invoice:'{{'KTW-'.date('md').'-'.strtoupper(Str::random(4))}}'};
            //var formData = $("#checkout-form").serialize();
            var paymentConfig={
              createCheckoutURL: '{{url('/createpayment')}}',
              executeCheckoutURL: '{{url('/executepayment')}}'
            };
            bKash.init({
                paymentMode: 'checkout',
                paymentRequest: paymentRequest,
                createRequest: function(request){
                
              $.ajax({
                  url: paymentConfig.createCheckoutURL+"?amount="+paymentRequest.amount + "&invoice=" + paymentRequest.invoice,
                  type:'GET',
                  contentType: 'application/json',
                  success: function(data) {
                      console.log('got data from create  ..');
                      console.log('data ::=>');
                      console.log(JSON.stringify(data));
            
                      var obj = JSON.parse(data);
            
                      if(data && obj.paymentID != null){
                          paymentID = obj.paymentID;
                          bKash.create().onSuccess(obj);
                      }
                      else {
                          console.log('error');
                          bKash.create().onError();
                      }
                  },
                  error: function(){
                      console.log('error');
                      bKash.create().onError();
                  }
              });
            },
            
                executeRequestOnAuthorization: function(){
              console.log('=> executeRequestOnAuthorization');
              
              $.ajax({
                  url: paymentConfig.executeCheckoutURL+"?paymentID="+paymentID+
                  "&name="+jQuery(".name").val()+
                  "&email="+jQuery(".emailx").val()+
                  "&mobile=" + jQuery(".mobile").val() +
                  "&division=" + jQuery(".division").val() +
                  "&address_primary=" + jQuery(".address_primary").val() +
                  "&delivery_note=" + jQuery(".delivery_note").val(),
                  
                  type: 'GET',
                  contentType:'application/json',
                  success: function(data){
                      console.log('got data from execute  ..');
                      console.log('data ::=>');
                      console.log(JSON.stringify(data));
            
                      data = JSON.parse(data);
                      if(data && data.paymentID != null){
                          //alert('[SUCCESS] data : ' + JSON.stringify(data));
                          window.location.href = '{{url('/MyOrder')}}';
                      }
                      else {
                          bKash.execute().onError();
                      }
                  },
                  error: function(){
                      bKash.execute().onError();
                  }
              });
            }
            });
                });
        
        function callReconfigure(val) {
            bKash.reconfigure(val);
        }
        function clickPayButton() {
            $("#bKash_button").trigger('click');
        }
      </script>
      
                <!--Sandbox bKash Script-->
    <!--<script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>-->
    <script id = "myScript" src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>
    
    <script>

        function deliveryZoneChange(zone){
            console.log(zone);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/changeDeliveryZon') }}",
                type: "POST",
                data: {
                    deliveryZone: zone
                },
                success: function(result) {
                    console.log(result);
                    window.location.reload();
                }
            });
        }
    
    </script>

@endsection


