<!--Navigation-->
<div class="nav container d-flex flex-row align-items-center justify-items-center">
    <!--leftbar-->
    <div class="col-10  col-sm-2 mx-sm-0"  >
        <img class="img-fluid nav-logo " src="{{ asset('assets/images/logo.svg') }}" alt="">
    </div>
    <!--main content-->
    <div class="col-8 flex-grow-1 d-none d-sm-flex aligin-items-center justify-items-center justify-content-center mt-3 " >
        <ul class="d-flex flex-row gap-5 ">
            <li><a href="">Home</a></li>
            <li><a href="About/index.html">About</a></li>
            <li><a href="{{route('posts')}}">Posts</a></li>
            <li class="drop"><a href="#">More <i class="ph ph-caret-down mt-1"></i></a>
                <div class="drop-menu mt-1">
                    <ul>
                        <li><a href="Community/index.html">Community</a></li>
                        <li><a href="{{route('categories')}}">Categories</a></li>
                        <li><a href="Discussions/index.html">Discussions</a></li>
                        <li><a href="{{route('user-profile')}}">User Profile</a></li>
                        <li><a href="Contact/index.html">Contact</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!--rightbar-->
    <div class="col-2 flex-shrink-0 right-bar d-flex flex-row justify-content-end" >
        <li>
            @auth
                <a href="{{ route('logout') }}" class="d-none d-sm-block">
                    <i class="ph ph-sign-out"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="d-none d-sm-block">
                    <i class="ph-fill ph-user-circle-plus"></i>
                </a>
            @endauth
        </li>

        <button class="menu-btn d-block d-md-none" id="menu-btn"><i class="ph ph-list"></i></button>
    </div>
</div>

<div class="container mobile-menu" id="mobile-menu">
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="About/index.html">About</a></li>
        <li><a href="Posts/index.html">Posts</a></li>
        <li><a href="#" class="mobile-drop" id="mobile-drop">More</a>
            <div class="mobile-drop-menu mt-1" id="mobile-drop-menu">
                <ul>
                    <li><a href="Community/index.html">Community</a></li>
                    <li><a href="{{route('categories')}}">Categories</a></li>
                    <li><a href="Discussions/index.html">Discussions</a></li>
                    <li><a href="User-Profile/index.html">user Profile</a></li>
                    <li><a href="Contact/index.html">Contact</a></li>
                </ul>
            </div>
        </li>
        <li><a href="{{ route('login') }}"><i class="ph-fill ph-user-circle-plus"></i></a></li>
        <li>
            @auth
                <a href="{{ route('logout') }}">
                    <i class="ph ph-sign-out"></i>
                </a>
            @else
                <a href="{{ route('login') }}">
                    <i class="ph-fill ph-user-circle-plus"></i>
                </a>
            @endauth
        </li>
    </ul>
</div>
<div class="container"><hr class="green-hr"/></div>
<!--Navigation end-->
