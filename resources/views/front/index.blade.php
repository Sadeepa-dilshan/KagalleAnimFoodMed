@extends('front.layouts.master')

@section('content')
<!-- Hero Section Start -->
<div class="hero">
    <div class="hero-section bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Hero Content Start -->
                    <div id="top" class="hero-content">
                        <div class="section-title">

                            <!-- <h1 class="text-anime-style-3" data-cursor="-opaque">Looking to save more on your rental
                                            car?</h1> -->
                        </div>

                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <div class="row mb-4">

                                <div class="col-md-6 col-sm-12 mt-4">
                                    <div class="bg-white h-100" style="border-radius:30px;">

                                        <div class="row py-4 px-4">
                                            <!-- Filter Form Start -->
                                            <form id="rent-details-form" action="{{ url('select-vehicle') }}"
                                                method="get">
                                                <div class="row gy-3">
                                                    <!-- Pickup Location -->
                                                    <div class="col-md-12">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">
                                                                <label for="from" class="form-label">Pickup
                                                                    Location</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <!-- Smaller input group -->
                                                                    <span class="input-group-text">
                                                                        <img src="images/icon-rent-details-2.svg"
                                                                            alt="Pickup Icon">
                                                                    </span>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm" id="from"
                                                                        name="from_location" placeholder="From location"
                                                                        required> <!-- Smaller input field -->
                                                                    <input type="hidden" name="pickup_cordinates">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Dropoff Location -->
                                                    <div class="col-md-12">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">
                                                                <label for="from" class="form-label">Drop
                                                                    Location</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <!-- Smaller input group -->
                                                                    <span class="input-group-text">
                                                                        <img src="images/icon-rent-details-4.svg"
                                                                            alt="Dropoff Icon">
                                                                    </span>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm" id="to"
                                                                        name="to_location" placeholder="To location"
                                                                        required> <!-- Smaller input field -->
                                                                    <input type="hidden" name="dropoff_cordinates">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Pickup Date -->
                                                    <div class="col-md-12">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">
                                                                <label for="from" class="form-label">Pickup Date</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <!-- Smaller input group -->
                                                                    <span class="input-group-text">
                                                                        <img src="images/icon-rent-details-3.svg"
                                                                            alt="Date Icon">
                                                                    </span>
                                                                    <input type="date"
                                                                        class="form-control form-control-sm" id="date"
                                                                        name="date" required>
                                                                    <!-- Smaller input field -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Pickup Time -->
                                                    <div class="col-md-12">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">
                                                                <label for="from" class="form-label">Pickup Time</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <!-- Smaller input group -->
                                                                    <span class="input-group-text">
                                                                        <img src="images/icon-rent-details-3.svg"
                                                                            alt="Time Icon">
                                                                    </span>
                                                                    <input type="time"
                                                                        class="form-control form-control-sm" id="time"
                                                                        name="time" required>
                                                                    <!-- Smaller input field -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Passenger Count Field -->
                                                    <div class="col-md-12">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">
                                                                <label for="from" class="form-label">Passengers</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <!-- Smaller input group -->
                                                                    <span class="input-group-text">
                                                                        <img src="images/43976.svg"
                                                                            alt="Passenger Icon">
                                                                    </span>
                                                                    <input type="number"
                                                                        class="form-control form-control-sm"
                                                                        id="passenger" name="passenger" min="1" max="10"
                                                                        value="1" required> <!-- Smaller input field -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Trip Type -->
                                                    <div class="col-md-12">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">

                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <!-- Smaller input group -->
                                                                    <div class="mt-2 form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="tripTypeReturn" name="trip_type[]"
                                                                            value="return">
                                                                        <label class="form-check-label"
                                                                            for="tripTypeReturn">Return</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Return Date and Time Fields (Initially Hidden) -->
                                                        <div id="returnDateTime"
                                                            style="display: none; ">
                                                            <div class="row gy-3 mt-1">
                                                                <div class="col-md-3">
                                                                    <label for="returnDate" class="form-label">Return
                                                                        Date</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                <span class="input-group-text">
                                                                        <img src="images/icon-rent-details-3.svg"
                                                                            alt="Time Icon">
                                                                    </span>
                                                                    <input type="date" id="returnDate"
                                                                        name="return_date"
                                                                        class="form-control form-control-sm">
                                                                </div></div>
                                                            </div>
                                                            <div class="row gy-3 mt-1">
                                                                <div class="col-md-3">
                                                                    <label for="returnTime" class="form-label">Return
                                                                        Time</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                <div class="input-group input-group-sm">
                                                                    <span class="input-group-text">
                                                                        <img src="images/icon-rent-details-3.svg"
                                                                            alt="Time Icon">
                                                                    </span>
                                                                    <input type="time" id="returnTime"
                                                                        name="return_time"
                                                                        class="form-control form-control-sm">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <input type="hidden" name="no_of_km">
                                                    <!-- Submit Button -->
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="button" onclick="submitForm();"
                                                            class="btn btn-primary btn-sm"> <!-- Smaller button -->
                                                            <i class="fa-solid fa-magnifying-glass"></i> Search
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <script>
                                                function submitForm() {
                                                    const form = document.getElementById('rent-details-form');
                                                    if (form.checkValidity()) {
                                                        form.submit();
                                                    } else {
                                                        Notiflix.Notify.Failure('Please fill in all required fields correctly.');
                                                    }
                                                }

                                            </script>
                                            <!-- Filter Form End -->
                                        </div>
                                        <div class="row py-4 px-4">
                                            <hr>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                                        <span style="font-size: 40px;"
                                                            class="material-symbols-outlined">flyover</span>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="col-12">Total Distance</div>
                                                        <div id="distance" class="col-12">_</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                                        <span style="font-size: 40px;"
                                                            class="material-symbols-outlined">schedule</span>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="col-12">Estimated Time</div>
                                                        <div id="timetext" class="col-12">_</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-4">
                                    <div id="map"></div>
                                </div>
                            </div>


                        </div>

                        <!-- Rent Details Section Start -->
                        <div class="rent-details mt-4 mb-5 wow fadeInUp" data-wow-delay="0.75s">

                        </div>
                        <!-- Rent Details Section End -->
                    </div>
                    <!-- Hero Content End -->
                </div>
            </div>
        </div>
    </div>


