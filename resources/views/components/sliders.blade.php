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
                        <div class="carousel-item active" width="600" height="500">
                            <img src="{{ $data_slider->url_path_image }}" alt="Los Angeles" width="1100" height="500">
                            <div class="carousel-caption font">
                                <p>{{ $data_slider->name }}</p>
                            </div>
                        </div>
                    @endif
                    @if ($num != 1)
                        <div class="carousel-item" width="600" height="500">
                            <img src="{{ $data_slider->url_path_image }}" alt="Los Angeles" width="1100" height="500">
                            <div class="carousel-caption font">
                                <p>{{ $data_slider->name }}</p>
                            </div>
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
