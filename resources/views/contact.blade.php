@extends('layouts.master')
@section('title', 'Contact')
@section('content')

         <!-- CONTACT -->
         <div class="row auto-clear">
            <!-- CONTACT PAGE -->	
            <div class="col-lg-12 col-md-12">
               <div id="contact-page" class="row">
                  <!-- CONTACT PAGE DETAILS -->
                  <div class="col-md-12">
                     <div class="content-box-opa dark-bg">
                        <article>
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                 <h2 class="title main-head-title text-left">contact</h2>
                                 
                                 @foreach( $settings as $setting )
                                 <div class="contact-info">
                                    <h3>Find Us</h3>
                                    <ul>
                                       <li class="fa fa-chevron-right">Address: {{ $setting->contact_address }}</li>
                                       <li class="fa fa-chevron-right">Phone: {{ $setting->phone_one }}</li>
                                       @if(isset($setting->phone_two))
                                       <li class="fa fa-chevron-right">Phone: {{ $setting->phone_two }}</li>
                                       @endif
                                       <li class="fa fa-chevron-right">E-mail: <a href="mailto:{{ $setting->email_one }}">{{ $setting->email_one }}</a></li>
                                       @if(isset($setting->email_two))
                                       <li class="fa fa-chevron-right">E-mail: <a href="mailto:{{ $setting->email_two }}">{{ $setting->email_two }}</a></li>
                                       @endif
                                    </ul>
                                 </div>
                                 @endforeach

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

                              <div class="col-lg-6 col-md-6 col-sm-12">
                                 <h2 class="title main-head-title text-left">get in touch</h2>
                                 <div id="comment-form">
                                    <!-- COMMENT FORM -->
                                    <form name="comment-form1" method="post" action="{{ URL('/contact') }}" id="comment-form1">
                                       @csrf
                                       <fieldset>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <input type="text" name="name" id="contactname" placeholder="Your name" required>
                                             </div>
                                             <div class="col-md-12">
                                                <input type="email" name="email" id="contactemail" placeholder="Enter your email" required>
                                             </div>
                                             <div class="col-md-12">
                                                <input type="text" name="subject" id="contactsubject" placeholder="Contact subject" required>
                                             </div>
                                             <div class="col-md-12">
                                                <textarea rows="10" name="message" id="comment" cols="5" required></textarea>
                                             </div>
                                             <div class="col-md-12">
                                                <button class="subscribe-btn" type="submit">Send Message</button>
                                             </div>
                                          </div>
                                       </fieldset>
                                    </form>
                                 </div>
                                 <!-- COMMENT FORM END -->
                              </div>
                           </div>
                           <div class="clearfix spacer"></div>
                        </article>
                     </div>
                  </div>
               </div>
               <div class="clearfix spacer"></div>
            </div>
         </div>
      </div>

@endsection