</div>
<!-- Hero Section End -->

<!-- About Us Section Start -->
<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- About Us Image Start -->
                <div class="about-image">
                    <!-- About Image Start -->
                    <div class="about-img-1">
                        <figure class="reveal">
                            <img src="images/about-img-1.jpg" alt="">
                        </figure>
                    </div>
                    <!-- About Image End -->

                    <!-- About Image Start -->
                    <div class="about-img-2">
                        <figure class="reveal">
                            <img src="images/about-img-2.jpg" alt="">
                        </figure>
                    </div>
                    <!-- About Image End -->
                </div>
                <!-- About Us Image End -->
            </div>

            <div class="col-lg-6">
                <!-- About Us Content Start -->
                <div class="about-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">about us</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Your trusted partner in reliable car
                            rental</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">Dedicated to making your journey smooth and
                            worry-free. With a wide range of well-maintained vehicles, transparent pricing, and
                            exceptional customer service, we ensure you have the right car for every adventure.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- About Content Body Start -->
                    <div class="about-content-body">
                        <!-- About Trusted Booking Start -->
                        <div class="about-trusted-booking wow fadeInUp" data-wow-delay="0.5s">
                            <div class="icon-box">
                                <img src="images/icon-about-trusted-1.svg" alt="Easy Booking Process Icon">
                            </div>
                            <div class="trusted-booking-content">
                                <h3>Easy Booking Process</h3>
                                <p>Our streamlined booking platform lets you reserve your vehicle in just a few steps,
                                    ensuring a smooth, secure, and hassle-free experience from start to finish.</p>
                            </div>
                        </div>
                        <!-- About Trusted Booking End -->

                        <!-- About Trusted Booking Start -->
                        <div class="about-trusted-booking wow fadeInUp" data-wow-delay="0.75s">
                            <div class="icon-box">
                                <img src="images/icon-about-trusted-2.svg"
                                    alt="Convenient Pick-Up & Return Process Icon">
                            </div>
                            <div class="trusted-booking-content">
                                <h3>Convenient Pick-Up & Return Process</h3>
                                <p>With multiple pick-up and return options, our service is designed to fit your
                                    schedule, providing a flexible and straightforward process that saves you time and
                                    effort.</p>
                            </div>
                        </div>
                        <!-- About Trusted Booking End -->
                    </div>

                    <!-- About Content Body End -->

                    <!-- About Content Footer Start -->
                    <div class="about-content-footer wow fadeInUp" data-wow-delay="1s">
                        <a href="./contact" class="btn-default">contact us</a>
                    </div>
                    <!-- About Content Footer End -->
                </div>
                <!-- About Us Content End -->
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->

