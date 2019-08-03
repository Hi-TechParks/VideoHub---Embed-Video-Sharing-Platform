@extends('layouts.master')
@section('title', 'Video')
@section('content')

         <!-- SINGLE VIDEO -->
         <div class="row">
            
            <!-- Include Sidebar -->
            @include('inc.sidebar')
            <!-- Include Sidebar -->

            <!-- SINGLE VIDEO -->	
            <div id="single-video-wrapper" class="col-lg-10 col-md-8">
               <div class="row">
                  <!-- VIDEO SINGLE POST -->
                  <div class="col-lg-8 col-md-12 col-sm-12">

                     @foreach( $videos as $video )
                     <!-- POST L size -->
                     <article class="post-video">
                        <!-- VIDEO INFO -->
                        <div class="video-info">

                           @if($video->video_type == 1)

                              <div class="text-center">
                                <div class="plyr__video-embed" id="player">
                                  <div class="embed-responsive embed-responsive-16by9">
                                    {!! $video->video_id !!}
                                  </div>
                                </div>
                              </div>

                           @elseif($video->video_type == 2)
                              <div class="plyr__video-embed" id="player">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $video->video_id }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                    allowfullscreen
                                    allowtransparency
                                    allow="autoplay"
                                ></iframe>
                              </div>
                           @elseif($video->video_type == 3)
                              <div class="plyr__video-embed" id="player">
                                <iframe
                                    src="https://player.vimeo.com/video/{{ $video->video_id }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;quality=true&amp;transparent=0&amp;gesture=media"
                                    allowfullscreen
                                    allowtransparency
                                    allow="autoplay"
                                ></iframe>
                              </div>
                           @endif

                           <h2>{{ $video->title }}</h2>
                           <div class="metabox">

                              <input type="hidden" id="video_id" name="video_id" value="{{ $video->id }}">

                              <div id="video_rating">
                                <span class="meta-i" id="video_like">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $video->like }}
                                </span>
                                <span class="meta-i" id="video_dislike">
                                <i class="fa fa-thumbs-down" aria-hidden="true"></i>{{ $video->dislike }}
                                </span>
                              </div>

                              <span class="meta-i">
                              <i class="fa fa-clock-o"></i>{{ date('M d Y', strtotime($video->created_at )) }}
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-eye"></i>{{ $video->views }} views
                              </span>
                           </div>
                           <ul class="social">

                              <?php $uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

                              <div id="fb-root"></div>
                              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>

                              <li class="social-facebook" data-href="<?php echo $uri; ?>" data-layout="button"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $uri; ?>&amp;src=sdkpreparse" target="_blank" class="fa fa-facebook social-icons"></a></li>

                              <li class="social-twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo $uri; ?>" target="_blank" class="fa fa-twitter social-icons twitter-share-button"></a></li>
                           </ul>

                           <ul class="footer-tags">
                              @foreach( $video_tags as $video_tag )
                              <li><a href="{{ URL::route('tag.search',[$video_tag->tag->slug]) }}">{{ $video_tag->tag->title }}</a></li>
                              @endforeach
                           </ul>
                        </div>
                        <div class="clearfix spacer"></div>
                        <!-- DETAILS -->
                        <div class="video-content">
                           <h2 class="title main-head-title">Video Details</h2>

                           {!! $video->description !!}

                        </div>
                        <div class="clearfix spacer"></div>
                     </article>
                     @endforeach
                  
          					<!-- COMMENTS -->
          					<section id="comments">
          						<h2 class="title">leave comment</h2>
          						<div class="widget-area">
          							<div class="status-upload">
          								<form action="{{ URL::route('user.comment.store') }}" method="post">
                             @csrf
                             <input name="video_id" type="hidden" value="{{ $video->id }}">
                             <input class="form-control" name="name" placeholder="Name" type="text" required>
                             <input class="form-control" name="email" placeholder="Email" type="email" required>
          									 <textarea class="form-control" name="comment" placeholder="Your comment goes here" required></textarea>
          									<div class="comment-box-control">
          										<button type="submit" class="btn pull-right"><i class="fa fa-share"></i> post comment</button>
          									</div>
          								</form>
          							</div><!-- Status Upload  -->
          						</div><!-- Widget Area -->
          						
          						
          						<div class="row comment-posts">
                               @foreach( $comments as $comment )
          							<div class="col-sm-1">
          								<div class="thumbnail">
          									<img class="img-responsive user-photo" src="{{ asset('frontend/img/user.png') }}" alt="Avatar">
          								</div>
          							</div>

          							<div class="col-sm-11">
          								<div class="panel panel-default">
          									<div class="panel-heading">
          										<strong>{{ $comment->name }}</strong> <span class="pull-right">commented {{ date('d M Y', strtotime($comment->created_at)) }}</span>
          									</div>
          									<div class="panel-body">
          										{{ $comment->comment }}
          									</div>
          								</div>
          							</div>
          						   @endforeach							
          						</div>

          					</section>
          				  
          				  </div>

                     <!-- RIGHT SIDEBAR ADS -->
                     @include('inc.add-sidebar')
                     <!-- RIGHT SIDEBAR ADS -->
				  
               </div>
               <div class="clearfix spacer"></div>
               
               </div>
            </div>

            <div class="row">
              <div class="container">
                <div class="row">
                  <!-- RELATED VIDEOS -->
                  <div class="col-lg-12 col-md-12 col-sm-12 related-videos">
                     <h2 class="icon"><i class="fa fa-trophy" aria-hidden="true"></i>related videos</h2>
                     <div class="row auto-clear">
                        <div id="video-carousel" class="owl-carousel owl-theme">

                           @foreach( $related_videos as $related_video )
                           <div class="item">
                              <article class="post post-medium">
                                 <!-- POST L size -->
                                 <div class="post post-medium">
                                    <div class="thumbr">
                                       <a class="afterglow post-thumb" href="{{ URL('/video/'.$related_video->id ) }}">
                                          <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                          <div class="cactus-note ct-time font-size-1"><span>{{ $related_video->duration }}</span></div>
                                          <img class="img-responsive" src="{{ asset('uploads/video/thumb/'.$related_video->image_path) }}" alt="Video">
                                       </a>
                                    </div>
                                    <div class="infor">
                                       <h4>
                                          <a class="title" href="{{ URL('/video/'.$related_video->id ) }}">{{ $related_video->title }}</a>
                                       </h4>
                                       <span class="posts-txt"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ $related_video->like }}</span>
                                       <span class="posts-txt"><i class="fa fa-eye" aria-hidden="true"></i>{{ $related_video->views }}</span>
                                    </div>
                                 </div>
                              </article>
                           </div>
                           @endforeach
                           
                         </div>
                     </div>

                     <script type="text/javascript">
                       $('#video-carousel').owlCarousel({
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

                     </div>
                  </div>
                </div>
               <div class="clearfix spacer"></div>
            </div>
         </div>
      </div>

@endsection