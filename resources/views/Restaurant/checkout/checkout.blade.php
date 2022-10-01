@extends('restaurant.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{URL::to('/restaurant')}}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
         </div>
      </nav>



      <form method="post">
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
                    {{ session()->get('promo_code') }}
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
                                  <p class="small text-muted m-0">{{$client_info->name}}</p>
                              </div>
                              <div class="p-3 col-md-6">
                                  <p class="small text-muted m-0">{{$client_info->mobile}}</p>
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
                                  <p class="small text-muted m-0">{{$client_info->division}}</p>
                              </div>
                              <div class="p-3 col-md-6">
                                  <p class="small text-muted m-0">{{$client_info->email}}</p>
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
                            <p class="small text-muted m-0">{{$client_info->address_primary}}</p>
                            <!--<p class="small text-muted m-0">Redwood City, CA 94063</p>-->
                         </div>
                          <div class="address p-3 bg-light">
                              <h6 class="m-0 text-dark d-flex align-items-center">Delivery Instructions</h6>
                          </div>
                          <div class="p-3">
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
                                                  <div class="input-group-append"><button id="button-addon2" type="submit" formaction="{{URL::to('/resApplyPromo')}}" class="btn btn-success" ><i class="icofont-percent"></i> APPLY</button></div>
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
                                  <input type="radio" class="custom-control-input" id="cod" value="COD" name="paymentMethod" checked onclick="changeButton(this.value)">
                                  <label class="custom-control-label collapsed" style="font-size: 16px;" for="cod" >Cash On Delivery</label>
                              </div>
                              <div class="col-md-4" style="padding-left: 35px;padding-top: 10px;">
                                  <input type="radio" class="custom-control-input m-0" id="bkash" value="bKash" name="paymentMethod" onclick="changeButton(this.value)">
                                  <label class="custom-control-label collapsed" for="bkash" ><img src="{{asset('bKash-logo.png')}}" width="52px" /></label>
                              </div>
                              <div class="col-md-4" style="padding-left: 35px;padding-top: 10px;">
                                  <input type="radio" class="custom-control-input m-0" id="nagad" value="nagad" name="paymentMethod" onclick="changeButton(this.value)">
                                  <label class="custom-control-label collapsed" for="nagad" ><img src="{{asset('Nagad-Logo.png')}}" width="52px" /></label>
                              </div>
                          </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div> <!--class="sticky_sidebar"-->
                         <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
                            <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                               <img alt="osahan" src="{{asset('img/favicon.png')}}" class="mr-3  img-fluid">
                               <div class="d-flex flex-column">
                                  <h6 class="mb-1 font-weight-bold">Naturex</h6>
                                  <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Sector 4, Road 20, House 14, Uttara, Dhaka - 1230</p>
                               </div>
                            </div>
                            <div>
                               <div class="bg-white p-3 clearfix">
                                  <p class="font-weight-bold small mb-2">Bill Details</p>
                                  <p class="mb-1">Item Total <span class="small text-muted">({{$total_items}} item)</span> <span class="float-right text-dark">{{$total_price_to_pay}}BDT</span></p>
                                  <!-- <p class="mb-1">Store Charges <span class="float-right text-dark">0BDT</span></p> -->
                                  <p class="mb-3">Delivery Fee <span  data-toggle="tooltip" data-placement="top" title="Free Delivery" class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark">{{session('delivery_charge')}}BDT</span></p>
                                   <p class="mb-1">Total <span class="float-right text-dark">{{$total_price_to_pay}}BDT</span></p>
                                   @if(session()->has('promo_code') && session('promo_amount')>0)
                                       <h6 class="mb-0 text-success">Total Discount<span class="float-right text-success"><a href="{{URL::to('/resRemovePromo')}}" style="color:#d20707;font-size: 12px;" >(Remove)</a> - {{session('promo_amount')}}BDT</span></h6>
                                   @else
                                       <h6 class="mb-0 text-success">Total Discount<span class="float-right text-success">0BDT</span></h6>
                                   @endif
                               </div>
                               <div class="p-3 border-top">
                                   @if(session()->has('promo_code') && session('promo_amount')>0)
                                       <?php
                                       $total_price_to_pay -=session('promo_amount');
                                       $total_price_to_pay +=session('delivery_charge');
                                       ?>
                                       <h5 class="mb-0">TO PAY  <span class="float-right text-danger">{{$total_price_to_pay}}BDT</span></h5>
                                   @else
                                       <?php
                                       $total_price_to_pay +=session('delivery_charge');
                                       ?>
                                       <h5 class="mb-0">TO PAY  <span class="float-right text-danger">{{$total_price_to_pay}}BDT</span></h5>
                                   @endif
                               </div>
                            </div>
                         </div>
                         <button formaction="{{URL::to('/resplace_order')}}" class="btn btn-success btn-lg btn-block mt-3 mb-3" name="place_order" id="place_order">Place Order</button>

                          <!--<a href="#" class="btn btn-success btn-lg btn-block mt-3 mb-3" data-toggle="modal" data-target="#paymentModal">Place Order</a>-->
                         <!--<p class="text-success text-center">Your Total Savings on this order $8.52</p>-->

                      </div>
                       <a style="display: none;color:#fff;"  class="btn btn-success btn-lg btn-block mt-3 mb-3" name="{{$total_price_to_pay}}" orgName="{{$client_info->name}}" id="bKash_button" >Continue to Payment with Bkash</a>
                       <a href="{{ URL::to('/nagad/pay/'.base64_encode($total_price_to_pay).'/1') }}" style="display: none;color:#fff;"  class="btn btn-success btn-lg btn-block mt-3 mb-3" name="{{$total_price_to_pay}}" id="nagad_button" >Continue to Payment with Nagad</a>
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

@endsection


<script>


</script>
