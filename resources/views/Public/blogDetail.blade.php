@extends("Public.Layout.pagesLayout")
@section('title')
    {{$title}} | {{$data['blog']->title}}
@endsection
@section('content')
    <section class="space">
        <section class="space sub-header">
            <div class="container container-custom">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sub-header_main">
                            <h2>{{$data['blog']->title}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-8">
                    <form action="#">
                        <div class="blog-list blog-deatil">
                            <img src="/Public/images/{{$data['blog']->image}}" class="img-fluid" alt="#">
                            <div class="blog-text-wrap border-0 pl-0 pr-0">
                                {!! $data['blog']->content !!}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>Follow Us</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            <ul class="blog-sidebar_social">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
