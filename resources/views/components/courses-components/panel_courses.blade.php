
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
                                <a href=""><i class="fa fa-pencil-square-o" style="font-size:36px"></i><br><p>Categorias</p></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 jumbotron box-shadow">
                        <div>
                            <h2>Contenido</h2>
                            <p>Panel modification de contenido:</p>
                            <div class="container table-news">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="w-30">Curso</th>
                                            <th class="w-10">Categoria</th>
                                            <th class="w-30">Creacion</th>
                                            <th class="w-15">Modificar</th>
                                            <th class="w-15">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-30"><a href='' title="">Curso nombre</a></td>
                                            <td class="w-10">Categoria curso</td>
                                            <td class="w-30">Fecha</td>
                                            <td class="w-15" align="center"><a href=""><i class="material-icons">edit</i></a></td>
                                            {{--<td align="center"><a href="javascript:void(0);" onclick="delete_date('/eliminar/usuario/' , {{ $user_table->id }})"><i class="material-icons" style="color:red" data-toggle="modal" data-target="#myModal">delete</i></a></td>--}}
                                            {{--EJEMPLO--}}
                                            <td class="w-15" align="center"><a href="javascript:void(0)" onclick="delete_date()"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <p><strong>Buscador:</strong></p>
                        </div>
                        <x-modal-delete-date/>
                    </div>
                </div>
            </div>

        </div>
      </div>
</div>

