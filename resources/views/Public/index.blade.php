@extends('Public.Layout.layout')
@section('content')
    <section class="about-section">
        <div class="container container-custom">
            <div class="row space">
                @foreach($data['blocks'] as $block)
                    <div class="col-md-4">
                        <a href="{{$block->link}}"><div class="service-thumbnail services-top-icon services-top-icon2 {{$block->color}} d-flex flex-fill">
                                <img src="/Public/images/{{$block->icon}}" class="img-fluid" alt="#">
                                <div class="service-thumbnail_text">
                                    <h4>{{$block->header}}</h4>
                                    <p>{{$block->paragraph}}</p>
                                </div>
                            </div></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-style1">
                        <h2>Neden Biz  ?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-center">
                <img  src="/Public/images/{{$whyusimage}}">
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
                                            <div class="row">
                                                <div class="col-lg-4 ">
                                                    <img  src="/assets/images/defaultavatar.png" class="img-fluid rounded-circle shadow-4-strong" alt="doctor_image">
                                                    <div class="row justify-content-center">
                                                       <div class="row">
                                                           <p ><h5 style="@printStatus(1)">ÇEVRİMİÇİ</h5></p>
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h5 class="card-title">Deneme Deneme</h5>
                                                    <p class="card-text">Seans</p>
                                                    <p class="card-text">lorem lorem lorem lorem lorem</p>
                                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Animi beatae, dignissimos dolorem eius error fugiat itaque iure nemo,
                                                        nesciunt provident quas quasi, qui quos recusandae reprehenderit sint soluta
                                                        tempore voluptatibus!</p>
                                                    <a href="{{route("frontend.create.appointment")}}/"
                                                       class="btn btn-primary buy">Satın Al 50 ₺</a>
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
                                                <div class="row">
                                                    <div class="col-lg-4 ">
                                                        <img  src="/assets/images/defaultavatar.png" class="img-fluid rounded-circle shadow-4-strong" alt="doctor_image">
                                                        <div class="row justify-content-center">
                                                            <div class="row">
                                                                <p ><h5 style="@printStatus(0)">ÇEVRİMDIŞI</h5></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="card-title">Deneme Deneme</h5>
                                                        <p class="card-text">Seans</p>
                                                        <p class="card-text">lorem lorem lorem lorem lorem</p>
                                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Animi beatae, dignissimos dolorem eius error fugiat itaque iure nemo,
                                                            nesciunt provident quas quasi, qui quos recusandae reprehenderit sint soluta
                                                            tempore voluptatibus!</p>
                                                        <a href="{{route("frontend.create.appointment")}}/"
                                                           class="btn btn-primary buy">Satın Al 50 ₺</a>
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
