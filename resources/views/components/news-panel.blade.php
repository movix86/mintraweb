<div class="backgroud-user-panel">
    <div class="container">
        <div class="row">
            {{--
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 jumbotron box-shadow">
                        @if (isset($usuarios))
                            @component('components.table-users', ['user' => $usuarios])
                                <x-table-users/>
                            @endcomponent
                        @endif
                    </div>
                </div>
            </div>
            --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 jumbotron box-shadow">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{route('create-page')}}" class="btn btn-primary box-shadow b-dash">Agregar<br>Noticia</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="#" class="btn btn-primary box-shadow b-dash">Categorias</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a class="btn btn-primary box-shadow b-dash">Agregar <br>Evento</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ url('/slider/admin') }}" class="btn btn-primary box-shadow b-dash">Sliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 jumbotron box-shadow">
                        @if (isset($noticias))
                            @component('components.table-news',['noticias' => $noticias])
                                <x-table-news/>
                            @endcomponent
                        @endif
                    </div>
                </div>
            </div>

        </div>
      </div>
</div>