<!-- Our Services Section Start -->
<div class="our-services bg-section">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">our services</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">Explore our wide range of rental services
                    </h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- Service Item Start -->
                <div class="service-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="images/icon-service-1.svg" alt="Car Rental with Driver Icon">
                    </div>
                    <div class="service-content">
                        <h3>Car Rental with Driver</h3>
                        <p>Enjoy a stress-free journey with our professional driver service, ideal for exploring the
                            city or getting to your destination without hassle.</p>
                    </div>
                    <div class="service-footer">
                        <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                alt="More Details Icon"></a>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Service Item Start -->
                <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                    <div class="icon-box">
                        <img src="images/icon-service-2.svg" alt="Business Car Rental Icon">
                    </div>
                    <div class="service-content">
                        <h3>Business Car Rental</h3>
                        <p>Experience top-class business car rentals tailored for corporate travel, ensuring
                            punctuality, comfort, and a smooth experience on the go.</p>
                    </div>
                    <div class="service-footer">
                        <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                alt="More Details Icon"></a>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Service Item Start -->
                <div class="service-item wow fadeInUp" data-wow-delay="0.5s">
                    <div class="icon-box">
                        <img src="images/icon-service-3.svg" alt="Airport Transfer Icon">
                    </div>
                    <div class="service-content">
                        <h3>Airport Transfer</h3>
                        <p>Seamlessly transition from airport to destination with our reliable transfer services,
                            designed for timely pick-ups and drop-offs.</p>
                    </div>
                    <div class="service-footer">
                        <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                alt="More Details Icon"></a>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Service Item Start -->
                <div class="service-item wow fadeInUp" data-wow-delay="0.75s">
                    <div class="icon-box">
                        <img src="images/icon-service-4.svg" alt="Chauffeur Services Icon">
                    </div>
                    <div class="service-content">
                        <h3>Chauffeur Services</h3>
                        <p>Travel in luxury and style with our professional chauffeur services, perfect for both
                            business and leisure trips across the city.</p>
                    </div>
                    <div class="service-footer">
                        <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                alt="More Details Icon"></a>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-lg-12">
                <!-- Service Box Footer Start -->
                <div class="services-box-footer wow fadeInUp" data-wow-delay="1s">
                    <p>Discover our range of car rental services tailored to meet every travel need. From luxury
                        vehicles to flexible rental options, we have the perfect solution for you.</p>
                    <a href="./services" class="btn-default">View All Services</a>
                </div>
                <!-- Service Box Footer End -->
            </div>
        </div>

    </div>
</div>
<!-- Our Services Section End -->

