<div>
    <h2>Usuarios</h2>
    <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>
    <div class="container table-users">
        <table class="table table-hover">
          <thead>
            <tr align="center">
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Email</th>
              <th>Actualizar</th>
            </tr>
          </thead>
          <tbody>
            @if (isset($user))
                @foreach ($user as $user_table)
                  <tr align="center">
                      <td>{{ $user_table['name'] }}</td>
                      <td>{{ $user_table['lastname'] }}</td>
                      <td>{{ $user_table['email'] }}</td>
                      <td><a href="{{ url('/modificar/usuario/'.$user_table['id']) }}"><i class="material-icons">edit</i></a></td>
                  </tr>
                @endforeach
            @else
                No existe
            @endif
          </tbody>
        </table>
    </div>

</div>
