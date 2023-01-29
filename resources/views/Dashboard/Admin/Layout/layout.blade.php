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
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/{{$icon}}">
    <link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/chartist/css/chartist.min.css">
    <link href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">

    <div class="nav-header">
        <a href="{{route("admin.index")}}" class="brand-logo">
            <img class="logo-abbr" src="/assets/images/{{$logo}}" alt="">
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
                                <img src="/assets/images/profile/17.jpg" width="20" alt=""/>
                                 <div class="header-info">
                                    <span class="text-black"><strong>{{\Illuminate\Support\Facades\Auth::user()->name." ".\Illuminate\Support\Facades\Auth::user()->surname}}</strong></span>
                                    <p class="fs-12 mb-0">{{strtoupper(\Illuminate\Support\Facades\Auth::user()->role)}}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/assets/assets/app-profile.html" class="dropdown-item ai-icon">
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

    <div class="deznav">
        <div class="deznav-scroll">
            <a href="javascript:void(0)" class="add-menu-sidebar" data-toggle="modal" data-target="#addOrderModalside" >+ New Event</a>
            <ul class="metismenu" id="menu">
                <li><a href="{{route("admin.index")}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-home"></i>
                        <span class="nav-text">Anasayfa</span>
                    </a>
                </li>
                <li><a href="{{route("admin.settings.index")}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings"></i>
                        <span class="nav-text">Ayarlar</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-home-1"></i>
                        <span class="nav-text">Mağaza İşlemleri</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{route("admin.packages.index")}}">Paketler</a></li>
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



</div>

<script src="/assets/vendor/global/global.min.js"></script>
<script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/deznav-init.js"></script>
<script src="/assets/vendor/owl-carousel/owl.carousel.js"></script>
<script src="/assets/vendor/peity/jquery.peity.min.js"></script>
<script src="/assets/vendor/apexchart/apexchart.js"></script>
<script src="/assets/js/dashboard/dashboard-1.js"></script>
<script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/plugins-init/datatables.init.js"></script>

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