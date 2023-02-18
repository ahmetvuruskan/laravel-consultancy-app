@include("Public.Layout.slider")
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/Public/css/all.css">

    <link rel="stylesheet" href="/Public/css/slick.css">
    <link rel="stylesheet" href="/Public/css/slick-theme.css">

    <link rel="stylesheet" href="/Public/css/magnific-popup.css" />

    <link rel="stylesheet" href="/Public/css/style.css">
    <title>{{$title}}</title>
</head>

<body>
<!--==================== Header ====================-->
<!-- top bar -->
<section class="top-bar-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-bar">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <a class="navbar-brand" href="index.html"><img @w(300) src="@fileRoute{{$logo}}" alt="#"></a>
                        </div>
                        <div class="col-md-9 d-flex align-items-end">
                            <ul class="ml-auto">
                                <li>
                                    <img src="/Public/images/mail-icon.png" alt="#">
                                    <div>
                                        <span>Mail </span>
                                        <h4>{{$mail}}</h4>
                                    </div>
                                </li>
                                <li>
                                    <img src="/Public/images/call-icon.png" alt="#">
                                    <div>
                                        <span>Telefon</span>
                                        <h4>{{$phone_sabit}}</h4>
                                    </div>
                                </li>
                                <li class="appointment-btn">
                                    <a href="#" class="btn btn-primary">Randevu Al</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//End top bar -->
<div class="light nav-big">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Nav menu -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto nav-sub">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{route("frontend.index")}}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                                    Anasayfa <i class="fas fa-plus"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Department <i class="fas fa-plus"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="services.html">Dental Care</a>
                                    <a class="dropdown-item" href="services-2.html">Cardiology</a>
                                    <a class="dropdown-item" href="services-3.html">Neurology </a>
                                    <a class="dropdown-item" href="services-detail.html">Eye Care</a>
                                </div>
                            </li>
                            <!-- Sub Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Patients <i class="fas fa-plus"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                        <a class="dropdown-item dropdown-toggle" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false" href="#">Services <i class="fas fa-plus"></i></a>
                                        <ul class="dropdown-menu dropdown-menu1">
                                            <li><a class="dropdown-item" href="services.html">Services
                                                    One</a></li>
                                            <li><a class="dropdown-item" href="services-2.html">Services
                                                    Two</a></li>
                                            <li><a class="dropdown-item" href="services-3.html">Services
                                                    Three</a></li>
                                            <li><a class="dropdown-item" href="services-detail.html">Service
                                                    Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="appointment.html">Appointment</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item dropdown-toggle" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false" href="#">Our Doctors <i class="fas fa-plus"></i></a>
                                        <ul class="dropdown-menu dropdown-menu1">
                                            <li><a class="dropdown-item" href="doctors.html">Doctors One</a></li>
                                            <li><a class="dropdown-item" href="doctors-2.html">Doctors Two</a></li>
                                            <li><a class="dropdown-item" href="doctors-3.html">Doctors Three</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="pricing.html">Pricing</a>
                                    </li>
                                </ul>
                            </li>
                            <!--//End Sub Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false"> Blog <i class="fas fa-plus"></i> </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="blog-standard.html">Blog Stadared</a>
                                    <a class="dropdown-item" href="blog-list.html">Blog List</a>
                                    <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>
                                    <a class="dropdown-item" href="blog-grid-2.html">Blog Grid-2</a>
                                    <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages <i class="fas fa-plus"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="about.html">About</a>
                                    <a class="dropdown-item" href="contact-us.html">Contact One</a>
                                    <a class="dropdown-item" href="contact-us-2.html">Contact Two</a>
                                    <a class="dropdown-item" href="error.html">Error 404</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav-icon-wrap">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li class="nav-item cart-seperate">
                                <a class="nav-link" href="#"><i class="fas fa-shopping-cart fa-top-search"></i> <span>2</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-bars"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--//End Nav menu -->
            </div>
        </div>
    </div>
</div>
@yield('slider')
<!--//End Header -->
<!--==================== About Section ====================-->
@yield('content')
<!--==================== Footer ====================-->
<footer>
    <div class="container container-custom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="foot-contact-block">
                    <img src="/Public/images/foot-logo.png" class="img-fluid" alt="#" />
                    <p>
                        Lorem ipsum dolor sit amet, consect <br /> etur adipisicing elit, sed do eius mod <br />
                        tempor incididunt ut labore et dolore<br /> magna aliqua. Ut enim ad minim
                    </p>
                    <a href="tel:31234567890">
                        <h4><i class="fas fa-phone"></i>3123 456 7890</h4>
                    </a>
                    <a href="mailto:info@mededin.com">
                        <h4><i class="far fa-envelope"></i>info@mededin.com</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-1">
                <div class="foot-link-box">
                    <h4>Quick Links</h4>
                    <ul>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>About Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Our Mission</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Our Services</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Blogs & News</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Faq</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="foot-link-box">
                    <h4>Our Services</h4>
                    <ul>
                        @foreach($data['professions'] as $package)
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>{{$package->profession_type}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1">
                <div class="foot-link-box footlink-box_btn">
                    <a href="#" class="btn btn-outline-success">Find a Doctor</a>
                    <a href="#" class="btn btn-outline-success">Career</a>
                    <a href="#" class="btn btn-outline-success">Newsletter</a>
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>© Medenin 2020 Allright Reserved</p>
                    <a href="#" id="scroll"><i class="fas fa-angle-double-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/Public/js/jquery-3.5.1.min.js"></script>
<script src="/Public/js/popper.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/slick.min.js"></script>
<script src="/Public/js/jquery.magnific-popup.min.js"></script>
<script src="/Public/js/script.js"></script>
</body>

</html>
