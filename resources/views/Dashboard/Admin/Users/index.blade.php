@extends("Dashboard.Admin..Layout.layout")
@section('title')
    {{$title}} | Kullanıcı Listesi
@endsection
@section('page-title')
    Kullanıcılar
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kullanıcılar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Kullanıcı Ad Soyad</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>E-Posta Adresi</th>
                                        <th>Telefon No</th>
                                        <th>Kullanıcı Rolü</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data['users'] as $user)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td>{{$user->name." ".$user->surname}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                @if($user->role == "admin")
                                                    <span class="badge light badge-success">Yönetici</span>
                                                @elseif($user->role == "psychologist")
                                                    <span class="badge light badge-warning">Psikolog</span>
                                                @elseif($user->role == "user")
                                                    <span class="badge light badge-danger">Üye</span>
                                            @endif
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                            data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                             version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"/>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"/>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a u-id="{{$user->id}}"
                                                           class="dropdown-item edit-user">Düzenle</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('admin.users.delete',$user->id)}}">Sil</a>
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
    <div class="modal fade" id="user-detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Düzenle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Ad</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ad">
                        </div>
                        <input id="id" type="hidden">
                        <div class="col-md-6">
                            <label for="name">Soyad</label>
                            <input type="text" class="form-control" id="surname" name="name" placeholder="Soyad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="name">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="username" name="name" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="col-md-7">
                            <label for="name">E-Posta Adresi</label>
                            <input type="text" class="form-control" id="email" name="name" placeholder="E-Posta Adresi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Telefon Numarası</label>
                            <input type="text" class="form-control" id="phone" name="name" placeholder="Telefon Numarası">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Şifre Sıfırla</label>
                            <button id="reset-password" class="btn btn-primary btn-block">Şifre Sıfırla</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Admin</label>
                            <button id="make-admin" class="btn btn-primary btn-block">Admin Yap</button>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Psikolog</label>
                            <button id="make-psicologist" class="btn btn-primary btn-block">Psikolog Yap</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(".edit-user").click(function () {
                $("#user-detail-modal").modal('show');
                $(".form-control").prop( "disabled", true );
                axios.post("{{route('admin.users.details')}}", {
                    id: $(this).attr('u-id')
                }, {
                    headers: {
                        "Authorization ": "Bearer " + "{{\Illuminate\Support\Facades\Cookie::get("token")}}"
                    }
                }).then(function (response) {
                    $("#name").val(response.data.name);
                    $("#id").val(response.data.id);
                    $("#surname").val(response.data.surname);
                    $("#phone").val(response.data.phone);
                    $("#username").val(response.data.username);
                    $("#email").val(response.data.email);
                    $("#make-admin").data("userId",response.data.id);
                    $("#make-psicologist").data("userId",response.data.id);
                }).catch(function (error) {
                    console.log(error);
                });
            });
            $("#reset-password").click(function (){
                console.log("asd");
            });
            $("#make-admin").click(function (){
               var userId = $(this).data("userId")
                axios.post("{{route('api.make.admin')}}",{
                    id:userId
                },{
                    headers: {
                        "Authorization ": "Bearer " + "{{\Illuminate\Support\Facades\Cookie::get("token")}}"
                    }
                }).then((response)=>{
                    toastr.success(response.data.message);
                }).catch((error)=>{
                    toastr.error(error.data.message);
                })
            });
            $("#make-psicologist").click(function (){
                var userId = $(this).data("userId")
                axios.post("{{route('api.make.psychologist')}}",{
                    id:userId
                },{
                    headers: {
                        "Authorization ": "Bearer " + "{{\Illuminate\Support\Facades\Cookie::get("token")}}"
                    }
                }).then((response)=>{
                    toastr.success(response.data.message);
                }).catch((error)=>{
                    toastr.error(error.data.message);
                })
            });
        });
    </script>
@endsection
