@extends('Public.Layout.layout')
@section('content')
    <section class="about-section">
        <div class="container container-custom">
            <div class="row space">
                @foreach($data['blocks'] as $block)
                    <div class="col-md-4">
                        <a href="{{$block->link}}">
                            <div
                                class="service-thumbnail services-top-icon services-top-icon2 {{$block->color}} d-flex flex-fill">
                                <img src="/Public/images/{{$block->icon}}" class="img-fluid" alt="#">
                                <div class="service-thumbnail_text">
                                    <h4>{{$block->header}}</h4>
                                    <p>{{$block->paragraph}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="container container custom">
            <div class="row justify-content-lg-center">
                <img class="img-fluid" src="/Public/images/{{$whyusimage}}">
            </div>
        </div>
    </section>
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        <span>---- Doktorlarımız ----</span>
                        <h2>Sizler için hizmete hazır olan doktrolarımız</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        @foreach($data['available_users'] as $doctor)
                            <tr>
                                <td>
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-4 ">
                                                    <img style="width: 220px" src="/assets/images/{{$doctor->profile}}"
                                                         class="img-fluid rounded-circle shadow-4-strong"
                                                         alt="doctor_image">
                                                    <div style=" padding-right: 90px"
                                                         class="row justify-content-center">
                                                        <div class="row">
                                                            <h5 style="@printStatus(1)">ÇEVRİMİÇİ</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h5 class="card-title">{{$doctor->fullname}}</h5>
                                                    <p class="card-text">{{$doctor->title}}</p>

                                                    @foreach($doctor->products as $product)
                                                        <p class="font-weight-bold"> {{$product->package_name}} - 30
                                                            dakika : {{$product->thirty_min}} ₺ - 60
                                                            Dakika {{$product->sixty_min}} ₺ </p>
                                                    @endforeach
                                                    <p class="card-text">{!!substr($doctor->description,0,200)!!} <a href="{{ route("frontend.psychologist",['slug'=>$doctor->slug]) }}"> Devamını Oku</a></p>
                                                    <a href="{{route("frontend.create.appointment")}}"
                                                       class="btn btn-success">Randevu Al </a>
                                                    <a href="{{route("frontend.create.appointment")}}"
                                                       style="background-color: green" class="btn btn-success buy">Şimdi
                                                        Konuş </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($data['users'] as $doctor)
                                <tr>
                                    <td>
                                        <div class="card ">
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-4 ">
                                                        <img style="width: 220px" src="/assets/images/{{$doctor->profile}}"
                                                             class="img-fluid rounded-circle shadow-4-strong"
                                                             alt="doctor_image">
                                                        <div style=" padding-right: 90px"
                                                             class="row justify-content-center">
                                                            <div class="row">
                                                                <h5 style="@printStatus(0)">ÇEVRİMDIŞI</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="card-title">{{$doctor->fullname}}</h5>
                                                        <p class="card-text">{{$doctor->title}}</p>

                                                        @foreach($doctor->products as $product)
                                                            <p class="font-weight-bold"> {{$product->package_name}} - 30
                                                                dakika : {{$product->thirty_min}} ₺ - 60
                                                                Dakika {{$product->sixty_min}} ₺ </p>
                                                        @endforeach
                                                        <p class="card-text">{!!substr($doctor->description,0,200)!!} <a href="{{ route("frontend.psychologist",['slug'=>$doctor->slug]) }}"> Devamını Oku</a></p>
                                                        <a href="{{route("frontend.create.appointment")}}"
                                                           class="btn btn-success">Randevu Al </a>
                                                        <a href="{{route("frontend.create.appointment")}}"
                                                           style="background-color: green" class="btn btn-success buy">Şimdi
                                                            Konuş </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
