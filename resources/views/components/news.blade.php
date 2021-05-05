@if (isset($data))
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/informacion/'.$data['tipo']) }}">{{ ucfirst($data['tipo']) }}</a></li>
                    <li class="breadcrumb-item active">{{$data['data_news']->news_name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
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
        </div>
        <div class="col-md-2 news-relation activacion-mobile">
            <h5>Publicaciones Recientes</h5>
            <br>
            @foreach ($data['categorias'] as $noticia_relacionada)
                <a href="{{ url('/informacion/'.$data['tipo']).'/'. $noticia_relacionada->id . '/' . $data['data_news']->news_name }}">
                    <div class="card" style="width:100%">
                        <img class="card-img-top" src="{{ $noticia_relacionada->url_path_image_news }}" alt="Card image" style="width:100%">
                        <div class="card-body">
                        {{--<h4 class="card-title">{{ $noticia_relacionada->news_name }}</h4>--}}
                        <p class="card-text">{{ $noticia_relacionada->news_name }}</p>
                        </div>
                    </div>
                </a>
                <br>
            @endforeach
        </div>
    </div>
@endif
