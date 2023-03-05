@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Sayfa Düzenle
@endsection
@section('page-title')
    {{$data['page']->title}} Sayfası Düzenle
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bu form aracılığyla {{$data['page']->title}} sayfasını
                                düzenleyebilirsiniz</h4>
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
                            <form method="post" action="{{route("admin.cms.pages.update",$data['page']->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label">Sayfa Başlık</label>
                                        <input type="text" name="header" disabled class="form-control"
                                               value="{{$data['page']->title}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label">Sayfa içerik</label>
                                        <textarea name="page_content" rows="100" class="form-control"
                                                  id="ckEditor">{{$data['page']->content}}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="">
                                <div class="row justify-content-end mr-xl-5">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
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
