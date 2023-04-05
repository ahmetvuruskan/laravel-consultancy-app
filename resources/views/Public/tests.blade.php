@extends("Public.Layout.pagesLayout")
@section('title')
    {{$title}} | Kendini Test Et
@endsection
@section('content')

    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-8">
                    <div class="sub-header_main">
                        <h2>Kendini Test Et</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Sub header -->
    <!--//End Header -->
    <!--==================== Blog List ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    @foreach($data['tests'] as $tests)
                        <div class="blog-list">
                            <div class="blog-text-wrap">
                                <h3>{{$tests->name}}</h3>
                                <p>{{substr($tests->description,0,50)}}</p>
                                <div class="row justify-content-end">
                                    <a href="{{route("frontend.test.detail",$tests->slug)}}" class="btn btn-primary">Kendini Test Et</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        <div>
                            {{ $data['tests']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
