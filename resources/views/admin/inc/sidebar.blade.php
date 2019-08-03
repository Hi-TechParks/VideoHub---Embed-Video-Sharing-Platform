<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ URL::route('dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('video.index') }}">
                <span class="icon"><i class="fab fa-youtube"></i></span>
                <span> Videos </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('video-category.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span> Video Category </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('comment.index') }}">
                <span class="icon"><i class="fas fa-comments"></i></span>
                <span> Comments </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('tag.index') }}">
                <span class="icon"><i class="fas fa-tags"></i></span>
                <span> Tags </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-ad"></i></span>
                <span> Ads </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ URL::route('ad.index') }}">Ads Setup</a>
                    <a href="{{ URL::route('file-upload.index') }}">Upload Assets</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Settings </span>
            </a>
        </li>

    </ul>

</div>
<!-- End Sidebar -->