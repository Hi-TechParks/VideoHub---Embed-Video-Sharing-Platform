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
        <div class="col-12 col-lg-8 offset-lg-2">
            <a href="{{ URL::route($url.'.index') }}" class="btn btn-primary">Go Back</a>
            <a href="{{ URL::route($url.'.create') }}" class="btn btn-info">Refresh</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">

            <div class="card">
                <div class="card-header">
                    <!-- Include Flash Messages -->
                    @include('admin.inc.message')
                </div>

                <div class="card-body">
                  <h4 class="header-title">{{ $title }} Create</h4>

                  <form class="needs-validation" novalidate action="{{ URL::route($url.'.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">Video Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Video Title" required>

                        <div class="invalid-feedback">
                          Please Provide Video Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">Select Category</option>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Please Select Video Category.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Video Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8" required></textarea>

                        <div class="invalid-feedback">
                          Please Provide Video Details.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Video Thumbnail</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Video Thumbnail" required>

                        <div class="invalid-feedback">
                          Please Provide Video Thumbnail.
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 col-lg-2">
                            <label>Video Type:</label>
                        </div>
                        <div class="custom-control custom-radio col-md-3 col-lg-2">
                            <input type="radio" id="embed" name="video_type" class="custom-control-input embed" value="1" checked>
                            <label class="custom-control-label" for="embed">Embed</label>
                        </div>
                        <div class="custom-control custom-radio col-md-3 col-lg-2">
                            <input type="radio" id="youtube" name="video_type" class="custom-control-input youtube" value="2">
                            <label class="custom-control-label" for="youtube">Youtube</label>
                        </div>
                        <div class="custom-control custom-radio col-md-3 col-lg-2">
                            <input type="radio" id="vimeo" name="video_type" class="custom-control-input vimeo" value="3">
                            <label class="custom-control-label" for="vimeo">Vimeo</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_id">Youtube/Vimeo ID or Embed Code</label>
                        <textarea class="form-control" name="video_id" id="video_id" required></textarea>

                        <div class="invalid-feedback">
                          Please Provide Youtube/Vimeo ID or Embed Code.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="duration">Video Duration</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="00:00" required>

                        <div class="invalid-feedback">
                          Please Provide Video Duration.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quality">Quality HD:</label>
                        <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="quality" id="quality" value="1" checked>
                    </div>

                    <div class="form-group">
                        <label for="featured">Featured:</label>
                        <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="featured" id="featured" value="1" checked>
                    </div>

                    <div class="form-group">
                        <label for="video_id">Video Tags</label>
                        <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="tags[]" style="width: 100%" required>
                            @foreach( $tags as $tag )
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Please Provide Video Tags.
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <!-- Form End -->
                  </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection