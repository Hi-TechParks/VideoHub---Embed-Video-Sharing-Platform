            <!-- SIDEBAR -->
            <div class="col-lg-2 col-md-4 hidden-sm hidden-xs">
               <aside class="dark-bg">
                  <article>
                     <h2 class="icon"><i class="fa fa-flash" aria-hidden="true"></i>trending</h2>
                     <ul class="sidebar-links">
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/latest-videos') }}" class="{{ Request::path() == 'filter/latest-videos' ? 'active' : '' }}">Latest Videos</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/featured-videos') }}" class="{{ Request::path() == 'filter/featured-videos' ? 'active' : '' }}">Featured Videos</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/most-viewed') }}" class="{{ Request::path() == 'filter/most-viewed' ? 'active' : '' }}">Most Viewed</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/most-liked') }}" class="{{ Request::path() == 'filter/most-liked' ? 'active' : '' }}">Most Liked</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/most-commented') }}" class="{{ Request::path() == 'filter/most-commented' ? 'active' : '' }}">Most Commented</a></li>
                        <li class="fa fa-chevron-right"><a href="{{ URL('/filter/full-hd') }}" class="{{ Request::path() == 'filter/full-hd' ? 'active' : '' }}">Full HD</a></li>
                     </ul>
                  </article>
                  <div class="clearfix spacer"></div>
                  <article>
                     <h2 class="icon"><i class="fa fa-gears" aria-hidden="true"></i>categories</h2>
                     <ul class="sidebar-links">
                        @foreach( $categories as $category )
                        <li class="fa fa-chevron-right">
                           <a href="{{ URL('/video/category/'.$category->id ) }}" class="{{ Request::path() == 'video/category/'.$category->id ? 'active' : '' }}">{{ $category->title }}</a>
                           <span>{{ $category->videos->count() }}</span>
                        </li>
                        @endforeach
                     </ul>
                  </article>
                  <div class="clearfix spacer"></div>
               </aside>
            </div>