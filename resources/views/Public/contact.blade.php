@extends("Public.Layout.pagesLayout")
@section('content')
    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_main">
                        <h2>İletişim</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Sub header -->
    <!--//End Header -->
    <!--==================== Contact Us ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-5">
                    <div class="contact-box">
                        <hr>
                        <div class="contact-title">
                            <h4>İletişim Bilgileri</h4>
                            <i class="fas fa-phone-volume"></i>
                            <div class="contact-title_icon">
                                <p>Telefon</p>
                                <h6>{{$phone_sabit}} | {{$phone_gsm}}</h6>
                            </div>
                        </div>
                        <div class="contact-title">
                            <i class="fas fa-envelope"></i>
                            <div class="contact-title_icon">
                                <p>Email</p>
                                <h6>{{$mail}}</h6>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="contact-box">
                        <div class="contact-title">
                            <h4>Adress</h4>
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="contact-title_icon">
                                <h6>{{$adress}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="/Public/images/contact-form-bg.png" class="img-fluid get-in-bg" alt="#">
                        <h3>İletişim Formu</h3>
                        <form action="{{route("frontend.contactForm")}}" method="POST" id="form">
                            <input type="hidden" name="apikey" value="YOUR_ACCESS_KEY_HERE">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name"
                                               placeholder="Adınız" required>
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last name" placeholder="Soyadınız"
                                               required>
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Email Adresiniz" required >
                                        <i class="far fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phone_number"
                                               placeholder="Telefon numaranız" required>
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group textarea-icon">
                                        <textarea class="form-control" name="message" required
                                                  placeholder="Mesajınız"  rows="3"></textarea>
                                        <i class="far fa-envelope"></i>
                                        <button type="submit" class="btn btn-success">Gönder</button>
                                    </div>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
