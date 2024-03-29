   <!-- HEADER START
                ============================================= -->
                {{-- <header id="header" class="header-style-1">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="header-clear clearfix">
                                <div class="header-content-left clearfix"> --}}
                                    <!-- LOGO START
                                    ============================================= -->
                                    {{-- <div class="logo">
                                        <a href=""><img src="img/dugem-logos.png" alt="Dugem Logo" /></a>
                                    </div> --}}
                                    <!-- LOGO END -->
                                {{-- </div>
                                <div class="header-content-center clearfix"> --}}
                                    <!-- NAVIGATION START============================================= -->
                                    {{-- <nav class="main-nav"> --}}
                                        <!-- Mobile menu toggle button (hamburger/x icon) -->
                                        {{-- <input id="main-menu-state" type="checkbox" />
                                        <label class="main-menu-btn sub-menu-trigger" for="main-menu-state">
                                            <span class="main-menu-btn-icon"></span> Toggle main menu visibility
                                        </label> --}}
                                        <!-- Sample menu definition -->
                                        {{-- <ul id="main-menu" class="sm sm-clean">
                                            <li class="menu-item"><a href="" class="menu-link active">Home</a></li>
                                            <li class="menu-item"><a href="{{ route('about') }}" class="menu-link">About</a></li>
                                            <li class="menu-item"><a href="{{route('event')}}" class="menu-link">Event</a></li>
                                            <li class="menu-item"><a href="blog.html" class="menu-link">News</a></li>
                                            <li class="menu-item"><a href="contact.html" class="menu-link">Contact</a></li>
                                        </ul>
                                    </nav> --}}
                                    <!-- NAVIGATION END -->
                                {{-- </div>
                                <div class="header-content-right">
                                    <div class="header-info head-item clearfix">
                                        <div class="info-wrap">
                                            <div class="search-wrap">
                                                <button id="btn-search" class="btn btn--search"><i class="icon-simple-line-icons-143"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="search">
                                    <button id="btn-search-close" class="btn--search-close"><i class="icon-themify-1"></i></button>
                                    <form class="search__form">
                                        <input class="search__input" name="search" type="search" placeholder="Search..." />
                                        <span class="search__info">Hit enter to search or ESC to close</span>
                                    </form> --}}
                                {{-- </div><!-- /search -->
                            </div>
                        </div>
                    </div>
                </header> --}}
                <!-- HEADER END -->
                <!-- HEADER START ============================================= -->
<!-- HEADER START ============================================= -->
<header id="header" class="header-style-1">
    <div class="container">
        <div class="row clearfix">
            <div class="header-clear clearfix">
                <div class="header-content-left clearfix">
                    <!-- LOGO START ============================================= -->
                    <div class="logo">
                        <a href=""><img src="img/dugem-logos.png" alt="Dugem Logo" /></a>
                    </div>
                    <!-- LOGO END -->
                </div>
                <div class="header-content-center clearfix">
                    <!-- NAVIGATION START ============================================= -->
                    <nav class="main-nav">
                        <!-- Mobile menu toggle button (hamburger/x icon) -->
                        <input id="main-menu-state" type="checkbox" />
                        <label class="main-menu-btn sub-menu-trigger" for="main-menu-state">
                            <span class="main-menu-btn-icon"></span> Toggle main menu visibility
                        </label>
                        <!-- Sample menu definition -->
                        <ul id="main-menu" class="sm sm-clean">
                            <li class="menu-item"><a href="" class="menu-link active">Home</a></li>
                            <li class="menu-item"><a href="{{ route('about') }}" class="menu-link">About</a></li>
                            <li class="menu-item"><a href="{{ route('event') }}" class="menu-link">Event</a></li>
                            <li class="menu-item"><a href="" class="menu-link">News</a></li>
                            <li class="menu-item"><a href="" class="menu-link">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- NAVIGATION END -->
                </div>
                <div class="header-content-right">
                    <div class="header-info head-item clearfix">
                        <div class="info-wrap">
                            <div class="search-wrap">
                                {{-- <button id="btn-search" class="btn btn--search"><i class="icon-simple-line-icons-143"></i></button> --}}
                                <!-- Login and Register buttons with similar styles -->
                                <div class="header-buttons">
                                    @guest
                                        <a href="{{ route('login') }}" class="menu-link">Login</a>
                                        <a href="{{ route('register') }}" class="menu-link">Register</a>
                                    @else
                                        <!-- Display user name and a logout link if the user is authenticated -->
                                        <span class="user-info">{{ Auth::user()->name }}</span>
                                        <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search">
                    <button id="btn-search-close" class="btn--search-close"><i class="icon-themify-1"></i></button>
                    <form class="search__form">
                        <input class="search__input" name="search" type="search" placeholder="Search..." />
                        <span class="search__info">Hit enter to search or ESC to close</span>
                    </form>
                </div><!-- /search -->
            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->


