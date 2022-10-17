@extends('grocery.layouts.main')
@section('content')

    <!-- bread_cum -->
    <nav aria-label="breadcrumb" class="breadcrumb mb-0">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}" class="text-success">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </div>
    </nav>
    <!-- body -->
    <section class="py-4 osahan-main-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="osahan-listing">
    {{--                    @include('Grocery.layouts.grocery_categories')--}}
                        <div class="d-flex align-items-center mb-3">
                            <h4>All Blogs</h4>
                        </div>
                        <div id="test" class="pick_today">
                            <div class="row">
                                <?php $i=0;?>
                                    @foreach( $blogsData as $blog)
                                        <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-3">
                                            <div
                                                class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                                <div class="list-card-image" style="height:100%;">
                                                    <a href="{{ URL::to('/blog/show/'.base64_encode($blog->id)) }}" class="text-dark">
                                                        <div class="member-plan position-absolute">
                                                            <!--<span class="badge m-3 badge-danger">10%</span>-->
                                                        </div>
                                                        <div class="p-3" style="height:100%;">
                                                            <div style="height:80%;">
                                                                @if($blog->image_path)
                                                                        <?php if (file_exists("storage/".$blog->image_path)){ ?>
                                                                    <img style="object-fit: contain;" src="{{asset('storage/'.$blog->image_path)}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                                                    <?php } else{ ?>
                                                                    <img style="object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                                                    <?php } ?>
                                                                @else
                                                                    <img style="object-fit: contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid product_custom_image item-img w-100 mb-3" alt="">
                                                                @endif
                                                                <h5><b>{{$blog->title}}</b></h5>
                                                            </div>
                                                            <h6>&nbsp</h6>

                                                            <div class="d-flex align-items-center">
                                                                <h6>{!! $blog->description !!}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                <?php $i+=1;?>
                                <div class="col-md-12 col-12 overflow-auto">
                                    {{--                                    {!! $products->links() !!}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

