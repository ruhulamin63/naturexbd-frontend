@extends('grocery.layouts.main')
@section('content')
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
         <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
               <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">My account</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 ">
                  <div class="osahan-account bg-white rounded shadow-sm overflow-hidden">
                     <div class="p-4 profile text-center border-bottom">
                        <form method="POST" action="{{URL::to('/change_profile_pic')}}" enctype="multipart/form-data">
                           @csrf
                           @if(session()->has('client_img')!='0' || session()->has('client_img')!='no image' )
                              <?php if (file_exists("../public/user_images/".session('client_img'))){ ?>
                                 <img src="{{asset('user_images/'.session('client_img'))}}" class="img-fluid rounded-pill">
                              <?php } else{ ?>
                                 <img src="{{asset('user_images/tenor.gif')}}" class="img-fluid rounded-pill">
                              <?php } ?>
                           @else
                              <img src="{{asset('user_images/tenor.gif')}}" class="img-fluid rounded-pill">
                           @endif
                           <div>
                              <label for="file">
                                 <i class="fa fa1 fa-pencil-square-o " aria-hidden="true"></i>
                              </label>
                           </div>
                           <input type="file" id="file" onchange="this.form.submit()" name="client_image" style="display: none" />
                        </form>
                        <h6 class="font-weight-bold m-0 mt-2">{{$user_info->name}}</h6>
                        <p class="small text-muted m-0">{{$user_info->email}}</p>
                     </div>
                     <div class="account-sections">
                        <ul class="list-group">
                           <a href="{{ URL::to('/profile') }}" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex align-items-center p-3">
                                 <i class="icofont-user osahan-icofont bg-danger"></i>My Account
                                 <!--<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>-->
                              </li>
                           </a>
                           <!--
                           <a href="promos.html" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex align-items-center p-3">
                                 <i class="icofont-sale-discount osahan-icofont bg-success"></i>Promos
                                 <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
                              </li>
                           </a>
                           <a href="my_address.html" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex align-items-center p-3">
                                 <i class="icofont-address-book osahan-icofont bg-dark"></i>My Address
                                 <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
                              </li>
                           </a>
                           <a href="terms_conditions.html" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex align-items-center p-3">
                                 <i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy & Policy
                                 <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
                              </li>
                           </a>
                           <a href="help_support.html" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex align-items-center p-3">
                                 <i class="icofont-phone osahan-icofont bg-warning"></i>Help & Support
                                 <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
                              </li>
                           </a>
                           <a href="help_ticket.html" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex align-items-center p-3">
                                 <i class="icofont-phone osahan-icofont bg-success"></i>Ticket
                                 <span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
                              </li>
                           </a>
                           -->
                           <a href="{{ URL::to('/logout') }}" class="text-decoration-none text-dark">
                              <li class="border-bottom bg-white d-flex  align-items-center p-3">
                                 <i class="icofont-logout osahan-icofont bg-danger"></i> Logout
                              </li>
                           </a>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 p-4 bg-white rounded shadow-sm">
                  <h4 class="mb-4 profile-title">My account</h4>
                  <div id="edit_profile">
                     <div class="p-0">
                        <form action="{{ URL::to('/update_profile') }}" method="post">
                           @csrf
                           <div class="form-group">
                              <label for="exampleInputName1">Full Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{$user_info->name}}">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputNumber1">Mobile Number</label>
                              <input type="text" name="mobile" class="form-control" id="exampleInputNumber1" value="{{$user_info->mobile}}">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user_info->email}}">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputAddress1">Address</label>
                              <textarea name="address" class="form-control" id="exampleInputAddress1" cols="30" rows="3">{{$user_info->address_primary}}</textarea>
                           </div>
                           <div class="text-center">
                              <button type="submit" class="btn btn-success btn-block btn-lg">Save Changes</button>
                           </div>
                        </form>
                     </div>
                     <!--
                     <div class="additional mt-3">
                        <div class="change_password mb-1">
                           <a href="change_password.html" class="p-3 btn-light border btn d-flex align-items-center">Change Password
                           <i class="icofont-rounded-right ml-auto"></i></a>
                        </div>
                        <div class="deactivate_account">
                           <a href="deactivate_account.html" class="p-3 btn-light border btn d-flex align-items-center">Deactivate Account
                           <i class="icofont-rounded-right ml-auto"></i></a>
                        </div>
                     </div>
                     -->
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
