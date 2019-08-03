                     <!-- RIGHT ASIDE -->
                     <div class="col-lg-3 hidden-md  hidden-sm hidden-xs col-sm-12 text-center top-sidebar center-block">
                        <!-- SIDEBAR ADVERTISE BOX -->
                        @foreach( $ads as $ad )
                           @if(!empty($ad->sidebar1))
                              {!! $ad->sidebar1 !!}
                           @else
                           <img src="{{ asset('/frontend/img/banners/banner-l.jpg') }}" class="img-responsive center-block" alt="Banner">
                           @endif
                        @endforeach 

                        <div class="clearfix spacer"></div>
                        <!-- SIDEBAR ADVERTISE BOX -->
                        @foreach( $ads as $ad )
                           @if(!empty($ad->sidebar2))
                              {!! $ad->sidebar2 !!}
                           @else
                           <img src="{{ asset('/frontend/img/banners/banner-l.jpg') }}" class="img-responsive center-block" alt="Banner">
                           @endif
                        @endforeach 
                     </div>