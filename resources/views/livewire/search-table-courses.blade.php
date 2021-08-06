
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 jumbotron box-shadow">
    <div>
        <h2>Cursos</h2>
        <p>Panel de administracion:</p>
        <input wire:model="search" type="search" class="form-control" id="buscador-cursos" placeholder="Buscador de Cursos"/>
        <br>
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
                        @foreach($content as $cursos)
                            <tr>
                                <td class="w-30"><a href='' title="{{ $cursos->name }}">{{ $cursos->name }}</a></td>
                                <td class="w-10">{{ $cursos->category }}</td>
                                <td class="w-30">{{ $cursos->created_at }}</td>
                                <td class="w-15" align="center"><a href=""><i class="material-icons">edit</i></a></td>
                                {{--<td align="center"><a href="javascript:void(0);" onclick="delete_date('/eliminar/usuario/' , {{ $user_table->id }})"><i class="material-icons" style="color:red" data-toggle="modal" data-target="#myModal">delete</i></a></td>--}}
                                {{--EJEMPLO--}}
                                <td class="w-15" align="center"><a href="javascript:void(0)" onclick="delete_date()"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        <br>
        @if (isset($content))
            {{ $content->links('components.pagination-links') }}
        @endif
        <br>
        <p><strong>En esta tabla encontrara todos los cursos existentes</strong></p>
    </div>
    <x-modal-delete-date/>
</div>
