<div>
    <h2>Contenido</h2>
    <p>Panel modification de contenido:</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Entrada</th>
            <th>Categoria</th>
            <th>Autor_id</th>
            <th>Fecha de creacion</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
    </table class="table table-hover">
    <div class="container table-news">
        <table class="table table-hover">
            <tbody>
            @if (isset($noticias))

                @foreach ($noticias as $noticia)
                    @php
                        if($noticia->type == 'noticias'){
                            $url = 'actualidad';
                        }else{
                            $url = $noticia->type;
                        }
                    @endphp

                    <tr>
                        <td><a href='{{url("/informacion/$url" . "/". $noticia->id ."/". $noticia->news_name)}}' title="{{ $noticia->resume }}">{{ $noticia->news_name }}</a></td>
                        <td>{{ $noticia->category }}</td>
                        <td align="center">{{ $noticia->user_id }}</td>
                        <td>{{ $noticia->created_at }}</td>
                        <td align="center"><a href="{{ url('/informacion/actualizar/'.$noticia->id) }}"><i class="material-icons">edit</i></a></td>
                        {{--<td align="center"><a href="javascript:void(0);" onclick="delete_date('/eliminar/usuario/' , {{ $user_table->id }})"><i class="material-icons" style="color:red" data-toggle="modal" data-target="#myModal">delete</i></a></td>--}}
                        {{--EJEMPLO--}}
                        <td><a href="javascript:void(0)" onclick="delete_date('/informacion/eliminar/' , {{ $noticia->id }})"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
<x-modal-delete-date/>
