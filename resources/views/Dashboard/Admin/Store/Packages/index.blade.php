@extends("Dashboard.Admin..Layout.layout")
@section('title')
    {{$title}} | Paket Listesi
@endsection
@section('page-title')
    Paketler
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ayarlar</h4>
                            <div class="justify-content-end">
                                <a href="{{route("admin.packages.add")}}" class="btn btn-primary">Paket Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Paket Adı</th>
                                        <th>Paket Açıklama</th>
                                        <th>Paket Fiyatı TL</th>
                                        <th>Seans Sayısı</th>
                                        <th>Seans Süresi</th>
                                        <th>Paket Tipi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data['packages'] as $package)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td>{{$package->package_name}}</td>
                                            <td>{{$package->package_description}}</td>
                                            <td>{{$package->package_price}}</td>
                                            <td>{{$package->number_of_sessions}}</td>
                                            <td>{{$package->session_duration}}</td>
                                            <td>{{strtoupper($package->package_type)}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route("admin.packages.edit",$package->id)}}">Düzenle</a>
                                                        <a class="dropdown-item" href="{{route("admin.packages.delete",$package->id)}}">Sil</a>
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
