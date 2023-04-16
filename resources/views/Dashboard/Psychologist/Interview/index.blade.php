@extends("Dashboard.Admin..Layout.layout")
@section('css')
    <link rel="stylesheet" href="/assets/select2/select2.css">
@endsection
@section('title')
    {{$title}} | Görüşme Paketleri ve Uzmanlık Alanları Tanımlama
@endsection
@section('page-title')
    Görüşme Paketleri ve Uzmanlık Alanları
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Görüşme Paketleri ve Uzmanlık Alanları Yönetimi</h4>
                            <div class="justify-content-end">
                                <a id="add-package" class="btn btn-primary">Görüşme Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Paket</th>
                                        <th>30 Dk Ücret</th>
                                        <th>60 Dk Ücret</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data['products'] as $package)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td>{{$package->package_name}}</td>
                                            <td>{{$package->thirty_min}} ₺</td>
                                            <td>{{$package->sixty_min}} ₺</td>
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
                                                        <a class="dropdown-item delete-product" id="{{$package->id}}" >Sil</a>
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
    <div class="modal fade" id="add-pacakge-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paket Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div>
                        <div class="form-group">
                            <label for="package-name">Paket Seçiniz</label>
                            <select name="package" id="package_name" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="thirty_min">30 Dk ücret</label>
                                    <input required  id="thirty_min"  class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="sixty_min">60 Dk ücret</label>
                                    <input required id="sixty_min" class="form-control">
                                </div>
                            </div>
                        </div>
                   </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="closeButton" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="button" id="saveButton" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/assets/select2/select2.js"></script>
    <script>
        $(document).ready(function () {
            $('#add-package').click(function () {
                $('#add-pacakge-modal').modal('show');
                $("#package_name").select2({
                    ajax:{
                        beforeSend:function (xhr) {
                            xhr.setRequestHeader('Authorization',"Bearer {{\Illuminate\Support\Facades\Cookie::get('token')}}");
                        },
                        url:"{{route("admin.package.search")}}",
                        type:"POST",
                    },
                    placeholder:"Lütfen bir paket seçiniz",

                });

            });
            $("#saveButton").click(()=>{
                const data = {
                    package:$("#package_name").val(),
                    thirty_min:$("#thirty_min").val(),
                    sixty_min:$("#sixty_min").val(),
                };
                axios.post("{{route("api.save.products")}}",data,{
                    headers:{
                        "Authorization" : "Bearer {{\Illuminate\Support\Facades\Cookie::get('token')}}"
                    }
                }).then((response)=>{
                    toastr.success(response.data.message);
                    reset();
                }).catch((error)=>{
                    console.log(error.response.data.message);
                   message = error.response.data.message;
                    for(let key in message){
                        toastr.error(message[key]);
                    }
                    reset();
                });
            });
            $("#closeButton").click(()=>{
                reset();
                location.reload();
            });
        });
        function reset() {
            $("#package-name").val(null).trigger('change');
            $("#profession-name").val(null).trigger('change');
        }
        $(".delete-product").click(()=>{
            var id = $(".delete-product").prop("id");
            console.log(id);
            console.log($(".delete-product"));
            axios.post("{{route("api.delete.products")}}",{"id":id},{
                headers:{
                    "Authorization" : "Bearer {{\Illuminate\Support\Facades\Cookie::get('token')}}"
                }
            }).then((reponse)=>{
                toastr.success(reponse.data.message);
                location.reload();
            }).catch((error)=>{
                toastr.error(error.response.data.message);
            });
        });

    </script>
@endsection

