@if (isset($data_filter))
    @if ($data_filter['tipo'] == '')
        @php
            $data_filter['tipo'] = 'todas';
        @endphp
    @endif
    @if($data_filter['categoria'] == '')
        @php
            $data_filter['categoria'] = 'todas';
        @endphp
    @endif
@endif
<div class="backgroud-user-panel">
    <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div>
                            <h2>Buscador</h2>
                            <p>Escribe el nombre del contenido:</p>
                            {{--BUSCADOR--}}
                        </div>
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div>
                            <p>Puedes utilizar el filtro para navegar entre tipo Noticia, Eventos y mas:</p>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    @if (isset($data_filter))
                                        Seleccion Tipo: {{ ucfirst($data_filter['tipo']) }}
                                    @else
                                        Seleccion Tipo: Todas
                                    @endif
                                </button>

                                @if (isset($data_filter))
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => 'todas', 'categoria'=> $data_filter['categoria']]) }}">Todas</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => 'noticias', 'categoria'=> $data_filter['categoria']]) }}">Noticias</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => 'eventos', 'categoria'=> $data_filter['categoria']])}}">Eventos</a>
                                        <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => 'wikis', 'categoria'=> $data_filter['categoria']]) }}">Wikis</a>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div>
                            <p>Puedes utilizar el filtro para navegar en las diferentes categorías:</p>
                            <div class="dropdown">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    @if (isset($data_filter))
                                        Seleccion Categorias: {{ ucfirst($data_filter['categoria']) }}
                                    @else
                                        Seleccion Categorias: Todas
                                    @endif
                                </button>
                                @if (isset($data_filter))
                                    <div class="dropdown-menu">
                                        @foreach ($data_filter['category_db'] as $category)
                                            <a class="dropdown-item" href="{{ route('dashboard', ['tipo' => $data_filter['tipo'], 'categoria' => $category->name]) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
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
                                <a href="{{route('admin-categories')}}" class="btn btn-primary box-shadow b-dash">Categorias</a>
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
                            @component('components.table-news',['noticias' => $data_filter['data']])
                                <x-table-news/>
                            @endcomponent
                        @endif
                    </div>
                </div>
            </div>

        </div>
      </div>
</div>
