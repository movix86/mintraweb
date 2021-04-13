<div>
    <div>
        <h2>Noticias</h2>
        <p>Panel modification de Noticias:</p>
        <div class="container table-news">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Noticia</th>
                  <th>Categoria</th>
                  <th>Autor_id</th>
                  <th>Fecha de creacion</th>
                  <th>Modificar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @if (isset($noticias))
                @php
                    if($noticias['tipo'] == 'noticias'){
                        $url = 'actualidad';
                    }else{
                        $url = $noticias['tipo'];
                    }
                @endphp
                    @foreach ($noticias['data'] as $noticia)
                        <tr>
                            <td><a href='{{url("/información/$url" . "/". $noticia->id ."/". $noticia->news_name)}}' title="{{ $noticia->resume }}">{{ $noticia->news_name }}</a></td>
                            <td>{{ $noticia->category }}</td>
                            <td align="center">{{ $noticia->user_id }}</td>
                            <td>{{ $noticia->created_at }}</td>
                            <td align="center"><a href="{{ url('/información/actualizar/'.$noticia->id) }}"><i class="material-icons">edit</i></a></td>
                            <td align="center"><a href=""><i class="material-icons" style="color:red">delete</i></a></td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
        </div>

    </div>

</div>
