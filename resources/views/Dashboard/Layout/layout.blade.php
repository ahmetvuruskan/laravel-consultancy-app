<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>
        @hasSection('title')
            @yield('title')
        @else
        {{$title}}
        @endif
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
    <link href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="assets/images/{{$logo}}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            @yield('page-title')
                        </div>
                    </div>
                    <ul class="navbar-nav header-right">

                        <li class="nav-item dropdown notification_dropdown">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                <img src="assets/images/profile/17.jpg" width="20" alt=""/>
                                 <div class="header-info">
                                    <span class="text-black"><strong>{{\Illuminate\Support\Facades\Auth::user()->name." ".\Illuminate\Support\Facades\Auth::user()->surname}}</strong></span>
                                    <p class="fs-12 mb-0">{{strtoupper(\Illuminate\Support\Facades\Auth::user()->role)}}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="assets/assets/app-profile.html" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ml-2">Profil </span>
                                </a>
                                <a href="{{route("logout")}}" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ml-2">Çıkış Yap </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <a href="javascript:void(0)" class="add-menu-sidebar" data-toggle="modal" data-target="#addOrderModalside" >+ New Event</a>
            <ul class="metismenu" id="menu">
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><a href="event.html">Event</a></li>
                        <li><a href="event-detail.html">Event Detail</a></li>
                        <li><a href="customers.html">Customers</a></li>
                        <li><a href="analytics.html">Analytics</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Apps</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="assets/app-profile.html">Profile</a></li>
                        <li><a href="assets/post-details.html">Post Details</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                            <ul aria-expanded="false">
                                <li><a href="assets/email-compose.html">Compose</a></li>
                                <li><a href="assets/email-inbox.html">Inbox</a></li>
                                <li><a href="assets/email-read.html">Read</a></li>
                            </ul>
                        </li>
                        <li><a href="assets/app-calender.html">Calendar</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                            <ul aria-expanded="false">
                                <li><a href="assets/ecom-product-grid.html">Product Grid</a></li>
                                <li><a href="assets/ecom-product-list.html">Product List</a></li>
                                <li><a href="assets/ecom-product-detail.html">Product Details</a></li>
                                <li><a href="assets/ecom-product-order.html">Order</a></li>
                                <li><a href="assets/ecom-checkout.html">Checkout</a></li>
                                <li><a href="assets/ecom-invoice.html">Invoice</a></li>
                                <li><a href="assets/ecom-customers.html">Customers</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-controls-3"></i>
                        <span class="nav-text">Charts</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="assets/chart-flot.html">Flot</a></li>
                        <li><a href="assets/chart-morris.html">Morris</a></li>
                        <li><a href="assets/chart-chartjs.html">Chartjs</a></li>
                        <li><a href="assets/chart-chartist.html">Chartist</a></li>
                        <li><a href="assets/chart-sparkline.html">Sparkline</a></li>
                        <li><a href="assets/chart-peity.html">Peity</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-internet"></i>
                        <span class="nav-text">Bootstrap</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="assets/ui-accordion.html">Accordion</a></li>
                        <li><a href="assets/ui-alert.html">Alert</a></li>
                        <li><a href="assets/ui-badge.html">Badge</a></li>
                        <li><a href="assets/ui-button.html">Button</a></li>
                        <li><a href="assets/ui-modal.html">Modal</a></li>
                        <li><a href="assets/ui-button-group.html">Button Group</a></li>
                        <li><a href="assets/ui-list-group.html">List Group</a></li>
                        <li><a href="assets/ui-media-object.html">Media Object</a></li>
                        <li><a href="assets/ui-card.html">Cards</a></li>
                        <li><a href="assets/ui-carousel.html">Carousel</a></li>
                        <li><a href="assets/ui-dropdown.html">Dropdown</a></li>
                        <li><a href="assets/ui-popover.html">Popover</a></li>
                        <li><a href="assets/ui-progressbar.html">Progressbar</a></li>
                        <li><a href="assets/ui-tab.html">Tab</a></li>
                        <li><a href="assets/ui-typography.html">Typography</a></li>
                        <li><a href="assets/ui-pagination.html">Pagination</a></li>
                        <li><a href="assets/ui-grid.html">Grid</a></li>

                    </ul>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-heart"></i>
                        <span class="nav-text">Plugins</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="assets/uc-select2.html">Select 2</a></li>
                        <li><a href="assets/uc-nestable.html">Nestedable</a></li>
                        <li><a href="assets/uc-noui-slider.html">Noui Slider</a></li>
                        <li><a href="assets/uc-sweetalert.html">Sweet Alert</a></li>
                        <li><a href="assets/uc-toastr.html">Toastr</a></li>
                        <li><a href="assets/map-jqvmap.html">Jqv Map</a></li>
                        <li><a href="assets/uc-lightgallery.html">Lightgallery</a></li>
                    </ul>
                </li>
                <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Widget</span>
                    </a>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-notepad"></i>
                        <span class="nav-text">Forms</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="assets/form-element.html">Form Elements</a></li>
                        <li><a href="assets/form-wizard.html">Wizard</a></li>
                        <li><a href="assets/form-editor-summernote.html">Summernote</a></li>
                        <li><a href="form-pickers.html">Pickers</a></li>
                        <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-network"></i>
                        <span class="nav-text">Table</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                        <li><a href="table-datatable-basic.html">Datatable</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">Pages</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="assets/page-register.html">Register</a></li>
                        <li><a href="assets/page-login.html">Login</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                            <ul aria-expanded="false">
                                <li><a href="assets/page-error-400.html">Error 400</a></li>
                                <li><a href="assets/page-error-403.html">Error 403</a></li>
                                <li><a href="assets/page-error-404.html">Error 404</a></li>
                                <li><a href="assets/page-error-500.html">Error 500</a></li>
                                <li><a href="assets/page-error-503.html">Error 503</a></li>
                            </ul>
                        </li>
                        <li><a href="assets/page-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>
            </ul>
            <div class="copyright">
                <p>Made with <span class="heart"></span> by Ahmet Vuruskan</p>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="footer">
        <div class="copyright">
            <p>Copyright ©  Developed by <a href="https://github.com/ahmetvuruskan" target="_blank">Ahmet Vuruşkan</a> {{date("Y")}}</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="assets/vendor/global/global.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/js/deznav-init.js"></script>
<script src="assets/vendor/owl-carousel/owl.carousel.js"></script>

<!-- Chart piety plugin files -->
<script src="assets/vendor/peity/jquery.peity.min.js"></script>
<!-- Apex Chart -->
<script src="assets/vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="assets/js/dashboard/dashboard-1.js"></script>

<script>
    function carouselReview(){
        /*  event-bx one function by = owl.carousel.js */
        jQuery('.event-bx').owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            center:true,
            autoplaySpeed: 3000,
            navSpeed: 3000,
            paginationSpeed: 3000,
            slideSpeed: 3000,
            smartSpeed: 3000,
            autoplay: false,
            navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                720:{
                    items:2
                },

                1150:{
                    items:3
                },

                1200:{
                    items:2
                },
                1749:{
                    items:3
                }
            }
        })
    }
    jQuery(window).on('load',function(){
        setTimeout(function(){
            carouselReview();
        }, 1000);
    });
</script>
</body>
</html>
