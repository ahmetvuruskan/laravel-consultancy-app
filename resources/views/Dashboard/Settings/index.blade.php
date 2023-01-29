@extends("Dashboard.Layout.layout")
@section('title')
    {{$title}} | Ayarlar
@endsection
@section('page-title')
    Ayarlar
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ayarlar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Ayar Adı</th>
                                        <th>Ayar Key</th>
                                        <th>Ayar Değer</th>
                                        <th>Ayar Tip</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($data['settings'] as $setting)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td>{{$setting->settings_description}}</td>
                                            <td>{{$setting->settings_key}}</td>
                                            <td>{{$setting->settings_value}}</td>
                                            <td>{{$setting->settings_type}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route("admin.settings.edit",$setting->id)}}">Düzenle</a>
                                                       @if($setting->settings_delete ==1)
                                                            <a class="dropdown-item" href="#">Sil</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