<!-- Perfect Fleets Section Start -->
<div class="perfect-fleet bg-section">
    <div class="container-fluid">
        <div class="row section-row">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">our fleets</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">Explore our perfect and extensive fleet
                    </h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Testimonial Slider Start -->
                <div class="car-details-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper" data-cursor-text="Drag">
                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-1.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>BMW M2 Car 2017</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$280<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                                        alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-2.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>Audi RS7 Car 2016</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$320<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                                        alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-3.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>Ferrari F12 Car 2022</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$450<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#top" class="section-icon-btn"><img
                                                        src="images/arrow-white.svg" alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-4.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>Toyota Yaris 2017</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$220<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                                        alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-2.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>Audi RS7 Car 2016</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$320<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                                        alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-3.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>Ferrari F12 Car 2022</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$450<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                                        alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <!-- Perfect Fleets Item Start -->
                                <div class="perfect-fleet-item">
                                    <!-- Image Box Start -->
                                    <div class="image-box">
                                        <img src="images/perfect-fleet-img-4.png" alt="">
                                    </div>
                                    <!-- Image Box End -->

                                    <!-- Perfect Fleets Content Start -->
                                    <div class="perfect-fleet-content">
                                        <!-- Perfect Fleets Title Start -->
                                        <div class="perfect-fleet-title">
                                            <h3>luxury car</h3>
                                            <h2>Toyota Yaris 2017</h2>
                                        </div>
                                        <!-- Perfect Fleets Content End -->

                                        <!-- Perfect Fleets Body Start -->
                                        <div class="perfect-fleet-body">
                                            <ul>
                                                <li><img src="images/icon-fleet-list-1.svg" alt="">4 passenger
                                                </li>
                                                <li><img src="images/icon-fleet-list-2.svg" alt="">4 door</li>
                                                <li><img src="images/icon-fleet-list-3.svg" alt="">bags</li>
                                                <li><img src="images/icon-fleet-list-4.svg" alt="">auto</li>
                                            </ul>
                                        </div>
                                        <!-- Perfect Fleets Body End -->

                                        <!-- Perfect Fleets Footer Start -->
                                        <div class="perfect-fleet-footer">
                                            <!-- Perfect Fleets Pricing Start -->
                                            <div class="perfect-fleet-pricing">
                                                <h2>$220<span>/day</span></h2>
                                            </div>
                                            <!-- Perfect Fleets Pricing End -->

                                            <!-- Perfect Fleets Btn Start -->
                                            <div class="perfect-fleet-btn">
                                                <a href="#" class="section-icon-btn"><img src="images/arrow-white.svg"
                                                        alt=""></a>
                                            </div>
                                            <!-- Perfect Fleets Btn End -->
                                        </div>
                                        <!-- Perfect Fleets Footer End -->
                                    </div>
                                    <!-- Perfect Fleets Content End -->
                                </div>
                                <!-- Perfect Fleets Item End -->
                            </div>
                            <!-- Testimonial Slide End -->
                        </div>
                        <div class="car-details-btn">
                            <div class="car-button-prev"></div>
                            <div class="car-button-next"></div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Slider End -->
            </div>
        </div>
    </div>
</div>
<!-- Perfect Fleets Section End -->

<!-- Luxury Collection Section Start -->

<!-- Luxury Collection Section End -->

