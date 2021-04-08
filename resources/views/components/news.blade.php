@if (isset($data))
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/noticia/actualidad') }}">Noticias</a></li>
                    <li class="breadcrumb-item active">{{$data->news_name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset($data->url_path_image_news) }}" alt="test" class="mx-auto d-block banner-news">
            <div class="carousel-caption">
                <h2 style="font-size:3vw;">{{$data->news_name}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 txt-news">
            <p>
                {!!$data->code_block!!}
            </p>
        </div>
    </div>
    <div class="row txt-date">
        <div class="col-md-12">
            <span>19-Enero-2021 - Juan Guillermo Franco{{ $data->created_ad . ' - '. $data->created_ad }}</span>
        </div>
    </div>

@endif
