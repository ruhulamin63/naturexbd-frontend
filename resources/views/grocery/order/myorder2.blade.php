@extends('grocery.layouts.main')
@section('content')

<!-- bread_cum -->
   <nav aria-label="breadcrumb" class="breadcrumb mb-0">
      <div class="container">
         <ol class="d-flex align-items-center mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/home')}}" class="text-success">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Order</li>
         </ol>
      </div>
   </nav>
      <!-- body -->
   <section class="py-4 osahan-main-body">
        <div class="container">
            <h5 class="mt-3 mb-3">My Order</h5>
            
            <div class="restaurant-list-table">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">SN</th>
                                            <!-- <th>Image</th> -->
                                            <th>Order Id</th>
                                            <th>Delivery Address</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($myOrder as $key => $order)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <!-- <td>
                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                    <img src="https://i.gifer.com/VuKc.gif" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                </div>
                                            </td> -->
                                            <td style='text-align: left; vertical-align: middle'>{{ $order->order_id }}</td>
                                            <td style='text-align: left; vertical-align: middle'>{{ $order->delivery_address }}</td>
                                            <td style='text-align: left; vertical-align: middle'>{{ $order->total_amount }} Taka</td>
                                            @if($order->order_status=="Pending")
                                                <td class="text-primary" style='text-align: left; vertical-align: middle'>{{ $order->order_status }}</td>
                                            @elseif($order->order_status=="Cancelled")
                                                <td class="text-danger" style='text-align: left; vertical-align: middle'>{{ $order->order_status }}</td>
                                            @elseif($order->order_status=="Ongoing")
                                                <td class="text-info" style='text-align: left; vertical-align: middle'>{{ $order->order_status }}</td>
                                            @elseif($order->order_status=="Delivered")
                                                <td style='text-align: left; vertical-align: middle; color: #1ca754'>{{ $order->order_status }}</td>
                                            @else
                                                <td class="text-dark" style='text-align: left; vertical-align: middle'>{{ $order->order_status }}</td>
                                            @endif
                                            <td>
                                                <button type="submit" data-toggle="modal" data-target="#paymentModal" class="btn btn-info glow">View</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Order List</h5>
                </div>
                <div class="modal-body">
                    <div class="schedule">
                        <div class="tab-content bg-white" id="myTabContent">
                            <div class="tab-pane fade show active" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                <div class="osahan-card-body pt-3">
                                    <table class="table" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width:5%;">SN</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Corn Flour</td>
                                                <td>1</td>
                                                <td>70</td>
                                                <td>70</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Corn Flour</td>
                                                <td>1</td>
                                                <td>70 Taka</td>
                                                <td>70 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dairy Milk Silk Oreo Medium</td>
                                                <td>1</td>
                                                <td>150 Taka</td>
                                                <td>150 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Baby Belt Diaper New Born</td>
                                                <td>1</td>
                                                <td>750 Taka</td>
                                                <td>750 Taka</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-0 border-0" style="text-align: center;">
                    <div class="col-6 m-0 p-0">
                        <p class="border-top btn-lg btn-block">Total</p>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <p  class="border-top btn-lg btn-block">970 Taka</p>
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
@endsection
            