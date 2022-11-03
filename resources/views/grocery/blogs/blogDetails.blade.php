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

{{--                            @foreach($blogDetails as $blog)--}}
                                <div class="header">
                                    <h2>{{ $blogDetails->title }}</h2>
                                </div>

                                <div class="row">
                                    <div class="leftcolumn">
                                        <div class="card">
                                            <h2>{{ $blogDetails->title }}</h2>
                                            <h5>Created on {{ date('jS M Y', strtotime($blogDetails->updated_at)) }}</h5>
                                            <div class="fakeimg" style="height:200px;">
                                                <img src="{{asset('http://127.0.0.1:8000/storage/'.$blogDetails->image_path)}}" alt="" class="img-fluid mb20" style="height: 150px; width: 300px">
                                            </div>

                                            <br>

                                            <p>Description</p>
                                            <p>{!! $blogDetails->description !!}</p>

                                            <br>

                                            <div class="embed-responsive embed-responsive-21by9 mb20">
                                                <iframe src="{{asset('http://127.0.0.1:8000/storage/'.$blogDetails->video_path)}}" style="position:absolute;width:100%;height:100%;left:0" width="640" height="360" frameborder="0" allowfullscreen=""></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rightcolumn">
                                        <div class="card">
                                            <h2>About Me</h2>
                                            <div class="fakeimg" style="height:100px;">Image</div>
                                            <p>Some text about me in ...</p>
                                        </div>
                                        <div class="card">
                                            <h3>Popular Post</h3>
                                            <div class="fakeimg">Image</div><br>
                                            <div class="fakeimg">Image</div><br>
                                            <div class="fakeimg">Image</div>
                                        </div>
                                        <div class="card">
                                            <h3>Follow Me</h3>
                                            <p>Nature-x-bd</p>
                                        </div>
                                    </div>
                                </div>
{{--                            @endforeach--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    * {
        box-sizing: border-box;
    }

    /* Add a gray background color with some padding */
    body {
        font-family: Arial;
        padding: 20px;
        background: #f1f1f1;
    }

    /* Header/Blog Title */
    .header {
        padding: 30px;
        font-size: 40px;
        text-align: center;
        background: white;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
        float: left;
        width: 75%;
    }

    /* Right column */
    .rightcolumn {
        float: left;
        width: 25%;
        padding-left: 20px;
    }

    /* Fake image */
    .fakeimg {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
    }

    /* Add a card effect for articles */
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Footer */
    .footer {
        padding: 20px;
        text-align: center;
        background: #ddd;
        margin-top: 20px;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {
        .leftcolumn, .rightcolumn {
            width: 100%;
            padding: 0;
        }
    }
</style>
