<div>
    <div class="searchy">
        <input wire:model="search" type="search" class="form-control" id="buscador-noticias" placeholder="Buscar contenido"/>
    </div>
    <br>
    <div class="box-searchy">
        @if ($contents)
            @foreach($contents as $find)
                @php
                    if($find->type == 'noticias'){
                        $url_b = 'actualidad';
                    }else{
                        $url_b = $find->type;
                    }
                @endphp
                <div class="table-responsive-xl">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td class="w-80"><a href='{{url("/informacion/$url_b" . "/". $find->id ."/". $find->news_name)}}' title="{{ $find->resume }}">{{ $find->news_name }}</a></td>
                                <td class="w-10"><a href="{{ url('/informacion/actualizar/'.$find->id) }}"><i class="material-icons">edit</i></a></td>
                                <td class="w-10"><a href="javascript:void(0)" onclick="delete_date('/informacion/eliminar/' , {{ $find->id }})"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>
</div>
