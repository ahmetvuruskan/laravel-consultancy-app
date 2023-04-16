@extends("Dashboard.Admin..Layout.layout")
@section('title')
    {{$title}} | Görüşmelerim
@endsection
@section('page-title')
    Görüşmelerim
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Görüşmelerim</h4>
                            <div class="justify-content-end">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Paket Tipi</th>
                                        <th>Uzman Adı</th>
                                        <th>Seans Süresi</th>
                                        <th>Randevu Oluştur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['interviews'] as $interview)
                                        <tr>
                                            <td>{{$interview->order_id}}</td>
                                            <td>{{$interview->package_name}}</td>
                                            <td>{{$interview->seller_name}}</td>
                                            <td>{{$interview->duration}} dk</td>
                                            <td><a href="{{route("admin.users.create.appointment",\Illuminate\Support\Facades\Crypt::encrypt($interview->order_id))}}" class="btn btn-primary btn-sm">Randevu Oluştur</a></td>
                                        </tr>
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
