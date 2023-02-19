@extends('Public.Layout.layout')
@section('content')
    <section class="about-section">
        <div class="container container-custom">
            <div class="row space">
                @foreach($data['blocks'] as $block)
                <div class="col-md-4">
                    <div class="service-thumbnail services-top-icon services-top-icon2 {{$block->color}} d-flex flex-fill">
                        <img src="/Public/images/{{$block->icon}}" class="img-fluid" alt="#">
                        <div class="service-thumbnail_text">
                            <h4>{{$block->header}}</h4>
                            <p>{{$block->paragraph}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
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
                        <a href="#" class="btn btn-success">Randevu Al</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Counter -->







@endsection
