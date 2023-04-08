<html >
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        *{
            font-family:"DeJaVu Sans Mono",monospace;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Sipariş
            <strong>{{$order['order_id']}}</strong>
            <span class="float-right"> <strong>Durum:</strong> Ödendi</span>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">Uzman:</h6>
                    <div>
                        <strong>{{$order['seller_name']}}</strong>
                    </div>
                    <div>{{$order['seller_title']}}</div>
                    <div>{{$order['seller_email']}}</div>
                    <div>{{$order['seller_phone']}}</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>{{$order['buyer_name']}}</strong>
                    </div>
                    <div>{{$order['buyer_email']}}</div>
                    <div>{{$order['buyer_phone']}}</div>
                </div>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Paket Adı</th>
                        <th>Seans Süresi</th>
                        <th class="right">Görüşme Sayısı</th>
                        <th class="center">Fiyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="center">{{$order['order_id']}}</td>
                        <td class="left strong">{{$order['package_name']}}</td>
                        <td class="left">{{$order['session_duration']}}</td>
                        <td class="left">{{$order['number_of_sessions']}}</td>
                        <td class="right">{{$order['package_price']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Toplam</strong>
                            </td>
                            <td class="right">{{$order['package_price']}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
