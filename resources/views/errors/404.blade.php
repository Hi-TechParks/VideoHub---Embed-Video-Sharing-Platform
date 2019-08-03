@extends('layouts.master')
@section('title', 'Error 404')
@section('content')

         <!-- 404 -->
         <div class="row">
            <div class="container">
               <!-- 404 -->	
               <div id="404-page" class="col-lg-12 col-md-12">
                  <!-- 404 -->
                  <article>
                     <!-- INFO -->
                     <div class="video-info dropshd">
                        <h2 class="title main-head-title">Ooops, there is nothing. Please take a look other pages.</h2>
                        <div class="thumbr">
                           <img class="img-responsive" src="{{ asset('frontend/img/thumbs/404.jpg') }}" alt="#">
                        </div>
                        <div class="spacer"></div>
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
                     <div class="clearfix spacer"></div>
                  </article>
                  <div class="clearfix spacer"></div>
               </div>
            </div>
         </div>
      </div>

@endsection