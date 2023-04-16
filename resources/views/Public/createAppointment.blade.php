@extends("Public.Layout.pagesLayout")
@section('css')
    <link rel="stylesheet" href="/assets/select2/select2.css">
@endsection
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
                                <input type="hidden" name="session_duration" id="session_duration">
                                <input type="hidden" name="specialist_id" value="{{$data['user']->id}}">
                                <div class="row mt-5">
                                    <div class="container p-0">
                                        <div class="card px-4">
                                            <p class="h8 py-3">Sipariş Bilgileri</p>
                                            <div class="row gx-3">
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Uzman Ad Soyad</p>
                                                        <input class="form-control mb-3" type="text" readonly
                                                               value="{{$data['user']->name." ".$data['user']->surname}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Uzman Ünvan</p>
                                                        <input class="form-control mb-3" type="text" readonly
                                                               value="{{$data['user']->title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-2">
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Görüşme Tipi</p>
                                                        <select required class="form-control" id="package_type"
                                                                name="package_type">
                                                            <option disabled selected value="">Seçiniz</option>
                                                            @foreach($data['user_products'] as $products)
                                                                <option
                                                                    value="{{$products->id}}">{{$products->package_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Görüşme Süresi</p>
                                                        <select required class="form-control" id="session"
                                                                name="session_type">
                                                        </select>
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
                                                            class="ps-3">Öde <span id="price">0</span></span>
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
@section('js')
    <script>
        $(document).ready(function () {
            let price = $('#price');
            price.hide();
            $('#package_type').on('change', function () {
                var package_type = $(this).val();
                price.hide();
                axios.post("{{route("api.get.prices")}}", {
                    product: package_type
                }, {
                    headers: {
                        'Authorization': "Bearer {{\Illuminate\Support\Facades\Cookie::get('token')}}"
                    }
                }).then(function (response) {
                   let select = $('#session');
                     select.empty();
                    $.each(response.data.data, function (key, value) {
                        select.append('   <option disabled selected value="">Seçiniz</option>')
                        select.append('<option value=' + value.id +'-60'+'>60 Dakika - '  + value.sixty_min + ' ₺</option>');
                        select.append('<option value=' + value.id +'-30'+ '>30 Dakika - ' + value.thirty_min + ' ₺</option>');
                    });
                }).catch(function (error) {
                    if(error.response.status === 401) {
                        window.location.href = "{{route("login")}}";
                    }
                });
            });

            $('#session').change(()=>{
               let session = $('#session');
               let vals = session.val();
               let html = session.find(":selected").text();
               htmlArray = html.split(' ');
               console.log(htmlArray)
                let sessionArray = vals.split('-');
                price.show();
                price.text(htmlArray[3]+'₺');
                if(sessionArray[1] == 60) {
                    $('#session_duration').val(60);
                }else{
                    $('#session_duration').val(30);
                }
            });
        });
    </script>
@endsection
