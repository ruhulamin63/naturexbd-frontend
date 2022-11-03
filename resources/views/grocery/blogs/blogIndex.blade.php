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

                            @foreach($blogsData as $blog)
                                <div class="container mb80">
                                <div class="page-timeline">
                                    <div class="vtimeline-point">
                                        <div class="vtimeline-icon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <div class="vtimeline-block">
                                            <span class="vtimeline-date">{{ date('jS M Y', strtotime($blog->updated_at)) }}</span><div class="vtimeline-content">
                                                <a href="#"><img src="{{asset('http://127.0.0.1:8000/storage'.$blog->image_path)}}" alt="" class="img-fluid mb20"></a>
                                                <a href="#"><h3>{{ $blog->title }}</h3></a>
                                                <ul class="post-meta list-inline">
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-user-circle-o"></i> <a href="#">Naturex</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-calendar-o"></i> <a href="#">Created on {{ date('jS M Y', strtotime($blog->updated_at)) }}</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-tags"></i> <a href="#">link</a>
                                                    </li>
                                                </ul>
                                                <p>
                                                    {!! $blog->description !!}
                                                </p><br>
                                                <a href="{{ URL::to('/blog/show/'.base64_encode($blog->id)) }}" class="btn btn-outline-secondary btn-sm">Read More</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="vtimeline-point">
                                        <div class="vtimeline-icon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <div class="vtimeline-block">
                                            <span class="vtimeline-date">{{ date('jS M Y', strtotime($blog->updated_at)) }}</span><div class="vtimeline-content">
                                                <div class="embed-responsive embed-responsive-21by9 mb20">
                                                    <iframe src="{{asset('http://127.0.0.1:8000/storage/'.$blog->video_path)}}" style="position:absolute;width:100%;height:100%;left:0" width="640" height="360" frameborder="0" allowfullscreen=""></iframe>
                                                </div>
                                                <a href="#"><h3>{{ $blog->title }}</h3></a>
                                                <ul class="post-meta list-inline">
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-user-circle-o"></i> <a href="#">Naturex</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-calendar-o"></i> <a href="#">Created on {{ date('jS M Y', strtotime($blog->updated_at)) }}</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-tags"></i> <a href="#">link</a>
                                                    </li>
                                                </ul>
                                                <p>
                                                    {!! $blog->description !!}
                                                </p>
                                                <br>
                                                <a href="{{ URL::to('/blog/show/'.base64_encode($blog->id)) }}" class="btn btn-outline-secondary btn-sm">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    body{
        margin-top:20px;
        background:#f3f3f3;
    }
    /*
    Timeline
    */

    .page-timeline {
        margin: 30px auto 0 auto;
        position: relative;
        max-width: 1000px;
    }

    .page-timeline:before {
        position: absolute;
        content: '';
        top: 0;
        bottom: 0;
        left: 303px;
        right: auto;
        height: 100%;
        width: 3px;
        background: #3498db;
        z-index: 0;

        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    }

    .page-timeline:after {
        position: absolute;
        content: '';
        width: 3px;
        height: 40px;
        background: #3498db;
        background: -webkit-linear-gradient(top, #4782d3, rgba(52, 152, 219, 0));
        background: linear-gradient(to bottom, #4782d3, rgba(52, 152, 219, 0));
        top: 100%;
        left: 303px;

        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    }

    .vtimeline-content {
        margin-left: 350px;
        background: #fff;
        border: 1px solid #e6e6e6;
        padding: 35px 20px;
        border-radius: 3px;
        text-align: left;

        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    }

    .vtimeline-content h3 {
        font-size: 1.5em;
        font-weight: 600;
        display: inline-block;
        margin: 0;
    }

    .vtimeline-content p {
        font-size: 0.9em;
        margin: 0;
    }

    .vtimeline-point {
        position: relative;
        display: block;
        vertical-align: top;
        margin-bottom: 30px;
    }

    .vtimeline-icon {
        position: relative;
        color: #fff;
        width: 50px;
        height: 50px;
        background: #4782d3;
        border-radius: 50%;
        float: left;
        text-align: center;
        line-height: 50px;
        z-index: 99;
        margin-left: 280px;
    }

    .vtimeline-icon i {
        display: block;
        font-size: 1.5em;
        line-height: 50px;

    }

    .vtimeline-date {
        width: 260px;
        text-align: right;
        position: absolute;
        left: 0;
        top: 10px;
        font-weight: 400;
        color: #374054;
    }
    .post-meta {
        padding-top: 15px;
        margin-bottom: 20px;
    }
    .post-meta li:not(:last-child) {
        margin-right: 10px;
    }
    h3 {
        font-family: "Montserrat", sans-serif;
        color: #252525;
        font-weight: 700;
        font-variant-ligatures: common-ligatures;
        margin-top: 0;
        letter-spacing: -0.2px;
        line-height: 1.3;
    }
    .mb20 {
        margin-bottom: 20px !important;
    }
</style>
