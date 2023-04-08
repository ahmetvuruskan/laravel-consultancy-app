@extends("Public.Layout.pagesLayout")
@section('title')
  {{$title}} | {{$data['page']->title}}
@endsection
@section('content')
    <section class="space-mb mt-5">
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
