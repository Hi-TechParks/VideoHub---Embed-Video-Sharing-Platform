@extends('layouts.master')
@section('title', $category->title)
@section('content')

         <!-- CATEGORY -->
         <div class="row">

            <!-- Include Sidebar -->
            @include('inc.sidebar')
            <!-- Include Sidebar -->
            
            <!-- POST ARTICLES -->	
            <div class="col-lg-10 col-md-8">
               <!-- BREADCRUMB -->
               <ol class = "breadcrumb">
                  <li><a href = "{{ URL('/') }}">Home</a></li>
                  <li><a href = "#">Category</a></li>
                  <li class = "active">{{ $category->title }}</li>
               </ol>
               <!-- CATEGORY GRID -->
               <section id="category">
                  <div class="row auto-clear">
                     <!-- RELATED VIDEOS -->
                     <div class="col-lg-9 col-md-12 col-sm-12 category-video-grid">
                        <h2 class="icon"><i class="fa fa-star" aria-hidden="true"></i>{{ $category->title }}</h2>
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

                        </div>
                        <div class="clearfix spacer"></div>
                     </div>


                     <!-- RIGHT SIDEBAR ADS -->
                     @include('inc.add-sidebar')
                     <!-- RIGHT SIDEBAR ADS -->


                  </div>
                  <div class="row pagi text-center">
                     <ul class="pagination dropshd">
                        {{ $videos->links() }}
                     </ul>
                  </div>
               </section>
            </div>
         </div>
      </div>

@endsection