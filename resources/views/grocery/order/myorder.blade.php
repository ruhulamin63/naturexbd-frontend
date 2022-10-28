@extends('grocery.layouts.main')
@section('content')

<!-- bread_cum -->
   <nav aria-label="breadcrumb" class="breadcrumb mb-0">
      <div class="container">
         <ol class="d-flex align-items-center mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}" class="text-success">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Order</li>
         </ol>
      </div>
   </nav>
      <!-- body -->
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
                <div class="col-md-3">
                    <ul class="nav nav-tabs custom-tabs border-0 flex-column bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-0 text-dark py-3 active" id="allOrder-tab" data-toggle="tab" href="#allOrder" role="tab" aria-controls="allOrder" aria-selected="true">
                            <i class="icofont-listing-number mr-2 text-success mb-0"></i> All Order</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">
                            <i class="icofont-sand-clock mr-2 text-success mb-0"></i> Pending</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="false">
                            <i class="icofont-wall-clock mr-2 text-warning mb-0"></i> Ongoing</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">
                            <i class="icofont-check-alt mr-2 text-success mb-0"></i> Completed</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                            <i class="icofont-close-line mr-2 text-danger mb-0"></i> Canceled</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content col-md-9" id="myTabContent">
                @if(session()->has('client_id'))
                    <div class="tab-pane fade show active" id="allOrder" role="tabpanel" aria-labelledby="allOrder-tab">
                            <div class="order-body">
                                @foreach($myOrder as $order)
                                    <div class="pb-3">
                                        <a href="#" data-toggle="modal" data-target="#orderListModal{{ $order->order_id }}" class="text-decoration-none text-dark">
                                            <div class="p-3 rounded shadow-sm bg-white">
                                                <div class="d-flex align-items-center mb-3">
                                                    @if($order->order_status=="Pending")
                                                        <p class="bg-primary text-white py-1 px-2 mb-0 rounded small">{{ $order->order_status }}</p>
                                                    @elseif($order->order_status=="Cancelled")
                                                        <p class="bg-danger text-white py-1 px-2 mb-0 rounded small">{{ $order->order_status }}</p>
                                                    @elseif($order->order_status=="Ongoing")
                                                        <p class="bg-info text-white py-1 px-2 mb-0 rounded small">{{ $order->order_status }}</p>
                                                    @elseif($order->order_status=="Delivered")
                                                        <p class="text-white py-1 px-2 mb-0 rounded small" style="background-color: #1ca754;">{{ $order->order_status }}</p>
                                                    @else
                                                        <p class="bg-success text-white py-1 px-2 mb-0 rounded small">{{ $order->order_status }}</p>
                                                    @endif
                                                    <p class="text-muted ml-auto small mb-0"><i class="icofont-clock-time"></i> {{ date("d M, Y",strtotime($order->created_at))}}</p>
                                                </div>
                                                <div class="d-flex" style="font-size: 1.3vh;">
                                                    <p class="text-muted m-auto">Order ID<br>
                                                        <span class="text-dark">{{ $order->order_id }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Delivery Address<br>
                                                        <span class="text-dark">{{ $order->delivery_address }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Total Payment<br>
                                                        <span class="text-dark">{{ $order->total_amount }} BDT</span>
                                                    </p>
                                                    <p class="text-muted m-auto">
                                                        <button type='button' class='btn btn-success btn-sm' data-toggle="modal" data-target="#orderListModal{{ $order->order_id }}" style="font-size: 1.3vh;"><i class="fa fa-info-circle" aria-hidden="true" ></i> Details</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                            <div class="order-body">
                                @foreach($pendingOrder as $penOrder)
                                    <div class="pb-3">
                                        <a href="#" data-toggle="modal" data-target="#orderListModal{{ $penOrder->order_id }}" class="text-decoration-none text-dark">
                                            <div class="p-3 rounded shadow-sm bg-white">
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="bg-primary text-white py-1 px-2 mb-0 rounded small">Pending</p>
                                                    <p class="text-muted ml-auto small mb-0"><i class="icofont-clock-time"></i> {{ date("d M, Y",strtotime($penOrder->created_at))}}</p>
                                                </div>
                                                <div class="d-flex" style="font-size: 1.3vh;">
                                                    <p class="text-muted m-auto">Order ID<br>
                                                        <span class="text-dark">{{ $penOrder->order_id }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Delivery Address<br>
                                                        <span class="text-dark">{{ $penOrder->delivery_address }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Total Payment<br>
                                                        <span class="text-dark">{{ $penOrder->total_amount }} BDT</span>
                                                    </p>
                                                    <p class="text-muted m-auto">
                                                        <button type='button' class='btn btn-success btn-sm' data-toggle="modal" data-target="#orderListModal{{ $penOrder->order_id }}" style="font-size: 1.3vh;"><i class="fa fa-info-circle" aria-hidden="true" ></i> Details</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                            <div class="order-body">
                                @foreach($completeOrder as $comOrder)
                                    <div class="pb-3">
                                        <a href="#" data-toggle="modal" data-target="#orderListModal{{ $comOrder->order_id }}" class="text-decoration-none text-dark">
                                            <div class="p-3 rounded shadow-sm bg-white">
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="text-white py-1 px-2 mb-0 rounded small" style="background-color: #1ca754;">Delivered</p>
                                                    <p class="text-muted ml-auto small mb-0"><i class="icofont-clock-time"></i> {{ date("d M, Y",strtotime($comOrder->created_at))}}</p>
                                                </div>
                                                <div class="d-flex" style="font-size: 1.3vh;">
                                                    <p class="text-muted m-auto">Order ID<br>
                                                        <span class="text-dark">{{ $comOrder->order_id }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Delivery Address<br>
                                                        <span class="text-dark">{{ $comOrder->delivery_address }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Total Payment<br>
                                                        <span class="text-dark">{{ $comOrder->total_amount }} BDT</span>
                                                    </p>
                                                    <p class="text-muted m-auto">
                                                        <button type='button' class='btn btn-success btn-sm' data-toggle="modal" data-target="#orderListModal{{ $comOrder->order_id }}" style="font-size: 1.3vh;"><i class="fa fa-info-circle" aria-hidden="true" ></i> Details</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                            <div class="order-body">
                                @foreach($ongoingOrder as $ongoOrder)
                                    <div class="pb-3">
                                        <a href="#" data-toggle="modal" data-target="#orderListModal{{ $ongoOrder->order_id }}" class="text-decoration-none text-dark">
                                            <div class="p-3 rounded shadow-sm bg-white">
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="bg-info text-white py-1 px-2 rounded small m-0">Ongoing</p>
                                                    <p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> {{ date("d M, Y",strtotime($ongoOrder->created_at))}}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="text-muted m-0">Order ID<br>
                                                        <span class="text-dark">{{ $ongoOrder->order_id }}</span>
                                                    </p>
                                                    <p class="text-muted m-0 ml-auto">Delivery Address<br>
                                                        <span class="text-dark">{{ $ongoOrder->delivery_address }}</span>
                                                    </p>
                                                    <p class="text-muted m-0 ml-auto">Total Payment<br>
                                                        <span class="text-dark">{{ $ongoOrder->total_amount }} BDT</span>
                                                    </p>
                                                    <p class="text-muted m-0 ml-auto">
                                                        <button type='button' class='btn btn-success btn-sm' data-toggle="modal" data-target="#orderListModal{{ $ongoOrder->order_id }}" style="height: 40px;width: 100px;font-size: 12px;"><i class="fa fa-info-circle" aria-hidden="true" ></i> View Details</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                            <div class="order-body">
                                @foreach($cancelOrder as $canOrder)
                                    <div class="pb-3">
                                        <a href="#" data-toggle="modal" data-target="#orderListModal{{ $canOrder->order_id }}" class="text-decoration-none text-dark">
                                            <div class="p-3 rounded shadow-sm bg-white">
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="bg-danger text-white py-1 px-2 rounded small m-0">Failed Payment</p>
                                                    <p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> {{ date("d M, Y",strtotime($canOrder->created_at))}}</p>
                                                </div>
                                                <div class="d-flex" style="font-size:1.3vh;">
                                                    <p class="text-muted m-auto">Order ID<br>
                                                        <span class="text-dark">{{ $canOrder->order_id }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Delivery Address<br>
                                                        <span class="text-dark">{{ $canOrder->delivery_address }}</span>
                                                    </p>
                                                    <p class="text-muted m-auto">Total Payment<br>
                                                        <span class="text-dark">{{ $canOrder->total_amount }} BDT</span>
                                                    </p>
                                                    <p class="text-muted m-auto">
                                                        <button type='button' class='btn btn-success btn-sm' data-toggle="modal" data-target="#orderListModal{{ $canOrder->order_id }}" style="font-size: 1.3vh;"><i class="fa fa-info-circle" aria-hidden="true" ></i> Details</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="">
                        <div class="pb-3">
                            <div class="p-3 rounded shadow-sm bg-white">
                                <div class="d-flex align-items-center font-weight-bold">
                                    <p>Please Login First!!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@foreach($myOrder as $order_modal)
    <?php
        $order_cart_data=json_decode($order_modal->order_data);
    ?>
    <div class="modal fade" id="orderListModal{{$order_modal->order_id}}" tabindex="-1" role="dialog" aria-labelledby="orderListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Order Details</h5>
                </div>
                <div class="modal-body">
                    <div class="schedule">
                        <div class="tab-content bg-white" id="myTabContent">
                            <div class="tab-pane fade show active" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                <div class="osahan-card-body pt-3">
                                    <table class="table" style="width: 100%; text-align: center;">
                                        <thead>
                                            <tr>
                                                <th style="width:5%;">SN</th>
                                                <th style="width:35%;">Product Name</th>
                                                <th style="width:20%;">Quantity</th>
                                                <th style="width:20%;">Price</th>
                                                <th style="width:20%;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
                                        $modal_total=0;
                                        ?>
                                        @foreach($order_cart_data as $cart_modal)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$cart_modal->product_name}}</td>
                                                <td>{{$cart_modal->quantity}}</td>
                                                <td>{{$cart_modal->unit_price}} BDT</td>
                                                <td>{{$cart_modal->total_price}} BDT</td>
                                            </tr>
                                            <?php
                                            $i+=1;
                                            $modal_total+=$cart_modal->total_price;
                                            ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-0 border-0" style="text-align: center;">
                    <div class="col-6 m-0 p-0">
                        <p class="border-top btn-lg btn-block"><b>Total</b></p>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <p  class="border-top btn-lg btn-block">{{$modal_total}} BDT</p>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <p class="border-top btn-lg btn-block"><b>Discount</b></p>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <p style="color:#d20707;" class="border-top btn-lg btn-block">{{$order_modal->discount}} BDT</p>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <p class="border-top btn-lg btn-block"><b>Grand Total</b></p>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <p  class="border-top btn-lg btn-block">{{$order_modal->total_amount}} BDT</p>
                    </div>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-12 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

