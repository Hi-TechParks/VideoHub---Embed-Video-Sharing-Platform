@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')  
    <!-- end page title --> 

    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-primary widget-icon"><i class="fas fa-play-circle"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Videos</h5>
                        <h3 class="mt-2">{{ $videos->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-eye"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Views</h5>
                        <h3 class="mt-2">{{ $views }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-primary widget-icon"><i class="fas fa-heart"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Likes</h5>
                        <h3 class="mt-2">{{ $likes }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-comments"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Comments</h5>
                        <h3 class="mt-2">{{ $comments->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- container -->
<!-- End Content-->

@endsection