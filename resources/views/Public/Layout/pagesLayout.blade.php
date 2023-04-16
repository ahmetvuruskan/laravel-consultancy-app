@include("Public.Layout.menu")
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
    @yield("css")
    <title>@hasSection('title')
               @yield('title')
        @else{{$title}}
        @endif
    </title>
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
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
                            <a class="navbar-brand" href="{{route("frontend.index")}}"><img @w(300) src="@fileRoute{{$logo}}" alt="#"></a>
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
                                    <a href="{{route("frontend.appointment")}}" class="btn btn-primary">Randevu Al</a>
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
                        @yield("menu")
                        <ul class="nav-icon-wrap">
                            <ul>
                                <li>
                                    <a href="https://facebook.com/{{$facebook}}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/{{$twitter}}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/{{$instagram}}"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="nav-item">
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        <a class="nav-link" href="{{route("login")}}">Kullanıcı Paneli</a>
                                    @else
                                        <a class="nav-link" href="{{route("login")}}">Giriş Yap / Kayıt Ol</a>
                                    @endif
                                </li>
                            </ul>

                        </ul>
                    </div>
                </nav>
                <!--//End Nav menu -->
            </div>
        </div>
    </div>
</div>
@yield("content")
<footer>
    <div class="container container-custom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="foot-contact-block">
                    <img src="@fileRoute{{$logo}}" class="img-fluid" alt="#" />
                    <a href="tel:{{$phone_sabit}}">
                        <h4><i class="fas fa-phone"></i>{{$phone_sabit}}</h4>
                    </a>
                    <a href="mailto:{{$mail}}">
                        <h4><i class="far fa-envelope"></i>{{$mail}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-1">
                <div class="foot-link-box">
                    <h4>Hızlı Linkler</h4>
                    <ul>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Hakkımızda</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>Hizmetlerimiz</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-angle-double-right"></i>İletişim</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="foot-link-box">
                    <h4>Hizmetlerimiz</h4>
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
                    <ul>
                        <li>
                            <a href="https://facebook.com/{{$facebook}}"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/{{$twitter}}"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://instagram.com/{{$instagram}}"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mb-3">
            <img  width="350" src="/Public/images/logolar.png">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>© Psikologlive {{date("Y")}}</p>
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
<script src="/assets/axios/dist/axios.min.js"></script>
@yield('js')
</body>

</html>