<!-- How It Work Section Start -->
<div class="how-it-work">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- How Work Content Start -->
                <div class="how-work-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">how it work</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Streamlined processes for a hassle-free
                            experience</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">Our streamlined process ensures a seamless
                            car rental experience from start to finish. With easy online booking, flexible pick-up
                            and drop-off options.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- How Work Accordion Start -->
                    <div class="how-work-accordion" id="workaccordion">
                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <div class="icon-box">
                                <img src="images/icon-how-it-work-1.svg" alt="Browse and Select Icon">
                            </div>
                            <h2 class="accordion-header" id="workheading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#workcollapse1" aria-expanded="true" aria-controls="workcollapse1">
                                    Browse and Select
                                </button>
                            </h2>
                            <div id="workcollapse1" class="accordion-collapse collapse show"
                                aria-labelledby="workheading1" data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>Start by browsing our extensive fleet of premium vehicles, designed to suit every
                                        travel need—from sleek sedans to spacious SUVs. Choose the model that fits your
                                        style and requirements, select your preferred pickup and drop-off locations, and
                                        specify the rental period. We make it easy to find exactly what you need with
                                        filters for price, features, and availability, so you can book with confidence.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.75s">
                            <div class="icon-box">
                                <img src="images/icon-how-it-work-2.svg" alt="Book and Confirm Icon">
                            </div>
                            <h2 class="accordion-header" id="workheading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#workcollapse2" aria-expanded="false" aria-controls="workcollapse2">
                                    Book and Confirm
                                </button>
                            </h2>
                            <div id="workcollapse2" class="accordion-collapse collapse" aria-labelledby="workheading2"
                                data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>Once you've selected your vehicle, proceed to booking and confirmation. Enter
                                        your details, add any optional extras like insurance or GPS, and review the
                                        rental agreement. You’ll receive a booking confirmation via email, detailing
                                        your reservation. Our seamless booking process ensures that your vehicle is
                                        ready when you arrive, providing you with peace of mind from start to finish.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="1s">
                            <div class="icon-box">
                                <img src="images/icon-how-it-work-3.svg" alt="Pick Up and Enjoy Icon">
                            </div>
                            <h2 class="accordion-header" id="workheading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#workcollapse3" aria-expanded="false" aria-controls="workcollapse3">
                                    Pick Up and Enjoy
                                </button>
                            </h2>
                            <div id="workcollapse3" class="accordion-collapse collapse" aria-labelledby="workheading3"
                                data-bs-parent="#workaccordion">
                                <div class="accordion-body">
                                    <p>Arrive at the designated location to pick up your vehicle, where our friendly
                                        team will assist with any final details. We perform a quick walkthrough, address
                                        any questions, and hand over the keys, so you're ready to hit the road. Enjoy
                                        your journey with 24/7 roadside assistance and customer support, ensuring a
                                        smooth, enjoyable rental experience from start to finish.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->
                    </div>

                    <!-- How Work Accordion End -->
                </div>
                <!-- How Work Content End -->
            </div>

            <div class="col-lg-6">
                <!-- How Work Image Start -->
                <div class="how-work-image">
                    <!-- How Work Image Start -->
                    <div class="how-work-img">
                        <figure class="reveal">
                            <img src="images/about-img-1.jpg" alt="">
                        </figure>
                    </div>
                    <!-- How Work Image End -->

                    <!-- Trusted Client Start -->
                    <div class="trusted-client">
                        <div class="trusted-client-content">
                            <h3><span class="counter">5</span>m+ Trusted world wide global clients</h3>
                        </div>
                        <div class="trusted-client--image">
                            <img src="images/trusted-client-img.png" alt="">
                        </div>
                    </div>
                    <!-- Trusted Client End -->
                </div>
                <!-- How It Work Image End -->
            </div>
        </div>
    </div>
</div>
<!-- How It Work Section End -->

<!-- Intro Video Section Start -->
<div class="intro-video bg-section parallaxie">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">watch full video</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">Discover the ease and convenience of
                        renting with Us</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Intro Video Box Start -->
                <div class="intro-video-box">
                    <!-- Video Play Button Start -->
                    <div class="video-play-button">
                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video"
                            data-cursor-text="Play">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                    <!-- Video Play Button End -->


                </div>
                <!-- Intro Video Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Intro Video Section End -->

