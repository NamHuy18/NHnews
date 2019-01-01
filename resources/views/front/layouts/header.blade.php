        <header class="header">

        <!-- Header bar -->
        <div class="header_bar">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_bar_content d-flex flex-row align-items-center justify-content-start">

                            <div class="header_search_container ml-auto">
                                <div class="header_search">
                                    <form action="{{route('search')}}" method="GET" id="header_search_form" class="header_search_form d-flex flex-row align-items-center justfy-content-start">
                                       
                                        <div><div class="header_search_activation"><i class="fa fa-search" aria-hidden="true"></i></div></div>
                                        <input type="text" name="key" class="header_search_input" placeholder="Search" required="required">
                                        <button type="submit" class="load_more_button" > Tìm</button>
                                    </form>
                                </div>
                            </div>

                            <div class="header_social ml-auto">
                                <ul class="d-flex flex-row align-items-center justify-content-start">
                                    <li class="menu_mm"><a href="{{route('about')}}">About</a></li>
                                    <li class="menu_mm"><a href="{{route('contact')}}">Contact</a></li>

                                    @if(Auth::check())
                                        <li><a href="{{route('user')}}"><i class="fa fa-dribbble" aria-hidden="true">{{Auth::user()->name}}</i></a></li>
                                        <li class="menu_mm"><a href="{{route('logout')}}">Sign Out</a></li>                                       
                                    @else
                                        <li class="menu_mm"><a href="{{route('signup')}}">Sign Up</a></li>
                                        <li class="menu_mm"><a href="{{route('login')}}">Sign In</a></li>
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="header_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justfy-content-start">
                            <div class="logo_container">
                                <a href="{{route('home')}}">
                                    <div class="logo"><span>NH</span>News</div>

                                </a>
                            </div>
                            <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">
                                <a>
                                    <div class="background_image" style="background-image:url(front_asset/images/index.jpeg)"></div>
                                    <div class="header_extra_title">
                                        <div class="header_extra_title">Trang Tin Trực Tuyến</div>
                                        <div class="header_extra_subtitle">Cập nhật 24/7</div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Navigation & Search -->
        <div class="header_nav_container" id="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                            
                            <!-- Navigation -->
                            <nav class="main_nav">
                                <ul class="main_nav_list d-flex flex-row align-items-center justify-content-start">
                                    @foreach($theloai as $tl)
                                        @if(count($tl->loaitin) > 0)
                                    <div class="main">
                                        <ul>
                                            <li><a >{{$tl->ten}}</a>
                                                <ul>
                                             @foreach($tl->loaitin as $lt)
                                                
                                                    <li ><a href="loaitin/{{$lt->id}}/{{$lt->tenkhongdau}}.html">{{$lt->ten}}</a></li>
                                                
                                                @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>

                            <!-- Hamburger -->
                            <div class="hamburger ml-auto menu_mm"><i class="fa fa-bars  trans_200 menu_mm" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </header>
