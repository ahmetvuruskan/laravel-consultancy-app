@extends("Public.Layout.pagesLayout")
{{--(--}}
{{--[package_name] => Sesli Görüşme--}}
{{--[package_id] => 1--}}
{{--[package_price] => 100--}}
{{--[profile] => defaultavatar.png--}}
{{--[session_duration] => 30--}}
{{--[number_of_sessions] => 1--}}
{{--[user_fullname] => deneme deneme--}}
{{--[profession_name] => Adli Psikoloji--}}
{{--[profession_id] => 1--}}
{{--[profession_description] => lorem ipsum--}}
{{--[product_id] => 8--}}
{{--)--}}
@section('content')
    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_main">
                        <h2>Ödeme</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-mb mt-4">
        <div class="container container-custom">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sipariş Detayı</h5>
                            <form method="post" action="{{route("frontend.virtualTerminal")}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Ad</label>
                                            <input type="text" class="form-control" readonly name="name" id="name"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                            <input type="hidden" class="form-control" readonly name="full_name"
                                                   id="full_name"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->name . " ".\Illuminate\Support\Facades\Auth::user()->surname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Soyad</label>
                                            <input type="text" class="form-control" readonly name="surname" id="surname"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->surname}}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Mail adresi</label>
                                            <input type="text" class="form-control" readonly name="mail" id="email"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Telefon</label>
                                            <input type="text" class="form-control" readonly name="phone" id="phone"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="container p-0">
                                        <div class="card px-4">
                                            <p class="h8 py-3">Ürün Bilgileri</p>
                                            <div class="row gx-3">
                                                <div class="col-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Paket Tipi</p>
                                                        <input class="form-control mb-3" readonly type="text"
                                                               value="{{$data['product'][0]->package_name}}"
                                                               name="package_type">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="price"
                                                       value="{{$data['product'][0]->package_price}}">
                                                <input type="hidden" name="user_id"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                                <input type="hidden" name="product_id"
                                                       value="{{$data['product'][0]->product_id}}">
                                                <input type="hidden" name="package_id"
                                                       value="{{$data['product'][0]->package_id}}">
                                                <div class="col-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Randevu Süresi</p>
                                                        <input class="form-control mb-3" readonly type="text"
                                                               value="{{$data['product'][0]->session_duration}} dk"
                                                               name="session_duration">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3">
                                                <div class="col-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Uzman Adı</p>
                                                        <input class="form-control mb-3" readonly type="text"
                                                               value="{{$data['product'][0]->user_fullname}}"
                                                               name="specialist_name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Uzmanlık Alanı</p>
                                                        <input class="form-control mb-3" readonly type="text"
                                                               value="{{$data['product'][0]->profession_name}}"
                                                               name="profession">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="container p-0">
                                        <div class="card px-4">
                                            <p class="h8 py-3">Ödeme Bilgileri</p>
                                            <div class="row gx-3">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Kart Sahibi</p>
                                                        <input class="form-control mb-3" type="text" name="card_holder">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Card Number</p>
                                                        <input class="form-control mb-3" type="text" name="card_number">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="d-flex flex-column">
                                                                <p class="text mb-1">Ay</p>
                                                                <input class="form-control mb-3" name="expire_month"
                                                                       type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex flex-column">
                                                                <p class="text mb-1">Yıl</p>
                                                                <input class="form-control mb-3" name="expire_year"
                                                                       type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">CVV/CVC</p>
                                                        <input class="form-control mb-3 pt-2 " type="password"
                                                               name="cvc">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mb-3">
                                                        <span
                                                            class="ps-3">Öde {{$data['product'][0]->package_price}} ₺</span>
                                                        <span class="fas fa-arrow-right"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
