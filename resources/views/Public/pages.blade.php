@extends("Public.Layout.pagesLayout")
@section('title')
  {{$title}} | {{$data['page']->title}}
@endsection
@section('content')
    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_main">
                        <h2>{{$data['page']->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-mb">
        <div class="container container-custom">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-play-text">
                        <span>{{$data['page']->title}}</span>
                            {!!$data['page']->content!!}
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
