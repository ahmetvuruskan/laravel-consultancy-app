<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{$title }} | Kayıt ol</title>

    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/{{$icon}}">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="{{route("register")}}"><img @w(350) src="/assets/images/{{$logo}}" alt=""></a>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger mt-3 ">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                                <h4 class="text-center mb-4 text-white">Kayıt Ol</h4>
                                <form method="post" action="{{route("registerUser")}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Adınız</strong></label>
                                                <input type="text" name="firstname" value="{{old("firstname")}}" class="form-control" placeholder="Adınız ">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Soyadınız</strong></label>
                                                <input type="text" name="surname" value=" {{old("surname")}}" class="form-control" placeholder="Soyadınız">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Rumuz</strong></label>
                                                <input type="text" name="username" value="{{old("username")}}" class="form-control" placeholder="Rumuz">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Telefon</strong></label>
                                                <input type="text" name="phone" value="{{old("phone")}}" class="form-control" placeholder="Telefon Numaranız">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Şifre</strong></label>
                                                <input type="password" name="password" class="form-control" placeholder="Şifre">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Şifre Tekrar</strong></label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Şifre tekrar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Email</strong></label>
                                                <input type="email" name="email" value="{{old("email")}}" class="form-control" placeholder="Email Adresiniz">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Kayıt ol</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white">Kayıtlı mısınız ?  <a class="text-white" href="{{route("login")}}">Giriş Yap !</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="/assets/vendor/global/global.min.js"></script>
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/deznav-init.js"></script>

</body>
</html>
