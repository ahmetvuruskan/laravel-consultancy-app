@extends('.Dashboard.Admin.Layout.layout')
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
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">

                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="@fileRoute/{{\Illuminate\Support\Facades\Auth::user()->profile}}"
                                         class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{\Illuminate\Support\Facades\Auth::user()->name." ".\Illuminate\Support\Facades\Auth::user()->surname}}</h4>
                                    </div>
                                </div>

                            </div>
                            <p class=" alert alert-danger text-center">Profil bilgilerinizi güncellemeniz gerekmektedir.</p>
                            <p class=" alert alert-danger text-center">Danışanların size ulaşması için görüşme tanımlamanız gerekmektedir.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            @if($data['time_status'])
                                <div class="alert alert-outline-success" role="alert">
                                    Sistemde tanımlanmış saatleriniz bulunmaktadır. Eğer güncelleme yapacaksanız
                                    sadece güncellenecek günü / saati değil hepsini tekrardan seçiniz.
                                </div>
                            @else
                                <div class="alert alert-outline-danger" role="alert">
                                    Sistemde tanımlanmış saatleriniz bulunmamaktadır. Lütfen uygun saatleri seçiniz.
                                    Saat çalışmayacağınız günleri 00:00:00 - 00:00:00 olarak seçiniz. Bütün günleri doldurunuz.
                                </div>
                            @endif

                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label">Günler</label>
                                        <input type="text" id="monday" disabled value="Pazartesi"
                                               class="form-control day">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label">Başlangıç Saat</label>
                                        <input type="time" id="mondayStart" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label">Bitiş Saat</label>
                                        <input type="time" id="mondayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input type="text" id="tuesday" disabled value="Salı" class="form-control day">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="tuesdayStart" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time" id="tuesdayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input type="text" id="wednesday" disabled value="Çarşamba"
                                               class="form-control day">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="wednesdayStart" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="wednesdayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input type="text" id="thursday" disabled value="Perşembe"
                                               class="form-control day">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="thursdayStart" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="thursdayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input type="text" id="friday" disabled value="Cuma" class="form-control day">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="fridayStart" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="fridayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input type="text" id="saturday" disabled value="Cumartesi"
                                               class="form-control day">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="saturdayStart" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="saturdayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input type="text" id="sunday" disabled value="Pazar" class="form-control day">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time" id="sundayStart" value="" class="form-control startTime">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="time" id="sundayEnd" class="form-control endTime">
                                    </div>
                                </div>
                                <div class="row justify-content-end mt-2">
                                    <button id="saveTimes" class="btn btn-primary">Kaydet</button>
                                </div>
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
            $("#saveTimes").click(function () {
                let data = {
                    days: $(".day").map(function () {
                        return $(this).val();
                    }).get(),
                    startTimes: $(".startTime").map(function () {
                        return $(this).val();
                    }).get(),
                    endTimes: $(".endTime").map(function () {
                        return $(this).val();
                    }).get(),
                    user_id: {{\Illuminate\Support\Facades\Auth::user()->id}}
                }
                axios.post("{{route('api.update.available.times')}}", data, {
                    headers: {
                        "Authorization": "Bearer {{\Illuminate\Support\Facades\Cookie::get('token')}}"
                    }
                }).then((response) => {
                    console.log(response)
                }).catch((error) => {
                    console.log(error)
                })

            });
        })
    </script>

@endsection
