@extends('grocery.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="{{URL::to('/')}}" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Promo details</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
           
            <div class="row">
               <div class="col-lg-8">
                  <div class="recommend-slider mb-3">
                     @if($promo_info->image)
                        <?php if (file_exists("../../naturexbd-manage/public".$promo_info->image)){ ?>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('https://manage.naturexbd.com'.$promo_info->image)}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                        <?php } else{ ?>
                           <div class="osahan-slider-item" style="background-color:#fff;">
                              <img src="{{asset('/B0eS.gif')}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                           </div>
                        <?php } ?>
                     @else
                        <div class="osahan-slider-item" style="background-color:#fff;">
                           <img src="{{asset('/B0eS.gif')}}" style="height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                        </div>
                     @endif
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="p-4 bg-white rounded shadow-sm" style="height:400px;">
                     <div class="pt-0">
                        <h2 class="font-weight-bold">{{ $promo_info->promo_code}}</h2>
                     </div>
                     
                     <div class="pt-2">
                        <div class="row">
                           <div class="col-6">
                              <p class="font-weight-bold m-0">START</p>
                              <p class="text-muted m-0">{{ date("d M, Y",strtotime($promo_info->start))}}</p>
                           </div>
                           <div class="col-6 text-left">
                              <p class="font-weight-bold m-0">END</p>
                              <p class="text-muted m-0">{{ date("d M, Y",strtotime($promo_info->end))}}</p>
                           </div>
                        </div>
                     </div>

                     <div class="pt-2">
                        <div class="row">
                           <div class="col-12">
                              <p class="font-weight-bold m-0">Conditions</p>
                              <p class="text-muted m-0">{{ $promo_info->conditions}}</p>
                           </div>
                        </div>
                     </div>
                    
                     <div class="details">
                        <div class="pt-3">
                           <!--
                           <div class="input-group mb-3 border rounded shadow-sm overflow-hidden bg-white">
                              <div class="input-group-prepend">
                                 <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                              </div>
                              <input type="text" class="shadow-none border-0 form-control form-control-lg pl-0" placeholder="Type your city (e.g Chennai, Pune)" aria-label="" aria-describedby="basic-addon1">
                           </div>
                           -->
                           
                        </div>
                        <div class="pt-3 bg-white">
                           <div class="d-flex align-items-center">
                              <!--
                              <div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons">
                                 <label class="btn btn-secondary active">
                                 <input type="radio" name="options" id="option1" checked> 4 pcs
                                 </label>
                                 <label class="btn btn-secondary">
                                 <input type="radio" name="options" id="option2"> 6 pcs
                                 </label>
                                 <label class="btn btn-secondary">
                                 <input type="radio" name="options" id="option3"> 1 kg
                                 </label>
                              </div>
                              -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @include('grocery/layouts/grocery_may_like')
         </div>
      </section>
      
@endsection