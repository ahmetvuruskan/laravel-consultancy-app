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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label">Günler</label>
                                        <input type="text" id="monday" disabled value="Pazartesi" class="form-control day">
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
                                        <input type="text" id="thursday" disabled value="Perşembe" class="form-control day">
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
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                                                class="nav-link active show">Posts</a>
                                        </li>
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">About
                                                Me</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                                                class="nav-link">Setting</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="my-posts" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    <textarea name="textarea" id="textarea" cols="30" rows="5"
                                                              class="form-control bg-transparent"
                                                              placeholder="Please type what you want...."></textarea>
                                                    <a href="javascript:void()" class="btn btn-primary light px-3"
                                                       data-toggle="modal" data-target="#linkModal"><i
                                                            class="fa fa-link"></i> </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="linkModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Social Links</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <a class="btn-social facebook"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-facebook"></i></a>
                                                                    <a class="btn-social google-plus"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-google-plus"></i></a>
                                                                    <a class="btn-social linkedin"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-linkedin"></i></a>
                                                                    <a class="btn-social instagram"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-instagram"></i></a>
                                                                    <a class="btn-social twitter"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-twitter"></i></a>
                                                                    <a class="btn-social youtube"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-youtube"></i></a>
                                                                    <a class="btn-social whatsapp"
                                                                       href="javascript:void(0)"><i
                                                                            class="fa fa-whatsapp"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void()" class="btn btn-primary light mr-1 px-3"
                                                       data-toggle="modal" data-target="#cameraModal"><i
                                                            class="fa fa-camera"></i> </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="cameraModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Upload images</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Upload</span>
                                                                        </div>
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                   class="custom-file-input">
                                                                            <label class="custom-file-label">Choose
                                                                                file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void();" class="btn btn-primary"
                                                       data-toggle="modal" data-target="#postModal">Post</a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="postModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Post</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <textarea name="textarea" id="textarea2" cols="30"
                                                                              rows="5"
                                                                              class="form-control bg-transparent"
                                                                              placeholder="Please type what you want...."></textarea>
                                                                    <a class="btn btn-primary btn-rounded"
                                                                       href="javascript:void(0)">Post</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="/assets/images/profile/8.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html"><h3
                                                            class="text-black">Collection of textile samples lay
                                                            spread</h3></a>
                                                    <p>A wonderful serenity has take possession of my entire soul like
                                                        these sweet morning of spare which enjoy whole heart.A wonderful
                                                        serenity has take possession of my entire soul like these sweet
                                                        morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary mr-2"><span class="mr-2"><i
                                                                class="fa fa-heart"></i></span>Like
                                                    </button>
                                                    <button class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#replyModal"><span class="mr-2"><i
                                                                class="fa fa-reply"></i></span>Reply
                                                    </button>
                                                </div>
                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="/assets/images/profile/9.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html"><h3
                                                            class="text-black">Collection of textile samples lay
                                                            spread</h3></a>
                                                    <p>A wonderful serenity has take possession of my entire soul like
                                                        these sweet morning of spare which enjoy whole heart.A wonderful
                                                        serenity has take possession of my entire soul like these sweet
                                                        morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary mr-2"><span class="mr-2"><i
                                                                class="fa fa-heart"></i></span>Like
                                                    </button>
                                                    <button class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#replyModal"><span class="mr-2"><i
                                                                class="fa fa-reply"></i></span>Reply
                                                    </button>
                                                </div>
                                                <div class="profile-uoloaded-post pb-3">
                                                    <img src="/assets/images/profile/8.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html"><h3
                                                            class="text-black">Collection of textile samples lay
                                                            spread</h3></a>
                                                    <p>A wonderful serenity has take possession of my entire soul like
                                                        these sweet morning of spare which enjoy whole heart.A wonderful
                                                        serenity has take possession of my entire soul like these sweet
                                                        morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary mr-2"><span class="mr-2"><i
                                                                class="fa fa-heart"></i></span>Like
                                                    </button>
                                                    <button class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#replyModal"><span class="mr-2"><i
                                                                class="fa fa-reply"></i></span>Reply
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="about-me" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p class="mb-2">A wonderful serenity has taken possession of my
                                                        entire soul, like these sweet mornings of spring which I enjoy
                                                        with my whole heart. I am alone, and feel the charm of existence
                                                        was created for the bliss of souls like mine.I am so happy, my
                                                        dear friend, so absorbed in the exquisite sense of mere tranquil
                                                        existence, that I neglect my talents.</p>
                                                    <p>A collection of textile samples lay spread out on the table -
                                                        Samsa was a travelling salesman - and above it there hung a
                                                        picture that he had recently cut out of an illustrated magazine
                                                        and housed in a nice, gilded frame.</p>
                                                </div>
                                            </div>
                                            <div class="profile-skills mb-5">
                                                <h4 class="text-primary mb-2">Skills</h4>
                                                <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                                <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                                <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                                <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                                <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                                <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                            </div>
                                            <div class="profile-lang  mb-5">
                                                <h4 class="text-primary mb-2">Language</h4>
                                                <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                        class="flag-icon flag-icon-us"></i> English</a>
                                                <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                        class="flag-icon flag-icon-fr"></i> French</a>
                                                <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                        class="flag-icon flag-icon-bd"></i> Bangla</a>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Availability <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>27</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Location <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                                Florida</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Year Experience <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Account Setting</h4>
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Email</label>
                                                                <input type="email" placeholder="Email"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Password</label>
                                                                <input type="password" placeholder="Password"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" placeholder="1234 Main St"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address 2</label>
                                                            <input type="text" placeholder="Apartment, studio, or floor"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>City</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>State</label>
                                                                <select class="form-control default-select"
                                                                        id="inputState">
                                                                    <option selected="">Choose...</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Zip</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="gridCheck">
                                                                <label class="custom-control-label" for="gridCheck">
                                                                    Check me out</label>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Sign
                                                            in
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
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
            $("#saveTimes").click(function ()  {
                var days = $(".day").map(function() {
                    return $(this).val();
                }).get();
                var startTimes = $(".startTime").map(function() {
                    return $(this).val();
                }).get();
                var endTimes = $(".endTime").map(function() {
                    return $(this).val();
                }).get();
            });
        })
    </script>

@endsection
