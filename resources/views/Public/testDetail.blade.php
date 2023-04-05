@extends("Public.Layout.pagesLayout")
@section('title')
    {{$title}} | {{$data['test']->name}}
@endsection
@section('content')
    <section class="space">
        <section class="space sub-header">
            <div class="container container-custom">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sub-header_main">
                            <h2>{{$data['test']->name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12 justify-content-center">
                    <div>
                        {!! $data['test']->test_embed !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
