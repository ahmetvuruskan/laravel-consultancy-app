@extends("Dashboard.Admin..Layout.layout")
@section('title')
    {{$title}} | Blog  Yönetimi
@endsection
@section('page-title')
    Blog  Yönetimi
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Blog  Yönetimi</h4>
                            <div>
                                <a href="{{route("admin.blog.add")}}" class="btn btn-primary">Blog  Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Blog Adı</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data['blogs'] as $blog)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td>{{$blog->title}}</td>
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
                                                           href="{{route("admin.blog.edit",$blog->id)}}">Düzenle</a>
                                                        <a class="dropdown-item" id="{{$blog->id}}">Sil</a>
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
            $(".dropdown-item").click(function () {
                var id = $(this).attr("id");

                axios.post("{{route("api.blog.delete")}}", {
                    id: id
                }, {
                    headers: {
                        "Authorization": "Bearer {{\Illuminate\Support\Facades\Cookie::get("token")}}",
                    }
                }).then((response) => {
                    location.reload();
                })
            });
        });

    </script>

@endsection
