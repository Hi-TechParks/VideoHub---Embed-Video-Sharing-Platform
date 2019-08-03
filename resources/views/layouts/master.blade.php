<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @foreach( $settings as $setting )
    <!-- App Title -->
    <title>@yield('title') | {{ $setting->title }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}">

      @if(isset($category))
        <meta name="description" content="{{ $category->meta_desc }}">
        <meta name="keywords" content="{{ $category->meta_keyword }}">
      @else
        <meta name="description" content="{{ $setting->description }}">
        <meta name="keywords" content="{{ $setting->keywords }}">
      @endif
      
    @endforeach

    @if(empty($setting))
    <!-- App Title -->
    <title>@yield('title')</title>
    @endif
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('frontend/css/screen.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('backend/css/vendor/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  </head>
  <body>
      <!-- HOME 1 -->
      <div id="home1" class="container-fluid standard-bg">
         <!-- HEADER -->
         <div class="row header-top">

            <div class="col-lg-3 col-md-6 col-sm-5 col-xs-8">
              @if(isset($setting))
               <a class="main-logo" href="{{ URL('/') }}"><img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" class="main-logo img-responsive" alt="Logo"></a>
              @endif
            </div>

            <div class="col-lg-6 hidden-md text-center center-block hidden-sm hidden-xs">
              @foreach( $ads as $ad )
                @if(!empty($ad->header))
                  {!! $ad->header !!}
                @else
                <img src="{{ asset('/frontend/img/banners/banner-sm.jpg') }}" class="img-responsive center-block" alt="Banner">
                @endif
              @endforeach
            </div>

         </div>
         <!-- MENU -->
         <div class="row home-mega-menu ">
            <div class="col-md-12">
               <nav class="navbar navbar-default">
                  <div class="navbar-header">
                     <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse js-navbar-collapse megabg dropshd ">

                     <ul class="nav navbar-nav">
                        <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                          <a href="{{ URL('/') }}" >Home</a>
                        </li>
                        <li class="dropdown mega-dropdown {{ Request::is('filter*') ? 'active' : '' }}">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter <span class="fa fa-chevron-down pull-right"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{ URL('/filter/latest-videos') }}">Latest Videos</a></li>
                              <li><a href="{{ URL('/filter/featured-videos') }}">Featured Videos</a></li>
                              <li><a href="{{ URL('/filter/most-viewed') }}">Most Viewed</a></li>
                              <li><a href="{{ URL('/filter/most-liked') }}">Most Liked</a></li>
                              <li><a href="{{ URL('/filter/most-commented') }}">Most Commented</a></li>
                              <li><a href="{{ URL('/filter/full-hd') }}">Full HD</a></li>
                           </ul>
                        </li>
                        <li class="dropdown mega-dropdown {{ Request::is('video/category*') ? 'active' : '' }}">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="fa fa-chevron-down pull-right"></span></a>
                           <ul class="dropdown-menu">
                            @foreach( $categories as $category )
                              <li><a href="{{ URL('/video/category/'.$category->id ) }}">{{ $category->title }}</a></li>
                            @endforeach
                           </ul>
                        </li>
                        <li class="{{ Request::path() == 'contact' ? 'active' : '' }}">
                          <a href="{{ URL('/contact') }}">Contact</a>
                        </li>
                     </ul>

                     <ul class="social">
                      @if(isset($socials))
                        @foreach( $socials as $social )
                          @if(isset($social->facebook))
                          <li class="social-facebook"><a href="{{ $social->facebook }}" class="fa fa-facebook social-icons" target="_blank"></a></li>
                          @endif
                          @if(isset($social->twitter))
                          <li class="social-twitter"><a href="{{ $social->twitter }}" class="fa fa-twitter social-icons" target="_blank"></a></li>
                          @endif
                          @if(isset($social->linkedin))
                          <li class="social-linkedin"><a href="{{ $social->linkedin }}" class="fa fa-linkedin social-icons" target="_blank"></a></li>
                          @endif
                          @if(isset($social->youtube))
                          <li class="social-youtube"><a href="{{ $social->youtube }}" class="fa fa-youtube social-icons" target="_blank"></a></li>
                          @endif
                        @endforeach
                      @endif
                     </ul>

                     <div class="search-block">
                        <form action="{{ URL::route('search') }}" method="get">
                           <input type="search" name="search" placeholder="Search">
                           <!-- <input type="submit" class="btn btn-primary btn-sm visible-xs" name="submit" value="Search"> -->
                        </form>
                     </div>

                  </div>
                  <!-- /.nav-collapse -->
               </nav>
            </div>
         </div>
         


      <!-- Content Start -->
      @yield('content')
      <!-- Content End -->


      <!-- BOTTOM BANNER -->
      <div id="bottom-banner" class="container text-center center-block">
         <!-- BOTTOM ADVERTISE BOX -->
              @foreach( $ads as $ad )
                @if(!empty($ad->footer))
                  {!! $ad->footer !!}
                @else
                <img src="{{ asset('/frontend/img/banners/banner-sm.jpg') }}" class="img-responsive center-block" alt="Banner">
                @endif
              @endforeach 
      </div>
      <!-- OTHER ADS -->
      <div class="text-center">
         <!-- ONCLICK ADVERTISE BOX -->
              @foreach( $ads as $ad )
                @if(!empty($ad->onclick))
                  {!! $ad->onclick !!}
                @endif
              @endforeach 

          <!-- POPUP ADVERTISE BOX -->
              @foreach( $ads as $ad )
                @if(!empty($ad->popup))
                  {!! $ad->popup !!}
                @endif
              @endforeach 
      </div>


      <!-- FOOTER -->
      <div id="footer" class="container-fluid footer-background">
         <div class="container">
            <footer>
               <!-- SECTION FOOTER -->
               <div class="row">
                  <!-- SOCIAL -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <div class="row auto-clear">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12">
                           <ul class="social">
                            @if(isset($socials))
                              @foreach( $socials as $social )
                                @if(isset($social->facebook))
                                <li class="social-facebook"><a href="{{ $social->facebook }}" class="fa fa-facebook social-icons" target="_blank"></a></li>
                                @endif
                                @if(isset($social->twitter))
                                <li class="social-twitter"><a href="{{ $social->twitter }}" class="fa fa-twitter social-icons" target="_blank"></a></li>
                                @endif
                                @if(isset($social->linkedin))
                                <li class="social-linkedin"><a href="{{ $social->linkedin }}" class="fa fa-linkedin social-icons" target="_blank"></a></li>
                                @endif
                                @if(isset($social->youtube))
                                <li class="social-youtube"><a href="{{ $social->youtube }}" class="fa fa-youtube social-icons" target="_blank"></a></li>
                                @endif
                              @endforeach
                            @endif
                           </ul>
                        </div>
                        <div class="col-md-12">
                           @foreach( $settings as $setting )
                           <div class="contact-info">
                              <ul>
                                 <li class="fa fa-chevron-right">Address: {{ $setting->contact_address }}</li>
                                 <li class="fa fa-chevron-right">Phone: {{ $setting->phone_one }}</li>
                                 <li class="fa fa-chevron-right">E-mail: <a href="mailto:{{ $setting->email_one }}">{{ $setting->email_one }}</a></li>
                              </ul>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <!-- TAGS -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <h2 class="title">popular tags</h2>
                     <ul class="footer-tags">
                        @foreach( $popular_tags as $popular_tag )
                        <li><a href="{{ URL::route('tag.search',[$popular_tag->slug]) }}">{{ $popular_tag->title }}</a></li>
                        @endforeach
                     </ul>
                  </div>
                  <!-- POST -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <h2 class="title">popular videos</h2>
                     <ul class="footer-menu-links">
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/most-viewed') }}">Most Viewed</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/most-liked') }}">Most Liked</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/most-commented') }}">Most Commented</a></li>
                     </ul>
                  </div>
                  <!-- LINKS -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <h2 class="title">Trending</h2>
                     <ul class="footer-menu-links">
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/latest-videos') }}">Latest Videos</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/featured-videos') }}">Featured Videos</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/full-hd') }}">Full HD</a></li>
                     </ul>
                  </div>
               </div>
               <div class="row copyright-bottom text-center">
                  @if(isset($setting))
                  <div class="col-md-12 text-center">
                     <p>&copy; {!! $setting->footer_text !!}</p>
                  </div>
                  @endif
               </div>
            </footer>
         </div>
      </div>
      <!-- JAVA SCRIPT -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('frontend/js/plyr.min.js') }}"></script>
      <script src="{{ asset('backend/js/vendor/toastr.min.js') }}"></script>

      <script type="text/javascript">
        const player = new Plyr('#player');
      </script>

      {!! Toastr::message() !!}

        <script type="text/javascript">
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };

            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr["error"]("{{ $error }}");
                @endforeach
            @endif
        </script>

      <script>
         $(".nav .dropdown").hover(function() {
           $(this).find(".dropdown-toggle").dropdown("toggle");
         });
      </script>
 

      
      <!-- Action on click -->
      <script>
         jQuery(document).ready(function(){
            jQuery('#video_like').one( "click", function(e){
              //alert(jQuery('input[name=video_id]').val());
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            jQuery.ajax({
               url: "{{ url('/video-like') }}",
               method: 'get',
               data: {
                  video_id: jQuery('input[name=video_id]').val()
               },
               success: function(result){
                  //console.log("Testing Response!");
                  jQuery('#video_rating').show();
                  jQuery('#video_rating').html(result.values);
               }});
            });
         });

         

         jQuery(document).ready(function(){
            jQuery('#video_dislike').one( "click", function(e){
              //alert(jQuery('input[name=video_id]').val());
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            jQuery.ajax({
               url: "{{ url('/video-dislike') }}",
               method: 'get',
               data: {
                  video_id: jQuery('input[name=video_id]').val()
               },
               success: function(result){
                  //console.log("Testing Response!");
                  jQuery('#video_rating').show();
                  jQuery('#video_rating').html(result.values);
               }});
            });
         });
      </script>

   </body>
</html>