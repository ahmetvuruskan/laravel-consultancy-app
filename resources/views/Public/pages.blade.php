@extends('Public.layout')
@section('content')
    <!-- Sub header -->
    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_content">
                        <p>ABOUT US</p>
                        <h3>Lorem ipsum dolor sit ametco nse<br> ctetur adipisicing elitsed.</h3>
                        <span><i>Home / About Us</i></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sub-header_main">
                        <h2>About us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section space-mt">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <!-- About -->
                    <div class="about-video_block">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <a href="https://www.youtube.com/watch?v=pBFQdxA-apI" class="video-play-img popup-youtube">
                                    <img src="images/about-img.jpg" class="img-fluid w-100" alt="#" />
                                    <div class="video-play-btn">
                                        <div class="video-play-icon">
                                            <i class="fas fa-play"></i>
                                        </div>
                                        <span>PLAY VIDEO</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="video-play-text">
                                    <h2>Short Story About Mededin Clinic.</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                                    </p>
                                    <p>
                                        Sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostru
                                        <a href="#">Readmore</a>
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
                    <!--//End About -->
                </div>
            </div>
        </div>
    </section>
    <!--//End About Section -->
    <!--==================== News ====================-->
    <section class="space-mb">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="video-play-text">
                        <span>Who we are -----</span>
                        <h2>We Have Advanced Technologies</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <hr />
                        <div class="newsletter-subscribe">
                            <h4>Subscribe to our Newsletter</h4>
                            <div class="newsletter-subscribe_form">
                                <input type="text" class="form-control" placeholder="Enter Your Email" />
                                <a href="#"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="news-img-block">
                        <img src="images/play-img.png" class="img-fluid" alt="#" />
                        <a class="video-play-button popup-youtube" href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                            <span></span>
                        </a>
                        <div id="video-overlay" class="video-overlay">
                            <a class="video-overlay-close">&times;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-4">
                    <div class="mission-wrap">
                        <h3>Our Mission</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor incid idunt ut labore et dolore magna aliqua.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mission-wrap">
                        <h3>Our Vision</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor incid idunt ut labore et dolore magna aliqua.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mission-wrap">
                        <h3>Our Values</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor incid idunt ut labore et dolore magna aliqua.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
