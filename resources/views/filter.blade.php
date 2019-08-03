@extends('layouts.master')
@section('title', $filter)
@section('content')

         <!-- SEARCH -->
         <div class="row">

            <!-- Include Sidebar -->
            @include('inc.sidebar')
            <!-- Include Sidebar -->

            <!-- POST ARTICLES -->	
            <div class="col-lg-7 col-md-8">
               <!-- BREADCRUMB -->
               <ol class = "breadcrumb">
                  <li><a href = "{{ URL('/') }}">Home</a></li>
                  <li class = "active">{{ $filter }}</li>
               </ol>
               <!-- SEARCH LIST -->
               <section id="category3-section">
                  <div class="row auto-clear">
                     <!-- RELATED VIDEOS -->
                     <div class="col-lg-12 col-md-12 col-sm-12 category-video-grid">
                        <h2 class="icon"><i class="fa fa-flash" aria-hidden="true"></i>{{ $filter }}</h2>
                        <!-- VIDEO POSTS ROW -->
                        <div class="row">

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

                           @foreach( $videos as $video )
                           <article class="col-lg-3 col-md-6 col-sm-4">
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
                           @endforeach

                           @if(count($videos) <= 0)
                              <div class="text-center">
                                 No Video Found
                              </div>
                           @endif

                        </div>
                        <div class="clearfix spacer"></div>
                     </div>
                  </div>
                  <div class="row pagi text-center">
                     <ul class="pagination dropshd">
                        {{ $videos->links() }}
                     </ul>
                  </div>
               </section>
            </div>
            

            <!-- RIGHT SIDEBAR ADS -->
            @include('inc.add-sidebar')
            <!-- RIGHT SIDEBAR ADS -->
                     

         </div>
      </div>

@endsection