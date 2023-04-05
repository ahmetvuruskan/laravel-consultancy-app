@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Test Güncelle
@endsection
@section('page-title')
    {{$test->name}}
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> {{$test->name}} isimli testi düzenliyorsunuz.</h4>
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
                            <form method="post" action="{{route("admin.test.update",$test->id)}}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Test Adı</label>
                                        <input type="text" name="test_name"  class="form-control"
                                               value="{{$test->name}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Paket Açıklama</label>
                                        <input type="text" name="test_description" required class="form-control"
                                               value="{{$test->description}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Test İframe</label>
                                        <textarea name="test_embed" rows="5" class="form-control">{{$test->test_embed}}</textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Test Durum</label>
                                        <select name="status" class="form-control">
                                            <option @selected($test->status == 1) value="1">Aktif</option>
                                            <option @selected($test->status == 0) value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-end mr-xl-5">
                                    <button class="btn btn-primary">Kaydet</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
