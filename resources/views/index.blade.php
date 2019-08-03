@extends('layouts.master')
@section('title', 'Home')
@section('content')

         <!-- CORE -->
         <div class="row">
            
            <!-- Include Sidebar -->
            @include('inc.sidebar')
            <!-- Include Sidebar -->

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

            <!-- HOME MAIN POSTS -->	
            <div class="col-lg-10 col-md-8">
               <section id="home-main">
                  <h2 class="icon"><i class="fa fa-address-book" aria-hidden="true"></i>popular videos</h2>
                  <div class="row">
                     <!-- ARTICLES -->
                     <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="row auto-clear">

                           @foreach( $featureds as $featured )
                           <article class="col-lg-3 col-md-6 col-sm-4">
                              <!-- POST L size -->
                              <div class="post post-medium">
                                 <div class="thumbr">
                                    <a class="afterglow post-thumb" href="{{ URL('/video/'.$featured->id ) }}">
                                       <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                       <div class="cactus-note ct-time font-size-1"><span>{{ $featured->duration }}</span></div>
                                       <img class="img-responsive" src="{{ asset('uploads/video/thumb/'.$featured->image_path) }}" alt="Video">
                                    </a>
                                 </div>
                                 <div class="infor">
                                    <h4>
                                       <a class="title" href="{{ URL('/video/'.$featured->id ) }}">{{ textShorten($featured->title) }}...</a>
                                    </h4>
                                    <span class="posts-txt"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $featured->like }}</span>
                                    <span class="posts-txt"><i class="fa fa-eye" aria-hidden="true"></i>{{ $featured->views }}</span>
                                 </div>
                              </div>
                           </article>
                           @endforeach
                           
                        </div>
                        <div class="clearfix spacer"></div>
                     </div>

                     <!-- RIGHT SIDEBAR ADS -->
                     @include('inc.add-sidebar')
                     <!-- RIGHT SIDEBAR ADS -->

                  </div>
               </section>
            </div>
         </div>
      </div>
      <!-- TABS -->
      <div id="tabs" class="container-fluid featured-bg">
         <div class="container-fluid">
            <div class="col-md-12">
               <!-- BOOTSTRAP TABS -->
               <div class="head-section">
                  <ul class="nav nav-tabs text-center">
                     <li class="active">
                        <a data-toggle="tab" href="#tab1">
                           <h2 class="title">latest</h2>
                        </a>
                     </li>
                     <li>
                        <a data-toggle="tab" href="#tab2">
                           <h2 class="title">top rated</h2>
                        </a>
                     </li>
                     <li>
                        <a data-toggle="tab" href="#tab3">
                           <h2 class="title">most viewed</h2>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="row auto-clear">
                  <!-- TAB CONTENTS -->
                  <div class="tab-content">
                     <div id="tab1" class="tab-pane fade in active">
                        @foreach( $latests as $latest )
                        <article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
                           <!-- POST L size -->
                           <div class="post post-medium">
                              <div class="thumbr">
                                 <a class="afterglow post-thumb" href="{{ URL('/video/'.$latest->id ) }}">
                                    <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                    <div class="cactus-note ct-time font-size-1"><span>{{ $latest->duration }}</span></div>
                                    <img class="img-responsive" src="{{ asset('uploads/video/thumb/'.$latest->image_path) }}" alt="Video">
                                 </a>
                              </div>
                              <div class="infor">
                                 <h4>
                                    <a class="title" href="{{ URL('/video/'.$latest->id ) }}">{{ textShorten($latest->title) }}...</a>
                                 </h4>
                                 <span class="posts-txt"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $latest->like }}</span>
                                 <span class="posts-txt"><i class="fa fa-eye" aria-hidden="true"></i>{{ $latest->views }}</span>
                              </div>
                           </div>
                        </article>
                        @endforeach
                     </div>
                     <div id="tab2" class="tab-pane fade">
                        @foreach( $most_likes as $most_like )
                        <article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
                           <!-- POST L size -->
                           <div class="post post-medium">
                              <div class="thumbr">
                                 <a class="afterglow post-thumb" href="{{ URL('/video/'.$most_like->id ) }}">
                                    <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                    <div class="cactus-note ct-time font-size-1"><span>{{ $most_like->duration }}</span></div>
                                    <img class="img-responsive" src="{{ asset('uploads/video/thumb/'.$most_like->image_path) }}" alt="Video">
                                 </a>
                              </div>
                              <div class="infor">
                                 <h4>
                                    <a class="title" href="{{ URL('/video/'.$most_like->id ) }}">{{ textShorten($most_like->title) }}...</a>
                                 </h4>
                                 <span class="posts-txt"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $most_like->like }}</span>
                                 <span class="posts-txt"><i class="fa fa-eye" aria-hidden="true"></i>{{ $most_like->views }}</span>
                              </div>
                           </div>
                        </article>
                        @endforeach
                     </div>
                     <div id="tab3" class="tab-pane fade">
                        @foreach( $most_views as $most_view )
                        <article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
                           <!-- POST L size -->
                           <div class="post post-medium">
                              <div class="thumbr">
                                 <a class="afterglow post-thumb" href="{{ URL('/video/'.$most_view->id ) }}">
                                    <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                    <div class="cactus-note ct-time font-size-1"><span>{{ $most_view->duration }}</span></div>
                                    <img class="img-responsive" src="{{ asset('uploads/video/thumb/'.$most_view->image_path) }}" alt="Video">
                                 </a>
                              </div>
                              <div class="infor">
                                 <h4>
                                    <a class="title" href="{{ URL('/video/'.$most_view->id ) }}">{{ textShorten($most_view->title) }}...</a>
                                 </h4>
                                 <span class="posts-txt"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $most_view->like }}</span>
                                 <span class="posts-txt"><i class="fa fa-eye" aria-hidden="true"></i>{{ $most_view->views }}</span>
                              </div>
                           </div>
                        </article>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- MAIN -->
      <div id="main" class="container-fluid">
         <div class="container-fluid">
            <!-- SIDEBAR -->
            <div class="col-lg-2 hidden-md hidden-sm hidden-xs">
               <aside class="dark-bg sidebar">
                  <div class="clearfix spacer"></div>
                  <article>
                     <h2 class="icon"><i class="fa fa-tag" aria-hidden="true"></i>Tags</h2>
                     <ul class="footer-tags">
                        @foreach( $tags as $tag )
                        <li><a href="{{ URL::route('tag.search',[$tag->slug]) }}">{{ $tag->title }}</a></li>
                        @endforeach
                     </ul>
                  </article>
                  <div class="clearfix spacer"></div>
               </aside>
            </div>
            <!-- MAIN CONTENT -->
            <div class="col-lg-10 col-md-12">
               
               @foreach( $home_categories as $home_category )

               <div class="row">
                  <h2 class="icon"><i class="fa fa-star" aria-hidden="true"></i>{{ $home_category->title }}</h2>

                  <div id="video-carousel-{{ $home_category->id }}" class="owl-carousel owl-theme">

                     <?php $video_count = 0; ?>
                     @foreach( $videos as $video )
                       @if( $home_category->id == $video->category_id )
                        <?php $video_count++; ?>
                        @if($video_count <= 12)

                        <div class="item">
                           <article class="post post-medium">
                              <!-- POST L size -->
                              <div class="post post-medium">
                                 <div class="thumbr">
                                    <a class="afterglow post-thumb" href="{{ URL('/video/'.$video->id ) }}">
                                       <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                       <div class="cactus-note ct-time font-size-1"><span>{{ $video->duration }}</span></div>
                                       <img class="img-responsive" src="{{ asset('uploads/video/thumb/'.$video->image_path) }}" alt="Video">
                                    </a>
                                 </div>
                                 <div class="infor">
                                    <h4>
                                       <a class="title" href="{{ URL('/video/'.$video->id ) }}">{{ textShorten($video->title) }}...</a>
                                    </h4>
                                    <span class="posts-txt"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $video->like }}</span>
                                    <span class="posts-txt"><i class="fa fa-eye" aria-hidden="true"></i>{{ $video->views }}</span>
                                 </div>
                              </div>
                           </article>
                        </div>

                        @endif
                       @endif
                     @endforeach
                     
                   </div>
               </div>

               <script type="text/javascript">
                 $('#video-carousel-{{ $home_category->id }}').owlCarousel({
                     loop:true,
                     margin:20,
                     dots:false,
                     nav:true,
                     loop:true,
                     responsiveClass:true,
                     smartSpeed :900,
                     navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                     responsive:{
                         0:{
                             items:1,
                         },
                         400:{
                             items:2,
                         },
                         600:{
                             items:3,
                         },
                         800:{
                             items:4,
                         },
                         1000:{
                             items:5,
                         },
                         1200:{
                             items:6,
                         },
                         1600:{
                             items:7,
                         }
                     }
                 })
               </script>

               <div class="clearfix spacer"></div>
               @endforeach

            </div>
         </div>
         <div class="clearfix"></div>
      </div>
      
@endsection