<!-- Why Choose Us Section Start -->
<div class="why-choose-us">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">why choose us</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">Unmatched quality and service for your
                        needs</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 order-lg-1 order-md-1 order-1">
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="images/icon-why-choose-1.svg" alt="">
                    </div>
                    <div class="why-choose-content">
                        <h3>extensive fleet options</h3>
                        <p>Choose from our extensive fleet options, designed to fit every journey and budget.
                        </p>
                    </div>
                </div>
                <!-- Why Choose Item End -->

                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                    <div class="icon-box">
                        <img src="images/icon-why-choose-2.svg" alt="">
                    </div>
                    <div class="why-choose-content">
                        <h3>exceptional customer service</h3>
                        <p>Experience exceptional customer service that goes above and beyond, ensuring your car rental
                            experience is seamless and enjoyable
                        </p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>

            <div class="col-lg-4 col-md-12 order-lg-2 order-md-3 order-2">
                <div class="why-choose-image">
                    <figure class="reveal">
                        <img src="images/why-choose-img.jpg" alt="">
                    </figure>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 order-lg-3 order-md-2 order-3">
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="images/icon-why-choose-3.svg" alt="">
                    </div>
                    <div class="why-choose-content">
                        <h3>convenient locations</h3>
                        <p>Enjoy hassle-free travel with our convenient locations, making car rental easy wherever you
                            go.
                        </p>
                    </div>
                </div>
                <!-- Why Choose Item End -->

                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                    <div class="icon-box">
                        <img src="images/icon-why-choose-4.svg" alt="">
                    </div>
                    <div class="why-choose-content">
                        <h3>reliability and safety</h3>
                        <p>Count on our commitment to reliability and safety, with well-maintained vehicles that provide
                            peace of mind on every journey.
                        </p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Us Section End -->

<!-- Our FAQs Section Start -->
<div class="our-faqs bg-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 order-md-2 order-2">
                <!-- Our Faqs Image Start -->
                <div class="our-faqs-image">
                    <div class="faqs-img-1">
                        <figure class="image-anime">
                            <img src="images/our-faqs-img-1.jpg" alt="">
                        </figure>
                    </div>

                    <div class="faqs-img-2">
                        <figure class="image-anime">
                            <img src="images/our-faqs-img-2.jpg" alt="">
                        </figure>
                    </div>
                </div>
                <!-- Our Faqs Image End -->
            </div>

            <div class="col-lg-6 order-lg-2 order-md-1 order-1">
                <!-- Our Faqs Content Start -->
                <div class="our-faqs-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">frequently asked questions</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Everything you need to know about our
                            services</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Our Faqs Accordion Start -->
                    <div class="our-faqs-accordion" id="faqsaccordion">
                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
                            <h2 class="accordion-header" id="faqheading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqcollapse1" aria-expanded="true" aria-controls="faqcollapse1">
                                    What do I need to rent a car?
                                </button>
                            </h2>
                            <div id="faqcollapse1" class="accordion-collapse collapse show"
                                aria-labelledby="faqheading1" data-bs-parent="#faqsaccordion">
                                <div class="accordion-body">
                                    <p>To rent a car, you'll need a valid driver's license, a credit card in your name,
                                        and a minimum age of 21 (varies by location).</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="faqheading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqcollapse2" aria-expanded="false" aria-controls="faqcollapse2">
                                    How old do I need to be to rent a car?
                                </button>
                            </h2>
                            <div id="faqcollapse2" class="accordion-collapse collapse" aria-labelledby="faqheading2"
                                data-bs-parent="#faqsaccordion">
                                <div class="accordion-body">
                                    <p>In most locations, you must be at least 21 years old to rent a car. Some
                                        locations may require renters to be 25 or older.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->


                        <!-- Additional Dummy FAQs -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="1s">
                            <h2 class="accordion-header" id="faqheading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqcollapse4" aria-expanded="false" aria-controls="faqcollapse4">
                                    Is insurance included with my rental?
                                </button>
                            </h2>
                            <div id="faqcollapse4" class="accordion-collapse collapse" aria-labelledby="faqheading4"
                                data-bs-parent="#faqsaccordion">
                                <div class="accordion-body">
                                    <p>Insurance is not included in the rental price but can be added for an additional
                                        fee. We offer various coverage options.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                    </div>

                    <!-- Our Faqs Accordion End -->
                </div>
                <!-- Our Faqs Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Our FAQs Section End -->

