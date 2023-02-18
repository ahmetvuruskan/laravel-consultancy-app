@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Slider Ekle
@endsection
@section('page-title')
    Yeni Slider Ekle
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bu form aracılığyla slider ekleyebilirsiniz.</h4>
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
                            <form method="post" action="{{route("admin.cms.sliders.insert")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Slider Metin</label>
                                        <input type="text" name="slider_text_1"  class="form-control"
                                               placeholder="Slider Metin">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Slider Başlık</label>
                                        <input type="text" name="slider_header" required class="form-control"
                                               placeholder="Slider Başlık">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Slider Paragraf</label>
                                        <input type="text" name="slider_paragraph" required class="form-control"
                                               placeholder="Slider Paragraf">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label">Slider Resim</label>
                                        <input type="file" name="slider_image" required class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Slider Sıra</label>
                                        <input type="number" name="slider_order" required class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Slider Buton</label>
                                        <select id="buttonStatus" name="slider_button" required class="form-control">
                                            <option selected disabled value="">Seçiniz</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <div  class="row justify-content-center button-items">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Buton Metin</label>
                                        <input id="buttonText" type="text"  name="slider_button_text" required class="form-control">
                                    </div>
                                </div>
                                <div  class="row justify-content-center button-items">
                                    <div class="form-group col-lg-6">
                                        <label  class="col-form-label">Button Link</label>
                                        <input id="buttonlink" type="text"   name="slider_button_link" required class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-end mr-xl-5">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
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
            $("#buttonStatus").change(function (){
                if($(this).val() == 1){
                    $("#buttonText").attr("required",true);
                    $("#buttonlink").attr("required",true);

                }else{
                    $("#buttonText").attr("required",false);
                    $("#buttonlink").attr("required",false);
                }
            });
        });
    </script>
@endsection
