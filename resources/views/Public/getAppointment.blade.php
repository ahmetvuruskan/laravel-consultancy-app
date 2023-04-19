@extends("Public.Layout.pagesLayout")
@section("content")
    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-header_content">
                        <p>Alanında Uzman Psikologlar</p>
                        <h3>Hizmet almak istediğiniz kategoriyi seçerek listeleyebilirsiniz</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="light">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="sidebar-category" style="max-height: 350px; overflow-y:auto;">
                        <ul>
                            @foreach($data['professionsforsell'] as $profession)
                                <li>
                                    <a class="profession">
                                        <span class="profession_type"
                                              id="{{$profession->id}}">{{$profession->profession_type}}</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="service-detail_wrap">
                        <h2 class="text-center">Uzman Psikologlar</h2>
                        <h4 class="text-center">Sol taraftaki menüden uzman seçerek randevu alabilirsiniz</h4>
                        <div id="service-detail">
                            @foreach($data['available_users'] as $user)
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img width="400" src="/assets/images/{{$user->profile}}"
                                                     class="img-fluid rounded-circle shadow-4-strong"
                                                     alt="doctor_image">
                                            </div>
                                            <div class="col-lg-8">
                                                <h5 class="card-title">{{$user->user_fullname}}</h5>
                                                <p class="card-text">{{$user->title}}</p>

                                                @foreach($user->products as $product)
                                                    <p class="font-weight-bold"> {{$product->package_name}} - 30
                                                        dakika : {{$product->thirty_min}} ₺ - 60
                                                        Dakika {{$product->sixty_min}} ₺ </p>
                                                    @endforeach
                                                    <p class="card-text">{!!substr($user->description,0,200)!!} <a href="{{ route("frontend.psychologist",['slug'=>$user->slug]) }}"> Devamını Oku</a></p>
                                                    <a href="{{route("frontend.create.appointment",["id"=>\Illuminate\Support\Facades\Crypt::encrypt($user->id)])}}"
                                                       class="btn btn-success">Randevu Al </a>
                                                    <a href="{{route("frontend.create.appointment",["id"=>\Illuminate\Support\Facades\Crypt::encrypt($user->id)])}}"
                                                       style="background-color: green" class="btn btn-success buy">Şimdi
                                                        Konuş </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($data['users'] as $user)
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <img width="400" src="/assets/images/{{$user->profile}}"
                                                         class="img-fluid rounded-circle shadow-4-strong"
                                                         alt="doctor_image">
                                                </div>
                                                <div class="col-lg-8">
                                                    <h5 class="card-title">{{$user->user_fullname}}</h5>
                                                    <p class="card-text">{{$user->title}}</p>

                                                    @foreach($user->products as $product)
                                                        <p class="font-weight-bold"> {{$product->package_name}} - 30
                                                            dakika : {{$product->thirty_min}} ₺ - 60
                                                            Dakika {{$product->sixty_min}} ₺ </p>
                                                    @endforeach
                                                    <p class="card-text">{!!substr($user->description,0,200)!!} <a href="{{ route("frontend.psychologist",['slug'=>$user->slug]) }}"> Devamını Oku</a></p>
                                                    <a href="{{route("frontend.create.appointment",["id"=>\Illuminate\Support\Facades\Crypt::encrypt($user->id)])}}"
                                                       class="btn btn-success">Randevu Al </a>
                                                    <a href="{{route("frontend.create.appointment",["id"=>\Illuminate\Support\Facades\Crypt::encrypt($user->id)])}}"
                                                       style="background-color: green" class="btn btn-success buy">Şimdi
                                                        Konuş </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
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
            $(".profession").click(function () {
                const professionType = $(this).find(".profession_type").text();
                var serviceDetail = $("#service-detail");
                axios.post("{{route('api.getproductsbyprofession')}}", {profession_type: professionType}).then(function (response) {
                    serviceDetail.empty();
                    const data = response.data.data;
                    for (let key in data) {
                        console.log(key)
                        var markup = `<div class="card mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="/assets/images/${data[key].profile}" class="img-fluid rounded-circle shadow-4-strong" alt="doctor_image">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="card-title">${data[key].user_fullname}</h5>
                                        <p class="card-text">${data[key].package_name} / ${data[key].session_duration} dk / ${data[key].number_of_sessions} Seans</p>
                                        <p class="card-text">${data[key].profession_description}</p>
                                        <p class="card-text">${data[key].profession_name}</p>
                                        <a href="{{route("frontend.create.appointment")}}/${data[key].product_id}" class="btn btn-primary buy">Satın Al ${data[key].package_price} ₺</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        serviceDetail.append(markup);
                    }
                });
            });
        });
    </script>
@endsection
