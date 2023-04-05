@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Test Ekle
@endsection
@section('page-title')
    Test Ekle
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Test Ekle</h4>
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
                            <form method="post" action="{{route("admin.test.insert")}}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Test Adı</label>
                                        <input type="text" name="test_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Test Açıklama</label>
                                        <input type="text" name="test_description" required class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Test İframe</label>
                                        <textarea name="test_embed" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end mr-xl-5">
                                    <button class="btn btn-primary">Ekle</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
