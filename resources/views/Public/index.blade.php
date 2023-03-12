@extends('Public.Layout.layout')
@section('content')
    <section class="about-section">
        <div class="container container-custom">
            <div class="row space">
                @foreach($data['blocks'] as $block)
                    <div class="col-md-4">
                        <div
                            class="service-thumbnail services-top-icon services-top-icon2 {{$block->color}} d-flex flex-fill">
                            <img src="/Public/images/{{$block->icon}}" class="img-fluid" alt="#">
                            <div class="service-thumbnail_text">
                                <h4>{{$block->header}}</h4>
                                <p>{{$block->paragraph}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--//End About Section -->
    <!--==================== Our Services ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-style1">
                        <span>Hizmetlerimiz</span>
                        <h2>Başlıca Hizmetlerimiz</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($data['services'] as $service)
                    <div class="col-md-6 col-lg-3 d-flex flex-fill flex-column">
                        <div class="service-detail_box quaternary-color-br">
                            <div class="service-detail-icon">
                            </div>
                            <h6>{{$service->profession_type}}</h6>
                            <p>{{substr($service->description,0,100)}}</p>
                            <a href="#">Randevu Al</a>
                        </div>
                    </div>
                @endforeach
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
                    <div class="our-team-slider">
                        @foreach($data['doctors'] as $doctor) @endforeach
                        <div class="doctors-box3">
                            <img src="/assets/images/{{$doctor->profile}}" class="img-fluid" alt="#">
                            <div class="doctors-plus-icon"><i class="fas fa-plus"></i></div>
                            <h4>{{$doctor->name ." ".$doctor->surname}}</h4>
                            <p><a href="#" class="btn btn-xs btn-primary">Randevu Al</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
