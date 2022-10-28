<div class="modal modal-cus fade right-modal" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-cus modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0">
                <nav class="schedule w-100">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                            <img src="{{asset('img/favicon.png')}}"/>
                        </a>
                        <a class="nav-link col-8 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                            <h1 class="m-0 h4 text-dark">Grocery Cart</h1>
                        </a>
                        <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                            <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="modal-body p-0">
                <div style="max-height: 90%;overflow: auto;">
                    <table id="cart_table" style="width: 100%;">
                        @foreach($cart_data as $cart)
                            <tr class="{{$cart->product_id.'row'}}" style='width: 100%;border-bottom: 2px solid #9e9e9e45;'>
                                <td style='width: 10%; text-align: center;'>
                                    <a id="{{$cart->product_id}}anchor" class="cart_remove" name="{{$cart->product_id}}" price="{{$cart->total_price}}" style="color:#d50000;padding:20%;cursor: pointer;">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td style='width: 30%; text-align: center;'>
                                    @if($cart->product_img)
                                        <?php if (file_exists("../../naturexbd-manage/public".$cart->product_img)){ ?>
                                            <img height='80px' src="{{asset('https://manage.naturexbd.com'.$cart->product_img)}}" >
                                        <?php } else{ ?>
                                            <img height='80px' src='{{asset('/B0eS.gif')}}' >
                                        <?php } ?>
                                    @else
                                        <img height='80px' src='{{asset('/B0eS.gif')}}' >
                                    @endif
                                </td>
                                <td style='width: 30%; text-align: center;'>
                                    {{$cart->product_name}}<br><label>{{$cart->unit_price}}tk</label>
                                </td>
                                <td style='width: 30%; text-align: center;'>
                                    <span class='ml-auto' href='#'>
                                        <form id='' class='cart-items-number d-flex' >
                                            <input type='button' value='-' name='{{$cart->unit_price}}'  class='qtyminus btn btn-success btn-sm' style='{{$cart->quantity <= 1 ? "pointer-events: none":""}}' field='{{$cart->product_id.'quantity'}}' />
                                            <input type='text' name='{{$cart->product_id.'quantity'}}' value='{{$cart->quantity}}' class='qty form-control {{$cart->product_id}}' readonly/>
                                            <input type='button' value='+' name='{{$cart->unit_price}}' class='qtyplus btn btn-success btn-sm' field='{{$cart->product_id.'quantity'}}' />
                                        </form>
                                    </span>
                                </td>
                            </tr>
                            <?php
                                $total_price+=$cart->total_price;
                            ?>
                        @endforeach
                    </table>
                </div>
                <table style="width: 100%;font-size: larger; margin: 2% 0px;">
                    <tr style="width: 100%;">
                        <td style="width: 40%; text-align: center;">

                        </td>
                        <td style="width: 30%; text-align: center;">
                            Total
                        </td>
                        <td class="cart_price_table" style="width: 30%; text-align: center;">
                            @if($total_price>0)
                                <span class='ml-auto cart_total' name='<?php echo $total_price."BDT"; ?>' href='#'>
                                    <?php echo $total_price."BDT"; ?>
                                </span>
                            @else
                                <span class='ml-auto cart_total' name='0BDT' href='#'>
                                    0BDT
                                </span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer p-0 border-0">
                <form method="get" class="col-12 m-0 p-0">
                    <div class="col-12 m-0 p-0 checkout_btn_holder">
                        @if($total_price<=0)
                            <button style="border-radius: unset !important;" formaction="#" class=" xxx5 btn btn-success btn-lg rounded btn-block emptyCart proceed_to_checkout" ><i class="far fa-credit-card" onclick=""></i> Proceed to Checkout</button>
                        @else
                            <button style="border-radius: unset !important;" formaction="{{URL::to('/checkout')}}" class="btn btn-success btn-lg rounded btn-block proceed_to_checkout" ><i class="far fa-credit-card"></i> Proceed to Checkout</button>
                        @endif
                    </div>
                </form>
                <div class="col-12 m-0 p-0">
                    <a href="#" class="btn border-top border-right btn-lg btn-block" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

