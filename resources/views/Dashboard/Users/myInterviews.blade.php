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
                                        <th>Yorum Yap</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['interviews'] as $interview)
                                        <tr>
                                            <td>{{$interview->order_id}}</td>
                                            <td>{{$interview->package_name}}</td>
                                            <td>{{$interview->seller_name}}</td>
                                            <td>{{$interview->duration}} dk</td>
                                            @if($interview->appointment_time == null)
                                                <td>
                                                    <a href="{{route("admin.users.create.appointment",\Illuminate\Support\Facades\Crypt::encrypt($interview->order_id))}}"
                                                       class="btn btn-primary btn-sm">Randevu Oluştur</a></td>
                                            @else
                                                <td>{{date("d-m-Y",strtotime($interview->appointment_date))}}
                                                    -{{date("H:i",strtotime($interview->appointment_time))}}</td>
                                            @endif
                                            @if($interview->appointment_end_time > \Carbon\Carbon::now()->format("H:i") && $interview->appointment_date <= \Carbon\Carbon::now()->format("Y-m-d"))
                                                <td>
                                                    <button id="{{$interview->order_id}}"
                                                            data-user="{{$interview->seller_id}}"
                                                            class="btn btn-info btn-xs comment">Yorum Yap
                                                    </button>
                                                </td>
                                            @else
                                                <td>Henüz yorum <br>
                                                    yapamazsınız
                                                </td>
                                            @endif

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
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Yorum Yap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Yorumunuz</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="button" id="save" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(() => {
            $(".comment").click(function () {
                $("#commentModal").modal("show");
                let id = $(this).attr("id");
                let user = $(this).attr("data-user");
                $("#save").click(function () {
                    axios.post("{{route("api.save.comment")}}",
                        {
                            "order_id": id,
                            "user": user,
                            "comment": $("#comment").val()
                        }, {
                            headers: {
                                "Authorization": "Bearer {{\Illuminate\Support\Facades\Cookie::get("token")}}"
                            }
                        }).then((response) => {
                        if (response.data.status == "success") {
                            toastr.success(response.data.message);
                            $("#commentModal").modal("hide");
                            location.reload();
                        }
                    }).catch((error) => {
                        toastr.error(response.error.message);
                    });
                });

            });
        })
    </script>
@endsection
