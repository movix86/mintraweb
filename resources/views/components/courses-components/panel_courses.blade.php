<div class="backgroud-user-panel">
    <div class="container">
        {{--Arriba esta el filtro--}}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 jumbotron box-shadow">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ route('course-create') }}"><i class="fa fa-plus-square" style="font-size:36px;"></i><br><p>Agregar Curso</p></a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ route('category-courses-site') }}"><i class="fa fa-pencil-square-o" style="font-size:36px"></i><br><p>Categorias</p></a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ route('category-courses-site') }}"><i class="fa fa-vcard-o" style="font-size:36px"></i><br><p>Inscripciones <br>Estudiantes</p></a>
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
                        <livewire:search-table-courses />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

