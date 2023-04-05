@extends("Public.Layout.pagesLayout")
@section('title')
    {{$title}} | Blog
@endsection
@section('content')

    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_main">
                        <h2>Bloglar</h2>
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
                <div class="col-md-8">
                        @foreach($data['blogs'] as $blog)
                        <div class="blog-list">
                            <img src="/Public/images/blog-img.jpg" class="img-fluid" alt="#">
                            <div class="blog-text-wrap">
                                <h3>{{$blog->title}}</h3>
                                <p>{{substr($blog->content,0,50)}}</p>
                                <a href="{{route("frontend.blog.detail",$blog->slug)}}" class="btn btn-primary">Devamını Oku</a>
                            </div>
                        </div>
                        @endforeach
                            <div class="d-flex justify-content-center">
                              <div>
                                  {{ $data['blogs']->links() }}
                              </div>
                            </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>Son Yazılar</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            <div class="blog-sidebar_content">
                                <a href="#" class="thumbnail-wrap">
                                    <img src="/Public/images/thambnail-1.jpg" alt="#">
                                    <div class="thumbnail-hover">
                                        <i class="fas fa-external-link-alt"></i>
                                    </div>
                                </a>
                                <div class="thumbnail-text_wrap">
                                    <p>Lorem ipsum dolor sit amet,<br> consectetur..
                                    </p>
                                    <span>June 25, 2019</span>
                                </div>
                            </div>
                            <div class="blog-sidebar_content">
                                <a href="#" class="thumbnail-wrap">
                                    <img src="/Public/images/thambnail-2.jpg" alt="#">
                                    <div class="thumbnail-hover">
                                        <i class="fas fa-external-link-alt"></i>
                                    </div>
                                </a>
                                <div class="thumbnail-text_wrap">
                                    <p>Lorem ipsum dolor sit amet,<br> consectetur..
                                    </p>
                                    <span>June 25, 2019</span>
                                </div>
                            </div>
                            <div class="blog-sidebar_content">
                                <a href="#" class="thumbnail-wrap">
                                    <img src="/Public/images/thambnail-3.jpg" alt="#">
                                    <div class="thumbnail-hover">
                                        <i class="fas fa-external-link-alt"></i>
                                    </div>
                                </a>
                                <div class="thumbnail-text_wrap">
                                    <p>Lorem ipsum dolor sit amet,<br> consectetur..
                                    </p>
                                    <span>June 25, 2019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>Follow Us</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            <ul class="blog-sidebar_social">
                                <li>
                                    <a target="_blank" href="https://facebook.com/{{$facebook}}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com/{{$twitter}}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com/{{$instagram}}"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
