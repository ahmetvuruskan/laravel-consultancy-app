@extends("Dashboard.Admin..Layout.layout")
@section('title')
    {{$title}} | Satışlar
@endsection
@section('page-title')
    Satışlar
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Satışlar</h4>
                            <div class="justify-content-end">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Tarih</th>
                                        <th>Detaylar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['orders'] as $order)
                                        <tr>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{\Carbon\Carbon::parse("$order->created_at")->format("d/m/Y")}}</td>
                                            <td>
                                                <a href="{{route('admin.orders.show',$order->order_id)}}" class="btn btn-primary btn-sm">Detaylar</a>
                                            </td>
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
