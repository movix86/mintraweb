<div>
    <h2>Contenido</h2>
    <p>Panel modification de contenido:</p>
    <div class="container table-news">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="w-30">Entrada</th>
                    <th class="w-10">Categoria</th>
                    <th class="w-10">Autor_id</th>
                    <th class="w-30">Creacion</th>
                    <th class="w-15">Modificar</th>
                    <th class="w-15">Eliminar</th>
                </tr>
            </thead>
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
                        <td class="w-30"><a href='{{url("/informacion/$url" . "/". $noticia->id ."/". $noticia->news_name)}}' title="{{ $noticia->resume }}">{{ $noticia->news_name }}</a></td>
                        <td class="w-10">{{ $noticia->category }}</td>
                        <td class="w-10" align="center">{{ $noticia->user_id }}</td>
                        <td class="w-30">{{ $noticia->created_at }}</td>
                        <td class="w-15" align="center"><a href="{{ url('/informacion/actualizar/'.$noticia->id) }}"><i class="material-icons">edit</i></a></td>
                        {{--<td align="center"><a href="javascript:void(0);" onclick="delete_date('/eliminar/usuario/' , {{ $user_table->id }})"><i class="material-icons" style="color:red" data-toggle="modal" data-target="#myModal">delete</i></a></td>--}}
                        {{--EJEMPLO--}}
                        <td class="w-15" align="center"><a href="javascript:void(0)" onclick="delete_date('/informacion/eliminar/' , {{ $noticia->id }})"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <br>
    <p><strong>Buscador:</strong></p>
    @livewire('search-content')
</div>
<x-modal-delete-date/>
