<div>
    <div>
        <h2>Categorias</h2>
        <p>Panel de administracion:</p>
        <input wire:model="search" type="search" class="form-control" id="buscador-noticias" placeholder="Buscar contenido"/>
        <br>
        <div class="container table-news">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="w-25">Entrada</th>
                        <th class="w-25">Categoria</th>
                        <th class="w-30">Creacion</th>
                        <th class="w-15">Modificar</th>
                        <th class="w-15">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($contents))
                        @foreach ($contents as $noticia)
                            @php
                                if($noticia->type == 'noticias'){
                                    $url_b = 'actualidad';
                                }else{
                                    $url_b = $noticia->type;
                                }
                            @endphp
                                <tr>
                                    <td class="w-25"><a href='{{ url("/informacion/$url_b" . "/". $noticia->id ."/". $noticia->news_name) }}' title="{{ $noticia->resume }}">{{ $noticia->news_name }}</a></td>
                                    <td class="w-25">{{ $noticia->category }}</td>
                                    <td class="w-30">{{ $noticia->created_at }}</td>
                                    <td class="w-10"><a href="{{ url('/informacion/actualizar/'.$noticia->id) }}"><i class="material-icons">edit</i></a></td>
                                    <td class="w-10"><a href="javascript:void(0);" onclick="delete_date('/informacion/eliminar/' , {{ $noticia->id }})"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                                </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    @if ($contents)
        {{ $contents->links() }}
    @endif
    <br>
    <p><strong>En esta tabla encontrara todas las entradas existentes</strong></p>
</div>
<x-modal-delete-date/>
