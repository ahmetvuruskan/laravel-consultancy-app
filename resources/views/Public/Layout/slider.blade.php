@section("slider")
    <div class="banner-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php $i=0;  @endphp
                @foreach($data['sliders'] as $slider)
                    <div class="carousel-item {{$i == 0 ? "active": ""}} ">
                        <img class="d-block w-100" src="/Public/images/{{$slider->slider_image}}" alt="First slide">
                    </div>
                    @php $i++; @endphp
                @endforeach

            </div>
        </div>
    </div>
@endsection
