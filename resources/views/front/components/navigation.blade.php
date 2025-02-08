<header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="/">
                        <img src="{{url("images/logo.svg")}}" alt="Logo">
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="/">Home</a>
                                    
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{url("about")}}">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{url("services")}}">Services</a></li>
                                
                                <li class="nav-item"><a class="nav-link" href="{{url("contact")}}">Contact Us</a></li>

                                @if(auth()->check())
                                 <li class="nav-item d-block d-sm-none"> <a href="/dashboard" class="nav-link" >Dashboard</a></li>
                                 <li class="nav-item d-block d-sm-none mobile-logout-link">
                                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                @else
                                    <li class="nav-item d-block d-sm-none">  <a href="/login" class="nav-link" >Login</a></li>
                                @endif
                            </ul>
                        </div>
                        <!-- Let’s Start Button Start -->
                        <div class="header-btn d-inline-flex">
                           @if(auth()->check())
                            <a href="/dashboard" style="text-decoration:none;" class="btn-default login">Dashboard</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-default login" style="color:black; text-decoration: none;">Logout</button>
                            </form>
                           @else
                               <a href="/login"  style="text-decoration:none; margin-right:10px;" class="btn-default login">Login</a>
                           @endif
                           
                            <style>
                                .btn-default.login::before {display: none;}
                            </style>
                        </div>
                        <!-- Let’s Start Button End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
  