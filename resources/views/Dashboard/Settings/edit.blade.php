@extends("Dashboard.Layout.layout")
@section('title')
    {{$title}} | Ayar Duzenle
@endsection
@section('page-title')
    {{$setting->settings_description}}
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$setting->settings_description}} İsimli ayarı Düzenliyorsunuz</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="post" action="{{route("admin.settings.update",$setting->id)}}">
                                @csrf
                                @if($setting->settings_type == "text")
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Ayar Değer</label>
                                        <input type="text" name="settings_value" class="form-control" value="{{$setting->settings_value}}">
                                    </div>
                                </div>
                                    @elseif($setting->settings_type=="file")
                                    <div class="row justify-content-center">
                                        <div class="form-group col-lg-6">
                                            <label for="settingValue" class="col-form-label">Yüklü Resim</label>
                                            <br>
                                            <img class="mt-2 mb-2 " width="400" src="/assets/images/{{$setting->settings_value}}" alt="">
                                            <br>
                                            <label for="settingValue" class="col-form-label">Ayar Değer</label>
                                            <input  type="file" name="settings_value" class="form-control">

                                        </div>
                                        <input type="hidden" value="{{$setting->settings_value}}" name="old_file"
                                               id="old_file">
                                    </div>
                                    @endif
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