<!-- Our Testiminial Start -->
<div class="our-testimonial">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">testimonials</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">What our customers are saying about us</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Testimonial Slider Start -->
                <div class="testimonial-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper" data-cursor-text="Drag">

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-header">
                                        <div class="testimonial-rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>GotoAirport made my travel stress-free. The car was ready on arrival, and
                                                the service was outstanding. Highly recommend!</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-body">
                                        <div class="author-image">
                                            <figure class="image-anime">
                                                <img src="images/author-5.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="author-content">
                                            <h3>sarah johnson</h3>
                                            <p>marketing specialist</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-header">
                                        <div class="testimonial-rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>My experience with GotoAirport was fantastic. Smooth booking process and
                                                the car was clean and comfortable!</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-body">
                                        <div class="author-image">
                                            <figure class="image-anime">
                                                <img src="images/author-6.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="author-content">
                                            <h3>john smith</h3>
                                            <p>business consultant</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-header">
                                        <div class="testimonial-rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>GotoAirport offered me the best rates and a reliable car. It’s my go-to
                                                for airport rentals now!</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-body">
                                        <div class="author-image">
                                            <figure class="image-anime">
                                                <img src="images/author-7.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="author-content">
                                            <h3>lisa wong</h3>
                                            <p>event coordinator</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-header">
                                        <div class="testimonial-rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Exceptional service from GotoAirport by Ciao Travels! The staff was
                                                friendly, and I felt valued as a customer.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-body">
                                        <div class="author-image">
                                            <figure class="image-anime">
                                                <img src="images/author-8.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="author-content">
                                            <h3>michael brown</h3>
                                            <p>financial advisor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                        </div>
                        <div class="testimonial-btn">
                            <div class="testimonial-button-prev"></div>
                            <div class="testimonial-button-next"></div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial Slider End -->
            </div>
        </div>

    </div>
</div>
<!-- Our Testiminial End -->

<!-- CTA Box Section Start -->
<div class="cta-box bg-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <!-- Cta Box Content Start -->
                <div class="cta-box-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Ready to hit the road? Book your car
                            today !</h2>
                        <p class="wow fadeInUp">Our friendly customer service team is here to help. Contact us
                            anytime for support and inquiries.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Cta Box Btn Start -->
                    <div class="cta-box-btn wow fadeInUp" data-wow-delay="0.5s">
                        <a href="/contact" class="btn-default">contact us</a>
                    </div>
                    <!-- Cta Box Btn End -->
                </div>
                <!-- Cta Box Content End -->
            </div>

            <div class="col-lg-6 col-md-5">
                <!-- Cta Box Image Start -->
                <div class="cat-box-image">
                    <figure>
                        <img src="images/cta-car-img.png" alt="">
                    </figure>
                </div>
                <!-- Cta Box Image End -->
            </div>
        </div>
    </div>
