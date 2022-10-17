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
                            this
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

