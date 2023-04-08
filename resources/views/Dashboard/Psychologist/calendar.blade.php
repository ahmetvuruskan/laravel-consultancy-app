@extends('Dashboard.Admin.Layout.layout')
@section('title')
    {{$title}} | Takvim
@endsection
@section('page-title')
    Takvim
@endsection
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Takvim</h4>
                        </div>
                        <div class="card-body">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>Rumuz</th>
                                    <th>Randevu Tarihi</th>
                                    <th>Randevu Saati</th>
                                    <th>Görüşme Tipi</th>
                                    <th>Görüşme Süresi</th>
                                    <th>Telefon Numarası</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['appointments'] as $appointment)
                                    <tr>
                                        <td>{{$appointment->username}}</td>
                                        <td>{{date("d-m-Y",strtotime($appointment->start_date))}}</td>
                                        <td>{{date("H:i",strtotime($appointment->start_time))}}</td>
                                        <td>{{$appointment->package_name}}</td>
                                        <td>{{$appointment->session_duration}}</td>
                                        <td>{{$appointment->phone}}</td>
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
@endsection