</div>
<!-- CTA Box Section End -->
<br>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var estimated_time = "";
        $('#tripTypeReturn').on('change', function () {
            
            if ($(this).is(':checked')) {
                $('#returnDateTime').slideDown();
                
                const distanceElement = document.getElementById("distance");
                const distanceText = distanceElement.textContent;
                const distanceValue = parseFloat(distanceText);
                const result = distanceValue * 2;
                distanceElement.textContent = result + " km" ;

                estimated_time = document.getElementById("timetext").textContent;
                const timeElement = document.getElementById("timetext");
                timeElement.textContent = "-";

                document.getElementById("returnDate").required = true;
                document.getElementById("returnTime").required = true;

            } else {
                $('#returnDateTime').slideUp();
                const distanceElement = document.getElementById("distance");
                const distanceText = distanceElement.textContent;
                const distanceValue = parseFloat(distanceText);
                const result = distanceValue / 2;
                distanceElement.textContent = result + " km" ;

                const timeElement = document.getElementById("timetext");
                timeElement.textContent = estimated_time;

                document.getElementById("returnDate").required = false;
                document.getElementById("returnTime").required = false;

            }
        });
    });

    let map, directionsService, directionsRenderer;
    let fromAutocomplete, toAutocomplete;
    let fromPlaceSelected = false;

    function initMap() {
        // Default location (Sydney, Australia)
        const defaultLocation = {
            lat: 43.7700,
            lng: 11.2577
        };

        // Initialize the map centered at the default location
        map = new google.maps.Map(document.getElementById('map'), {
            center: defaultLocation,
            disableDefaultUI: true,
            zoom: 13
        });

        // Initialize DirectionsService and DirectionsRenderer
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        // Initialize the Autocomplete widgets for both input fields
        fromAutocomplete = new google.maps.places.Autocomplete(document.getElementById('from'));
        toAutocomplete = new google.maps.places.Autocomplete(document.getElementById('to'));

        // Add listener for the 'From' field (First input field)
        fromAutocomplete.addListener('place_changed', function () {
            fromPlaceSelected = true;
            if (fromPlaceSelected && toAutocomplete.getPlace()) {
                drawPath(); // Call drawPath when the second location is selected
            }
        });

        // Add listener for the 'To' field (Second input field)
        toAutocomplete.addListener('place_changed', function () {
            if (fromPlaceSelected && toAutocomplete.getPlace()) {
                drawPath(); // Trigger the route drawing if both locations are selected
            }
        });
    }

    function drawPath() {
        const fromPlace = fromAutocomplete.getPlace();
        const toPlace = toAutocomplete.getPlace();

        if (!fromPlace || !fromPlace.geometry || !toPlace || !toPlace.geometry) {
            alert("Please select valid locations for both 'From' and 'To' fields.");
            return;
        }

        // Get the start and end coordinates
        const fromLocation = fromPlace.geometry.location;
        const toLocation = toPlace.geometry.location;

        // Request the directions service to calculate the route
        const request = {
            origin: fromLocation,
            destination: toLocation,
            travelMode: google.maps.TravelMode.DRIVING // You can change to WALKING, BICYCLING, TRANSIT
        };

        directionsService.route(request, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(result);

                const route = result.routes[0].legs[0];
                const fromLat = route.start_location.lat();
                const fromLng = route.start_location.lng();
                const toLat = route.end_location.lat();
                const toLng = route.end_location.lng();

                console.log("From Coordinates: Latitude " + fromLat + ", Longitude " + fromLng);
                console.log("To Coordinates: Latitude " + toLat + ", Longitude " + toLng);

                // Get the distance and display it in km
                const distanceInMeters = route.distance.value; // Distance in meters
                const distanceInKm = (distanceInMeters / 1000).toFixed(
                    2); // Convert to km and round to 2 decimals

                const durationInSeconds = route.duration.value; // Duration in seconds
                const durationText = route.duration.text; // Readable format of the duration
                console.log(durationText);
                document.getElementById('timetext').innerText = durationText;

                document.getElementById('distance').innerText = distanceInKm + " km";

                const fromCoordinates = `${fromLat},${fromLng}`;
                const toCoordinates = `${toLat},${toLng}`;
                document.querySelector('input[name="pickup_cordinates"]').value = fromCoordinates;
                document.querySelector('input[name="dropoff_cordinates"]').value = toCoordinates;
                document.querySelector('input[name="no_of_km"]').value = distanceInKm;

                // alert("Path drawn! Coordinates: \nFrom: Lat: " + fromLat + ", Lng: " + fromLng + "\nTo: Lat: " + toLat + ", Lng: " + toLng + "\nDistance: " + distanceInKm + " km");
            } else {
                alert("Directions request failed due to " + status);
            }
        });
    }

    window.onload = initMap;
</script>

<style>
    #map {
        height: 100%;
        min-height :500px;
        max-width: 1440px;
        border-radius: 30px;
    }
</style>
@endsection