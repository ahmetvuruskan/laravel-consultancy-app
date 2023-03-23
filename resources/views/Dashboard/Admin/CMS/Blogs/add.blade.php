@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Blog Ekle
@endsection
@section('page-title')
    Yeni Blog
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bu form aracılığyla blog ekleyebilirsiniz.</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="row justify-content-center">
                                        <div class=" col-md-6 alert alert-danger mt-3 ">
                                            {{$error}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <form method="post" action="{{route("admin.blog.insert")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Blog Başlık</label>
                                        <input type="text" name="blog_title"  class="form-control"
                                               placeholder="Blog başlık Metin">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Blog içerik</label>
                                        <textarea name="blog_content" rows="100" class="form-control"
                                                  id="ckEditor"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label">Blog  Resim</label>
                                        <input type="file" name="blog_image" required class="form-control">
                                    </div>
                                </div>

                                <div class="row justify-content-end mr-xl-5">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/assets/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#ckEditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
