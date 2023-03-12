<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Psikologlive | Giriş Yap</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="assets/css/style.css" rel="stylesheet">
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
                                    <a href="{{route("login")}}"><img @w(350) src="assets/images/{{$logo}}" alt=""></a>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger mt-3 ">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                                @if(session()->has('success'))
                                    <script>
                                        <div class="alert alert-danger mt-3 ">
                                            {{session('success')}}
                                        </div>
                                    </script>
                                @endif
                                <h4 class="text-center mb-4 text-white">Giriş yapın</h4>
                                <form method="post" action="{{route("checkUser")}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Email</strong></label>
                                        <input name="email" type="email" class="form-control" placeholder="hello@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Şifre</strong></label>
                                        <input name="password" type="password" class="form-control" placeholder="Şifre">
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1 text-white">
                                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                <label class="custom-control-label" for="basic_checkbox_1">Beni hatırla</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a class="text-white" href="#">Şifreni mi unuttun ?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Giriş Yap</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white">Hesabınız yok mu ? <a class="text-white" href="{{route("register")}}">Kayıt Ol!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/vendor/global/global.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/js/deznav-init.js"></script>
</body>
</html>
