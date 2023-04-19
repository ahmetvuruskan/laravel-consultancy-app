@extends("Dashboard.Admin.Layout.layout")
@section('title')
    {{$title}} | Profil
@endsection
@section('page-title')
    Profil
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profilinizi Düzenliyorsunuz</h4>
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
                            <form method="post" enctype="multipart/form-data" action="{{route("psychologist.profile.update")}}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Ünvan</label>
                                        <input type="text" name="title" class="form-control"
                                               value="{{$data['profile']->title}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Profil Resmi</label>
                                        <input type="file" name="profile_photo" class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Okul</label>
                                        <input type="text" name="last_school" required class="form-control"
                                               value="{{$data['profile']->school}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <label for="settingValue" class="col-form-label">Açıklama</label><br>
                                        <small>Lütfen biçimlendirme yaparak ekleyiniz.Buraya nasıl kayıt ederseniz profilinizde öyle gözükecektir</small>
                                        <textarea id="ckEditor" name="description" class="form-control">{{$data['profile']->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end mr-xl-5">
                                    <button class="btn btn-primary">Kaydet</button>
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
    <script src="/assets/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#ckEditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
