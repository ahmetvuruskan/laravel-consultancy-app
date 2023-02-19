@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Slider Düzenle
@endsection
@section('page-title')
    Slider Düzenle
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bu form aracılığyla mevcut bloklarınızı düzenleyebilirsiniz</h4>
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
                            <form method="post" action="{{route("admin.cms.blocks.update")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Blok Başlık</label>
                                        <input type="text" name="header"  class="form-control" value="{{$data['block']->header}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Blok Paragraf</label>
                                        <input type="text" name="paragraph" required class="form-control" value="{{$data['block']->paragraph}}">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$data['block']->id}}">

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

