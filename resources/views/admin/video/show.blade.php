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
            <a href="{{ URL::route($url.'.show', [$row->id]) }}" class="btn btn-info">Refresh</a>
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

                    <!-- Details View Start -->
                    <h4><span class="text-highlight">Video Title:</span> {{ $row->title }}</h4><br/>

                    

                    @if($row->video_type == 1)

                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $row->video_id !!}
                        </div>

                    @elseif($row->video_type == 2)
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $row->video_id }}?rel=0" allowfullscreen></iframe>
                        </div>
                    @elseif($row->video_type == 3)
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/{{ $row->video_id }}?title=0&byline=0&portrait=0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    @endif
                    <br/>
                    
                    <p><span class="text-highlight">Video Thumbnail:</span></p>
                    @if(is_file('uploads/'.$url.'/thumb/'.$row->image_path))
                    <img src="{{ asset('uploads/'.$url.'/thumb/'.$row->image_path) }}" alt="Thumbnail" class="img-fluid d-block">
                    <br/>
                    @endif

                    <hr/>
                    <p><span class="text-highlight">Details:</span> {!! $row->description !!}</p>
                    <hr/>

                    <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover nowrap" style="width:100%">
                        <tbody>
                          <tr>
                            <td>Category</td>
                            <td>{{ $row->category->title }}</td>
                          </tr>
                          <tr>
                            <td>Video Type</td>
                            <td>
                                @if($row->video_type == 1)
                                    Embed
                                @elseif($row->video_type == 2)
                                    Youtube
                                @elseif($row->video_type == 3)
                                    Vimeo
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Featured</td>
                            <td>
                                @if( $row->featured == 1 )
                                <span class="badge badge-success">Yes</span>
                                @else
                                <span class="badge badge-danger">No</span>
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Quality</td>
                            <td>
                                @if( $row->quality == 1 )
                                <span class="badge badge-success">HD</span>
                                @else
                                <span class="badge badge-danger">Normal</span>
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Views</td>
                            <td>{{ $row->views }}</td>
                          </tr>
                          <tr>
                            <td>Likes</td>
                            <td>{{ $row->like }}</td>
                          </tr>
                          <tr>
                            <td>Dislike</td>
                            <td>{{ $row->dislike }}</td>
                          </tr>
                          <tr>
                            <td>Tags</td>
                            <td>
                                @foreach( $video_tags as $video_tag )
                                <span class="badge badge-dark">{{ $video_tag->tag->title }}</span>
                                @endforeach
                            </td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>
                                @if( $row->status == 1 )
                                <span class="badge badge-success badge-pill">Active</span>
                                @else
                                <span class="badge badge-danger badge-pill">Inactive</span>
                                @endif
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                    <!-- Details View End -->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection