@extends("Dashboard.Admin.Layout.layout")
@section('title')
    Yorumlar
@endsection
@section('page-title')
    Yorumlar
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Yorum Yönetimi</h4>
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
                                        <th>Psikolog</th>
                                        <th>Yorum</th>
                                        <th class="text-center">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data['comments'] as $comment)
                                        <tr>
                                            <td><strong>{{$i}}</strong></td>
                                            <td>{{$comment->full_name}}</td>
                                            <td>{{$comment->comment}}</td>
                                            @if($comment->status == "waiting")
                                                <td class="text-center">
                                                    <a href="#" data-id="{{$comment->id}}" data-status="approved" class="btn btn-success btn-xs action">Onayla</a>
                                                    <a href="#" data-id="{{$comment->id}}" data-status="rejected" class="btn btn-danger btn-xs action">Sil</a>
                                                </td>
                                                @else
                                                @if($comment->status == "approved")
                                                   <td class="text-center"> <p class="text-success">Onaylandı</p></td>
                                                    @else
                                                    <td class=" text-center"> <p class="text-danger">Reddedildi</p></td>
                                                @endif
                                            @endif
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
        $(document).ready(function (){
           $(".action").click(function (){
               axios.post("{{route("api.comments.update")}}",{
                     id:$(this).data("id"),
                     status:$(this).data("status")
                },{
                   headers:{
                       "Authorization" : "Bearer {{\Illuminate\Support\Facades\Cookie::get("token")}}"
                   }
               }).then(function (response){
                     if(response.data.status == "success"){
                          toastr.success(response.data.message);
                          setTimeout(function (){
                            window.location.reload();
                          },1000)
                     }else{
                          toastr.error(response.data.message);
                     }
                }).catch(function (error){
                     toastr.error("Bir hata oluştu");
               })
           });
        });
    </script>
@endsection
