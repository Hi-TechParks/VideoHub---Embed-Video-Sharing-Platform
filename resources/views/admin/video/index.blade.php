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
        <div class="col-12">
            <a href="{{ URL::route($url.'.create') }}" class="btn btn-primary">Add New</a>
            <a href="{{ URL::route($url.'.index') }}" class="btn btn-info">Refresh</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <!-- Include Flash Messages -->
                    @include('admin.inc.message')
                </div>

                <div class="card-body">
                  <h4 class="header-title">{{ $title }} List</h4>

                    <!-- ===  Text Shorten Code  ====  -->
                   <?php
                     // code for shortening the big content fetched from database
                      function textShorten($text, $limit = 40){
                         $text = $text." ";
                         $text = substr($text, 0, $limit);
                         $text = substr($text, 0, strrpos($text, " "));
                         $text = $text;
                         return $text;
                     }
                   ?> 
                   <!-- ===  Text Shorten Code  ====  -->

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Featured</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ textShorten($row->title) }}
                                    @if(strlen($row->title) > 40)...@endif
                                </td>
                                <td>{{ $row->category->title }}</td>
                                <td>
                                    @if( $row->featured == 1 )
                                    <span class="badge badge-success">Yes</span>
                                    @else
                                    <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td>{{ $row->views }}</td>
                                <td>
                                    @if( $row->status == 1 )
                                    <span class="badge badge-success badge-pill">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- View Route -->
                                    <a href="{{ URL::route($url.'.show', $row->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                    <!-- Edit Route -->
                                    <a href="{{ URL::route($url.'.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <!-- Include Delete modal -->
                                    @include('admin.inc.delete')
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- Data Table End -->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection