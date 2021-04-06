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
                    @foreach ($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->news_name }}</td>
                            <td>{{ $noticia->category }}</td>
                            <td>{{ $noticia->user_id }}</td>
                            <td>{{ $noticia->created_at }}</td>
                            <td><a href="">M</a></td>
                            <td><a href="">E</a></td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
        </div>

    </div>

</div>
