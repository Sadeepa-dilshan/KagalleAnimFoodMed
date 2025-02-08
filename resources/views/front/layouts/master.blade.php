<!DOCTYPE html>
<html lang="zxx">
@include('front.components.head')
<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="images/loader.svg" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Start -->
    @include('front.components.navigation')
    <!-- Header End -->

    @yield('content')
    
    <!-- Footer Start -->
    @include('front.components.footer')
    <!-- Footer End -->

    @include('front.components.scripts')

    @yield('script')
</body>
</html>
