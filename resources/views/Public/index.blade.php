@extends('Public.Layout.layout')
@section('content')
    <section class="about-section">
        <div class="container container-custom">
            <div class="row space">
                <!-- Service Icon -->
                <div class="col-md-4">
                    <div class="service-thumbnail services-top-icon services-top-icon2 blue d-flex flex-fill">
                        <img src="/Public/images/service-icon8.png" class="img-fluid" alt="#">
                        <div class="service-thumbnail_text">
                            <h4>Specialised Service</h4>
                            <p>Lorem ipsum dolor sit</p>
                        </div>
                    </div>
                </div>
                <!-- Service Icon 02 -->
                <div class="col-md-4">
                    <div class="service-thumbnail services-top-icon services-top-icon2 green d-flex flex-fill">
                        <img src="/Public/images/service-icon9.png" class="img-fluid" alt="#">
                        <div class="service-thumbnail_text">
                            <h4>24/7 Advanced Care</h4>
                            <p>Lorem ipsum dolor sit</p>
                        </div>
                    </div>
                </div>
                <!-- Service Icon 03 -->
                <div class="col-md-4">
                    <div class="service-thumbnail services-top-icon services-top-icon2 yellow d-flex flex-fill">
                        <img src="/Public/images/service-icon10.png" class="img-fluid" alt="#">
                        <div class="service-thumbnail_text">
                            <h4>Get Result Online</h4>
                            <p>Lorem ipsum dolor sit</p>
                        </div>
                    </div>
                </div>
                <!--//End Service Icon -->
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="news-img-block">
                        <img src="/Public/images/play-img.png" class="img-fluid w-100" alt="#" />
                        <!-- <a href="https://www.youtube.com/watch?v=pBFQdxA-apI" class="play-btn popup-youtube"><i class="fas fa-play"></i></a> -->
                        <a class="video-play-button popup-youtube" href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                            <span></span>
                        </a>

                        <div id="video-overlay" class="video-overlay">
                            <a class="video-overlay-close">&times;</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="video-play-text">
                        <h2>Short Story About Mededin Clinic.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        <p>Sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostru <a href="#">Readmore</a>
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="facilities blue">
                                    <h3>1000+</h3>
                                    <span>Happy Patients</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="facilities green">
                                    <h3>215+</h3>
                                    <span>Expert Doctors</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="facilities yellow">
                                    <h3>315+</h3>
                                    <span>Hospital Rooms</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="facilities gray">
                                    <h3>106+</h3>
                                    <span>Award Winner</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End About Section -->
    <!--==================== Our Services ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-style1">
                        <span>Our Services</span>
                        <h2>High Quality Services for You</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex flex-fill flex-column">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            <div class="service-detail-svg-block primary-color">
                                <img src="/Public/images/009-teeth.svg" alt="#">
                            </div>
                            <h2>01</h2>
                        </div>
                        <h3>Dental Care</h3>
                        <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore t dolore secus</p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex flex-fill flex-column">
                    <div class="service-detail_box secondary-color-br">
                        <div class="service-detail-icon">
                            <div class="service-detail-svg-block secondary-color">
                                <img src="/Public/images/009-teeth.svg" alt="#">
                            </div>
                            <h2>02</h2>
                        </div>
                        <h3>Eye Care</h3>
                        <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore t dolore secus</p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex flex-fill flex-column">
                    <div class="service-detail_box tertiary-color-br">
                        <div class="service-detail-icon">
                            <div class="service-detail-svg-block tertiary-color">
                                <img src="/Public/images/009-teeth.svg" alt="#">
                            </div>
                            <h2>03</h2>
                        </div>
                        <h3>Allergic Issues</h3>
                        <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore t dolore secus</p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex flex-fill flex-column">
                    <div class="service-detail_box quaternary-color-br">
                        <div class="service-detail-icon">
                            <div class="service-detail-svg-block quaternary-color">
                                <img src="/Public/images/009-teeth.svg" alt="#">
                            </div>
                            <h2>04</h2>
                        </div>
                        <h3>Orthopedic</h3>
                        <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore t dolore secus</p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Our Services -->
    <!--==================== Appointment ====================-->
    <section class="space background-bg4">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="appointment-form_wrap">
                        <div class="heading-style1">
                            <span>Online Booking</span>
                            <h2>Make an Appointment</h2>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-cutom">
                                        <input type="email" class="form-control form-custom" placeholder="Enter Your Name">
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-cutom">
                                        <input type="number" class="form-control form-custom" placeholder="Date and time">
                                        <i class="far fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-cutom">
                                        <input type="number" class="form-control form-custom" placeholder="Enter phone number">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-cutom">
                                        <input type="text" class="form-control form-custom" placeholder="Select location">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-cutom">
                                        <input type="text" class="form-control form-custom" placeholder="Choose department">
                                        <i class="far fa-circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-cutom">
                                        <input type="text" class="form-control form-custom" placeholder="Select doctor">
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-cutom">
                                        <label for="exampleFormControlTextarea1">Your Message</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-success">BOOK NOW</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="why-choose_block">
                        <div class="heading-style1 mb-0">
                            <span>Why Us</span>
                            <h2>Why Choose Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing <br> elit, sed do eius mod tempor inc ididuntut</p>
                            <hr>
                        </div>
                        <div class="whychoose-wrap">
                            <img src="/Public/images/icon1.png" alt="#">
                            <div class="whychoose-text_block">
                                <h4>Fastest Growing Clinic</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, su</p>
                            </div>
                        </div>
                        <div class="whychoose-wrap">
                            <img src="/Public/images/icon2.png" alt="#">
                            <div class="whychoose-text_block">
                                <h4>Free Ambulance Servcice</h4>
                                <p>Ut enim ad minim veniam, quis nostrud exercitati</p>
                            </div>
                        </div>
                        <div class="whychoose-wrap">
                            <img src="/Public/images/icon3.png" alt="#">
                            <div class="whychoose-text_block">
                                <h4>24/7 Working Time</h4>
                                <p>Duis aute irure dolor in repr ehenderit in voluptate.</p>
                            </div>
                        </div>
                        <div class="whychoose-wrap mb-0">
                            <img src="/Public/images/icon4.png" alt="#">
                            <div class="whychoose-text_block">
                                <h4>5 Star Customer Rating </h4>
                                <p>Excepteur sint occaecat cupidatat non proident,</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Appointment -->
    <!--==================== Our Team ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        <span>---- Our Team ----</span>
                        <h2>Our Dedicated Doctors</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="our-team-slider">
                        <div class="doctors-box3">
                            <img src="/Public/images/doctors-img1.jpg" class="img-fluid" alt="#">
                            <div class="doctors-plus-icon"><i class="fas fa-plus"></i></div>
                            <h4>Dr. Mary Joe</h4>
                            <p>SURGEON</p>
                        </div>

                        <div class="doctors-box3">
                            <img src="/Public/images/doctors-img2.jpg" class="img-fluid" alt="#">
                            <div class="doctors-plus-icon"><i class="fas fa-plus"></i></div>
                            <h4>Dr. Mary Joe</h4>
                            <p>SURGEON</p>
                        </div>

                        <div class="doctors-box3">
                            <img src="/Public/images/doctors-img3.jpg" class="img-fluid" alt="#">
                            <div class="doctors-plus-icon"><i class="fas fa-plus"></i></div>
                            <h4>Dr. Mary Joe</h4>
                            <p>SURGEON</p>
                        </div>


                        <div class="doctors-box3">
                            <img src="/Public/images/doctors-img4.jpg" class="img-fluid" alt="#">
                            <div class="doctors-plus-icon"><i class="fas fa-plus"></i></div>
                            <h4>Dr. Mary Joe</h4>
                            <p>SURGEON</p>
                        </div>
                        <div class="doctors-box3">
                            <img src="/Public/images/doctors-img4.jpg" class="img-fluid" alt="#">
                            <div class="doctors-plus-icon"><i class="fas fa-plus"></i></div>
                            <h4>Dr. Mary Joe</h4>
                            <p>SURGEON</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End  Our Team -->
    <!--==================== Emergency ====================-->
    <section class="emergency">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-7 offset-md-5 col-lg-5 offset-lg-7">
                    <div class="emergency-box">
                        <h2>Emergency? Contact Us Now.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore</p>
                        <div class="emergency-block">
                            <i class="fas fa-phone-volume"></i>
                            <div class="emergency-text">
                                <p>Happy Patients</p>
                                <h4>+123 456 7890</h4>
                            </div>
                        </div>
                        <div class="emergency-block">
                            <i class="far fa-envelope-open yellow-bg"></i>
                            <div class="emergency-text">
                                <p>Happy Patients</p>
                                <h4>+123 456 7890</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Emergency -->
    <!--==================== Testimonials ====================-->
    <section class="testimonial">
        <div class="container container-custom">
            <div class="col-md-12">
                <div class="heading-style1">
                    <span>Testimonials</span>
                    <h2>What Our Clients Say</h2>
                </div>
                <div class="testi-slider">
                    <div class="testimonial-wrap">
                        <img src="/Public/images/testi-img1.jpg" class="img-fluid testi-img-icon" alt="#" />
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p>
                            <span>L</span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <span class="testi-name">Mary Jane (ceo)</span>
                        <div class="testi-styled-bg">
                            <img src="/Public/images/testi-side-img_05.png" class="img-fluid" alt="#" />
                        </div>
                    </div>
                    <div class="testimonial-wrap quaternary-br-color">
                        <img src="/Public/images/testi-img2.jpg" class="img-fluid testi-img-icon" alt="#" />
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p>
                            <span>L</span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <span class="testi-name">Mary Jane (ceo)</span>
                        <div class="testi-styled-bg">
                            <img src="/Public/images/testi-side-img_05.png" class="img-fluid" alt="#" />
                        </div>
                    </div>
                    <div class="testimonial-wrap">
                        <img src="/Public/images/testi-img1.jpg" class="img-fluid testi-img-icon" alt="#" />
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p>
                            <span>L</span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <span class="testi-name">Mary Jane (ceo)</span>
                        <div class="testi-styled-bg">
                            <img src="/Public/images/testi-side-img_05.png" class="img-fluid" alt="#" />
                        </div>
                    </div>
                    <div class="testimonial-wrap quaternary-br-color">
                        <img src="/Public/images/testi-img2.jpg" class="img-fluid testi-img-icon" alt="#" />
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p>
                            <span>L</span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <span class="testi-name">Mary Jane (ceo)</span>
                        <div class="testi-styled-bg">
                            <img src="/Public/images/testi-side-img_05.png" class="img-fluid" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Testimonials -->
    <!--==================== Blog Grid ====================-->
    <section class="space light">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-style1">
                        <span>Blog ----</span>
                        <h2>Latest News & Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider blog-slider">
                        <div class="blog-grid-wrap">
                            <div class="blog-grid-img">
                                <img src="/Public/images/blog-grid1.jpg" class="img-fluid" alt="#">
                                <div class="blog-grid-date">
                                    <h5>25</h5>
                                    <p>May</p>
                                </div>
                            </div>
                            <div class="blog-grid_content">
                                <div class="blog-grid-top_icon">
                                    <label>Mediacal</label>
                                    <p><i class="far fa-eye"></i>233 <span>|</span> <i class="far fa-comment"></i>33</p>
                                </div>
                                <div class="blog-grid_text">
                                    <a href="#">
                                        <h4>Telemedicine overprescribes antibiotics: Are you real...</h4>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor </p>
                                </div>
                            </div>
                        </div>

                        <div class="blog-grid-wrap">
                            <div class="blog-grid-img">
                                <img src="/Public/images/blog-grid2.jpg" class="img-fluid" alt="#">
                                <div class="blog-grid-date">
                                    <h5>15</h5>
                                    <p>Jan</p>
                                </div>
                            </div>
                            <div class="blog-grid_content">
                                <div class="blog-grid-top_icon">
                                    <label>Mediacal</label>
                                    <p><i class="far fa-eye"></i>233 <span>|</span> <i class="far fa-comment"></i>33</p>
                                </div>
                                <div class="blog-grid_text">
                                    <a href="#">
                                        <h4>How often should I replace my toothbrush?..</h4>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor </p>
                                </div>
                            </div>
                        </div>

                        <div class="blog-grid-wrap">
                            <div class="blog-grid-img">
                                <img src="/Public/images/blog-grid3.jpg" class="img-fluid" alt="#">
                                <div class="blog-grid-date">
                                    <h5>05</h5>
                                    <p>Jun</p>
                                </div>
                            </div>
                            <div class="blog-grid_content">
                                <div class="blog-grid-top_icon">
                                    <label>Mediacal</label>
                                    <p><i class="far fa-eye"></i>233 <span>|</span> <i class="far fa-comment"></i>33</p>
                                </div>
                                <div class="blog-grid_text">
                                    <a href="#">
                                        <h4>Things you may not know about medicaid dental...</h4>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor </p>
                                </div>
                            </div>
                        </div>
                        <div class="blog-grid-wrap">
                            <div class="blog-grid-img">
                                <img src="/Public/images/blog-grid4.jpg" class="img-fluid" alt="#">
                                <div class="blog-grid-date">
                                    <h5>26</h5>
                                    <p>May</p>
                                </div>
                            </div>
                            <div class="blog-grid_content">
                                <div class="blog-grid-top_icon">
                                    <label>Mediacal</label>
                                    <p><i class="far fa-eye"></i>233 <span>|</span> <i class="far fa-comment"></i>233</p>
                                </div>
                                <div class="blog-grid_text">
                                    <a href="#">
                                        <h4>Telemedicine overprescribes antibiotics: Are you real...</h4>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Blog Grid -->
    <!--==================== Counter ====================-->
    <section class="counter">
        <div class="container container-custom">
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="counter-block">
                        <img src="/Public/images/counter1.png" alt="#">
                        <div class="counter-text">
                            <h2>60+</h2>
                            <p>Expert Doctors</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="counter-block">
                        <img src="/Public/images/counter2.png" alt="#">
                        <div class="counter-text">
                            <h2>1000+</h2>
                            <p>Happy Patients</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="counter-block">
                        <img src="/Public/images/counter3.png" alt="#">
                        <div class="counter-text">
                            <h2>150+</h2>
                            <p>Award Winner</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-end">
                    <div class="counter-btn_block">
                        <a href="#" class="btn btn-success">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Counter -->







@endsection
