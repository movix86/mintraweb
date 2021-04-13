<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 jumbotron box-shadow">
            {{--Filtros--}}
            @if (isset($data_filter))
            {{--ESTA VARIABLE AUN NO SE HA UTILIZADO Y ES PARA EL CRUD DE CATEGORIAS Y FILTROS--}}
                @component('components.vertical-filter-news', ['data_filter' => $data_filter])
                    <x-vertical-filter-news/>
                @endcomponent
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 jumbotron box-shadow">
            {{--Cajas de noticias--}}
            @if (isset($data_filter))
                @foreach ($data_filter['data'] as $noticia)
                        <div class="container">
                            <div class="card" style="width:100%">
                                <a href="{{ url('/información/actual/'. $noticia->id .'/'. $noticia->news_name) }}">
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
            @if (isset($data_filter))
            {{ $data_filter['data']->links('components.pagination-links') }}
            @endif
        </div>
    </div>
</div>
