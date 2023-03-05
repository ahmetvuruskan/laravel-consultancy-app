@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Paket Güncelle
@endsection
@section('page-title')
    {{$package->package_name}}
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$package->package_name}} isimli paketi düzenliyorsunuz.</h4>
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
                            <form method="post" action="{{route("admin.packages.update",$package->id)}}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Paket Adı</label>
                                        <input type="text" name="package_name"  class="form-control"
                                               value="{{$package->package_name}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Paket Açıklama</label>
                                        <input type="text" name="package_description" required class="form-control"
                                               value="{{$package->package_description}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Paket Fiyat (TL)</label>
                                        <input type="number" name="package_price" required class="form-control"
                                              value="{{$package->package_price}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Seans Sayısı</label>
                                        <input type="number" name="number_of_sessions" required class="form-control"
                                               value="{{$package->number_of_sessions}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Seans Süresi (Dakika)</label>
                                        <input type="number" name="session_duration" required class="form-control"
                                               value="{{$package->session_duration}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Paket Tipi</label>
                                        <select name="package_type" required class="form-control">
                                            <option {{ $package->package_type == "video" ? "selected" : ""}} value="video">Görüntülü</option>
                                            <option {{ $package->package_type == "ses" ? "selected" : ""}} value="ses">Sesli</option>
                                            <option {{ $package->package_type == "mesaj" ? "selected" : ""}} value="mesaj">Mesaj</option>
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
