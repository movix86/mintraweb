@if (isset($data))
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/información/'.$data['tipo']) }}">{{ ucfirst($data['tipo']) }}</a></li>
                    <li class="breadcrumb-item active">{{$data['data_news']->news_name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img src="{{ $data['data_news']->url_path_image_news }}" alt="test" class="mx-auto d-block banner-news">
            <div class="carousel-caption">
                <h2 style="font-size:3vw;">{{$data['data_news']->news_name}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 txt-news">
            <p>
                {!!$data['data_news']->code_block!!}
            </p>
        </div>
    </div>
    <div class="row txt-date">
        <div class="col-md-12">
            <span>{{ $data['data_news']->created_at . ' por '. $data['$user_name'] }}</span>
        </div>
    </div>

@endif
