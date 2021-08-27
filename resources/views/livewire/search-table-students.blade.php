<div>
    <h2>Cursos</h2>
    <p>Panel de administracion:</p>
    <input wire:model="search" type="search" class="form-control" id="buscador-cursos" placeholder="Buscador de Cursos"/>
    <br>
    <div class="container table-news">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="w-40">Suscriptor/a</th>
                    {{--<th class="w-10">Categoria</th>--}}
                    <th class="w-30">Cursos</th>
                    <th class="w-15">Fecha</th>
                    <th class="w-15">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $student)
                    <tr>

                        <td class="w-40"><a href='javascript:void(0);' title="{{ $student->users->name }}">{{ $student->users->name }}</a></td>
                        <td class="w-30">{{ $student->courses->name }}</td>
                        <td class="w-15">{{ $student->created_at }}</td>
                        <td class="w-15"><a href="javascript:void(0);" onclick="delete_date('/cursos/eliminar/' , {{ $student->id }})"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>

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
    <p><strong>En esta tabla encontrara todos los cursos existentes</strong></p>
</div>
<x-modal-delete-date/>


