
@section("slider")
    <div class="banner-slider">
        @foreach($data['sliders'] as $slider)
        <div style="background: url('/Public/images/{{$slider->slider_image}}')" class="banner1">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-5">
                        <!-- Slider Title -->
                        <div class="main-title main-title-style2">
                            <span>{{$slider->slider_text_1}}</span>
                            <h1>
                               {{$slider->slider_header}}
                            </h1>
                            <p>
                                {{$slider->paragraph}}
                            </p>
                            @if($slider->button_status == 1)
                                <a href="{{$slider->button_link}}" class="btn btn-primary" tabindex="0">{{$slider->button_text}}</a>
                            @endif
                        </div>
                        <!--//End Slider Title -->

                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>



    @endsection
