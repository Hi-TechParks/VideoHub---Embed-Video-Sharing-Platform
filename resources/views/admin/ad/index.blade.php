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
                  <h4 class="header-title">All {{ $title }}s</h4>
                  <br/>

                  <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#ads-tab" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            Ads Setup
                        </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    
                    <div class="tab-pane show active" id="ads-tab">
                        
                      <!-- Form Start -->
                      <form class="needs-validation" novalidate action="{{ URL::route($url.'.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach( $rows as $row )
                        @endforeach

                        <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="header">Header Banner <span>Script (728px x 90px)</span></label>
                            <textarea class="form-control" name="header" id="header" rows="8">{{ isset($row->header)?$row->header:'' }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Ad Script.
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="footer">Footer Banner <span>Script (728px x 90px)</span></label>
                            <textarea class="form-control" name="footer" id="footer" rows="8">{{ isset($row->footer)?$row->footer:'' }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Ad Script.
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="sidebar1">Sidebar-1 <span>Script (300px x 600px)</span></label>
                            <textarea class="form-control" name="sidebar1" id="sidebar1" rows="8">{{ isset($row->sidebar1)?$row->sidebar1:'' }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Ad Script.
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="sidebar2">Sidebar-2 <span>Script (300px x 600px)</span></label>
                            <textarea class="form-control" name="sidebar2" id="sidebar2" rows="8">{{ isset($row->sidebar2)?$row->sidebar2:'' }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Ad Script.
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="onclick">OnClick Ad <span>Script</span></label>
                            <textarea class="form-control" name="onclick" id="onclick" rows="8">{{ isset($row->onclick)?$row->onclick:'' }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Ad Script.
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="popup">Popup Ad <span>Script</span></label>
                            <textarea class="form-control" name="popup" id="popup" rows="8">{{ isset($row->popup)?$row->popup:'' }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Ad Script.
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                      </form>
                      <!-- Form End -->

                    </div>

                  </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection