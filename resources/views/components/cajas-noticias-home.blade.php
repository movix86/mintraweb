<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 jumbotron box-shadow">
            {{--Filtros--}}
            @if (isset($noticias_filter))
            {{--ESTA VARIABLE AUN NO SE HA UTILIZADO Y ES PARA EL CRUD DE CATEGORIAS Y FILTROS--}}
                @component('components.vertical-filter-news', ['noticias_filter' => $noticias_filter])
                    <x-vertical-filter-news/>
                @endcomponent
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 jumbotron box-shadow">
            {{--Cajas de noticias--}}
            @if (isset($noticias_filter))
                @foreach ($noticias_filter['noticias'] as $noticia)
                        <div class="container">
                            <div class="card" style="width:100%">
                                <a href="{{ url('/noticia/actual/'. $noticia->id .'/'. $noticia->news_name) }}">
                                <img class="card-img-top" src="{{ $noticia->url_path_image_news }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $noticia->news_name }}</h4>
                                </a>
                                    <p class="card-text box-news">{{ $noticia->resume }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                @endforeach
            @endif
            @if (isset($noticias_filter))
            {{ $noticias_filter['noticias']->links('components.pagination-links') }}
            @endif
        </div>
    </div>
</div>
