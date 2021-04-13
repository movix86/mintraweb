<div class="backgroud-user-panel">
    <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div>
                            <h2>Noticias/Eventos</h2>
                            <p>Puedes utilizar el filtro para navegar en las diferentes categorías:</p>
                            {{--BUSCADOR--}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div>
                            <h2>Noticias/Eventos</h2>
                            <p>Puedes utilizar el filtro para navegar en las diferentes categorías:</p>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Seleccione la categoria
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Todas</a>
                                    <a class="dropdown-item" href="{{ route('dashboard', 'noticias') }}">Noticias</a>
                                    <a class="dropdown-item" href="{{ route('dashboard', 'eventos')}}">Eventos</a>
                                    <a class="dropdown-item" href="{{ route('dashboard', 'wikis') }}">Wikis</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div>
                            <h2>Noticias/Eventos</h2>
                            <p>Puedes utilizar el filtro para navegar en las diferentes categorías:</p>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Seleccione la categoria
                                </button>
                                @if (isset($data_filter))
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">Todas</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => $data_filter['tipo'], 'comunicados']) }}">Comunicados</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => $data_filter['tipo'], 'OAR']) }}">OAR</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => $data_filter['tipo'], 'convocatorias']) }}">Convocatorias</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => $data_filter['tipo'], 'documentos']) }}">Documentos</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


        {{--Arriba esta el filtro--}}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 jumbotron box-shadow">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{route('create-page', 'noticia')}}" class="btn btn-primary box-shadow b-dash">Agregar<br>Noticia</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="#" class="btn btn-primary box-shadow b-dash">Categorias</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{route('create-page', 'evento')}}" class="btn btn-primary box-shadow b-dash">Agregar <br>Evento</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ url('/slider/admin') }}" class="btn btn-primary box-shadow b-dash">Sliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 jumbotron box-shadow">
                        @if (isset($data_filter))
                            @component('components.table-news',['noticias' => $data_filter])
                                <x-table-news/>
                            @endcomponent
                        @endif
                    </div>
                </div>
            </div>

        </div>
      </div>
</div>
