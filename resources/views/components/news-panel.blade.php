<div class="backgroud-user-panel">
    <div class="container">
        {{--Arriba esta el filtro--}}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 jumbotron box-shadow">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{route('create-page', 'noticia')}}" class="btn btn-primary box-shadow b-dash">Agregar<br>Entrada</a>
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
                        {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
                        @include('flash-message')
                        {{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($data_filter))
                            @livewire('search-content', ['noticias' => $data_filter['data']])
                        @endif
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
