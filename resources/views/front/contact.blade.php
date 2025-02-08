
@extends('front.layouts.master')
@section('content')

    <!-- Page Header Start -->
	<div class="page-header bg-section parallaxie">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">Contact Us</h1>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="contact-info-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Contact Information Start -->
                        <div class="contact-information">
                            <!-- Contact Information Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Contact information</h2>
                                <p>Say something to start a chat!</p>
                            </div>
                            <!-- Contact Information Title End -->
    
                            <!-- Contact Information List Start -->
                            <div class="contact-info-list">
                                <!-- Contact Info Item Start -->
                                <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <img src="images/icon-phone.svg" alt="">
                                    </div>
                                    <!-- Icon Box End -->
    
                                    <!-- Contact Info Content Start -->
                                    <div class="contact-info-content">
                                        <p>0454158040</p>
                                    </div>
                                    <!-- Contact Info Content End -->
                                </div>
                                <!-- Contact Info Item End -->
    
                                <!-- Contact Info Item Start -->
                                <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <img src="images/icon-mail.svg" alt="">
                                    </div>
                                    <!-- Icon Box End -->
    
                                    <!-- Contact Info Content Start -->
                                    <div class="contact-info-content">
                                        <p>info@gotoairport.it</p>
                                    </div>
                                    <!-- Contact Info Content End -->
                                </div>
                                <!-- Contact Info Item End -->
    
                                <!-- Contact Info Item Start -->
                                <div class="contact-info-item wow fadeInUp" data-wow-delay="0.75s">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <img src="images/icon-location.svg" alt="">
                                    </div>
                                    <!-- Icon Box End -->
    
                                    <!-- Contact Info Content Start -->
                                    <div class="contact-info-content">
                                        <p>Piazza Nikolajewka, 3</p>
                                    </div>
                                    <!-- Contact Info Content End -->
                                </div>
                                <!-- Contact Info Item End -->
                            </div>
                            <!-- Contact Information List End -->
    
                            <!-- Contact Information Social Start -->
                            <div class="contact-info-social wow fadeInUp" data-wow-delay="0.5s">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>                                                                
                                </ul>
                            </div>
                            <!-- Contact Information Social End -->
                        </div>
                        <!-- Contact Information End -->
                    </div>
    
                    <div class="col-lg-6">
                        <!-- Contact Form Start -->
                        <div class="contact-us-form">
                            <form id="contactForm" action="#" method="POST" class="wow fadeInUp" data-wow-delay="0.5s">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <label>first name</label>
                                        <input type="text" name="name" class="form-control" id="fname" placeholder="Enter Your Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
    
                                    <div class="form-group col-md-6 mb-4">
                                        <label>last name</label>
                                        <input type="text" name="name" class="form-control" id="lname" placeholder="Enter Your Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
    
                                    <div class="form-group col-md-6 mb-4">
                                        <label>email</label>
                                        <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
    
                                    <div class="form-group col-md-6 mb-4">
                                        <label>phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your Number" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
    
                                    <div class="form-group col-md-12 mb-4">
                                        <label>message</label>
                                        <textarea name="msg" class="form-control" id="msg" rows="4" placeholder="Write Your Message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="contact-form-btn">
                                            <button type="submit" class="btn-default">send message</button>
                                            <div id="msgSubmit" class="h3 hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Start -->
	<div class="google-map">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">location</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">How to reach our location</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map Iframe Start -->
                    <div class="google-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map Iframe End -->
                </div>
            </div>
        </div>
    </div>
	<!-- Google Map End -->

    @endsection

    @section('script') 
    <script>
        $(document).ready(function() {
            $('#contactForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission
        
                // Gather form data
                let formData = {
                    fname: $('#fname').val(),
                    lname: $('#lname').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    msg: $('#msg').val(),
                    _token: $('input[name="_token"]').val() // CSRF token
                };
        
                // Validate form data
                if (!formData.fname || !formData.lname || !formData.email || !formData.phone || !formData.msg) {
                    alert('Please fill out all required fields.');
                    return;
                }
        
                // Send form data using Axios
                axios.post('/submit-contact', formData)
                    .then(function(response) {
                        if (response.data.success) {
                            alert('Your message has been sent successfully!');
                            $('#contactForm')[0].reset(); // Reset form fields
                        }
                    })
                    .catch(function(error) {
                        console.error('There was an error!', error);
                        alert('There was an error submitting your message. Please try again.');
                    });
            });
        });
        </script>           

    @endsection