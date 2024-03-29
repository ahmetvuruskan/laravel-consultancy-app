@extends("Dashboard.Admin..Layout.layout")
@section('title')
    {{$title}} | Slider Yönetimi
@endsection
@section('page-title')
    Slider Yönetimi
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Slider Yönetimi</h4>
                            <div>
                                <a href="{{route("admin.cms.sliders.add")}}" class="btn btn-primary">Slider Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Slider resim</th>
                                        <th>Slider Açıklama</th>
                                        <th>Slider Başlık</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data['sliders'] as $slider)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td><img src="" alt="">{{$slider->slider_image}}</td>
                                            <td>{{$slider->slider_text_1}}</td>
                                            <td>{{$slider->slider_header}}</td>
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
                                                        <a class="dropdown-item"
                                                           href="{{route("admin.cms.sliders.edit",$slider->id)}}">Düzenle</a>
                                                        <a class="dropdown-item delete-slider"
                                                           id="{{$slider->id}}">Sil</a>
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
@section('js')
    <script>
        $(document).ready(function () {
            $(document).on("click", ".delete-slider", function () {
                axios.post('{{route("admin.cms.sliders.delete")}}', {id: $(this).attr("id")}, {
                    headers: {
                        "Authorization ": "Bearer " + "{{\Illuminate\Support\Facades\Cookie::get("token")}}"
                    }
                }).then(function (response) {
                    if (response.data.status) {
                        toastr.success(response.data.message);
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000)
                    } else {
                        toastr.error(response.data.message);
                    }
                }).catch(function (error) {
                    toastr.error("Bir hata oluştu");
                });
            })
        });
    </script>
@endsection
