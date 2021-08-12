<div class="backgroud-user-panel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 jumbotron box-shadow">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ route('create-category-courses') }}" class="btn btn-primary box-shadow b-dash">Agregar <br>Categoria</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 jumbotron box-shadow">
                        <div>
                            <h2>Categorias</h2>
                            <p>Panel de administracion:</p>
                            <input wire:model="search" type="search" class="form-control" id="buscador-cursos" placeholder="Buscador de Cursos"/>
                            <br>
                            <div class="container table-news">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="w-30">Categoria</th>
                                            <th class="w-15">Creacion</th>
                                            <th class="w-15">Edit</th>
                                            <th class="w-15">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($content as $category)
                                            <tr>
                                                <td class="w-40"><a href='javascript:void(0);' title="{{ $category->name }}">{{ $category->name }}</a></td>
                                                <td class="w-30">{{ $category->created_at }}</td>
                                                {{--<td align="center"><a href="javascript:void(0);" onclick="delete_date('/eliminar/usuario/' , {{ $user_table->id }})"><i class="material-icons" style="color:red" data-toggle="modal" data-target="#myModal">delete</i></a></td>--}}
                                                {{--EJEMPLO--}}
                                                <td class="w-15"><a href="javascript:void(0);"><i class="material-icons">edit</i></a></td>
                                                <td class="w-15"><a href="javascript:void(0);" onclick="delete_date('/categoria-cursos/eliminar/' , {{ $category->id }})"><i class="material-icons" style="color:red" data-toggle="modal" data-target="#myModal">delete</i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            @if ($content)
                                {{ $content->links() }}
                            @endif
                            <br>
                            <p><strong>En esta tabla encontrara todas las categorias existentes</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal-delete-date/>
</div>
