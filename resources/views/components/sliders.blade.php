<div>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            @if (isset($sliders))
                @php $num_indicator=[]; @endphp
                @php $num=0; @endphp
                @foreach ($sliders as $data_indicator)

                    @php $num_indicator[]=$data_indicator->url_path_image; @endphp
                    @php $num=$num+1; @endphp
                    @if ($num == 1)
                        <li data-target="#demo" data-slide-to="{{$num}}" class="active"></li>
                    @endif
                    @if ($num != 1)
                        <li data-target="#demo" data-slide-to="{{$num}}"></li>
                    @endif
                @endforeach
            @endif
        </ul>

        <div class="carousel-inner">
            @if (isset($sliders))
                @php $num_url=[]; @endphp
                @php $num=0; @endphp
                @foreach ($sliders as $data_slider)
                    @php $num_url[]=$data_slider->url_path_image; @endphp
                    @php $num=$num+1; @endphp
                    @if ($num == 1)
                        <div class="carousel-item slider-w active">
                            @if (empty($data_slider->url_news))
                                <img src="{{ $data_slider->url_path_image }}" alt="slides-mintraweb">
                                <div class="carousel-caption font">
                                    <p>{{ $data_slider->name }}</p>
                                </div>
                            @else
                                <a href="{{ $data_slider->url_news }}" target="_blank">
                                    <img src="{{ $data_slider->url_path_image }}" alt="slides-mintraweb">
                                    <div class="carousel-caption font">
                                        <p>{{ $data_slider->name }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endif
                    @if ($num != 1)
                        <div class="carousel-item slider-w">

                            @if (empty($data_slider->url_news))
                                <img src="{{ $data_slider->url_path_image }}" alt="slides-mintraweb">
                                <div class="carousel-caption font">
                                    <p>{{ $data_slider->name }}</p>
                                </div>
                            @else
                                <a href="{{ $data_slider->url_news }}" target="_blank">
                                    <img src="{{ $data_slider->url_path_image }}" alt="slides-mintraweb">
                                    <div class="carousel-caption font">
                                        <p>{{ $data_slider->name }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endif
        </div>


        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
    </div>

</div>
