@extends("Public.Layout.pagesLayout")
@section('title')
    {{$title}} | {{$data['psychologists']->name}} {{$data['psychologists']->surname}}
@endsection
@section('content')

    <section class="space-mb mt-5">
        <div class="container container-custom">
            <div class="row justify-content-center">
                <div class="col-md-12">

                        <div class="row justify-content-center text-center">
                            <h2>{{strtoupper($data['psychologists']->name." ".$data['psychologists']->surname)}}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 justify-content-center">
                                <div class="row mb-3">
                                    <img width="200" src="/assets/images/{{$data['psychologists']->profile}}"
                                         class="img-fluid rounded-circle shadow-4-strong"
                                         alt="doctor_image">
                                </div>
                                <h5 style="padding-left: 45px">{{$data['psychologists']->title}}</h5>
                            </div>
                            <div class="col-lg-8">
                                {!!  $data['psychologists']->description!!}
                            </div>
                    </div>
                    <div class="row justify-content-lg-center">
                        <a href="{{route("frontend.create.appointment",["id"=>\Illuminate\Support\Facades\Crypt::encrypt($data['psychologists']->user_id)])}}"
                           class="btn btn-success mr-2">Randevu Al </a>
                        <a href="{{route("frontend.create.appointment",["id"=>\Illuminate\Support\Facades\Crypt::encrypt($data['psychologists']->user_id)])}}"
                           style="background-color: green" class="btn btn-success buy ml-1">Şimdi
                            Konuş </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
