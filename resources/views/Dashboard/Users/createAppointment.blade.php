@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Randevu Ekle
@endsection
@section('page-title')
    Randevu Ekle
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Randevu Ekle</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="row justify-content-center">
                                        <div class=" col-md-6 alert alert-danger mt-3 ">
                                            {{$error}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label">Tarih</label>
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="btn btn-primary mb-2" id="get_available_times">Saatleri Getir</div>
                                </div>
                                <div class="row justify-content-center" id="available_times">
                                </div>
                                <div class="row justify-content-end mr-xl-5">
                                    <button id="add" class="btn btn-primary">Ekle</button>
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
        $(document).ready(() => {
            let div = $("#available_times");
            $("#get_available_times").click(() => {
                div.empty();
                let data = {
                    specialist_id: {{$data['order']->user_id}},
                    duration: {{$data['order']->session_duration}},
                    date: $("input[name='date']").val()
                }
                axios.post("{{route("api.get.available.times")}}", data, {
                    headers: {
                        "Authorization": "Bearer {{\Illuminate\Support\Facades\Cookie::get("token")}}"
                    }
                }).then((response) => {
                    let data = response.data.times;
                    for (let key in data) {
                        let markup = `<div class="btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary">
      <input type="checkbox" name="time" value="${data[key]}" autocomplete="off"> ${data[key]}
  </label>
</div>`;
                        div.append(markup);
                    }
                })
            })
            $("#add").click(()=>{
                let data = {
                    time :$(".active").children("input").val(),
                    date : $("input[name='date']").val(),
                    order_id : "{{$data['order']->order_id}}",
                    specialist_id: {{$data['order']->user_id}},
                    buyer_id : {{\Illuminate\Support\Facades\Auth::user()->id}},
                    product_id : {{$data['order']->product_id}},
                    number_of_sessions : {{$data['order']->number_of_sessions}},
                    duration : {{$data['order']->session_duration}},
                }
                axios.post("{{route("api.create.appointment")}}",data,{
                    headers:{
                        "Authorization" : "Bearer {{\Illuminate\Support\Facades\Cookie::get("token")}}"
                    }
                }).then((response)=>{
                    toastr.success(response.data.message);
                    setTimeout(()=>{
                        window.location.href = "{{route("admin.user.interviews")}}"
                    },1000)
                }).catch((error)=>{
                    toastr.error(error.response.data.message);
                });
            })
        })
    </script>
@endsection
