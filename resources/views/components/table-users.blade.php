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
                <tr align="center">
                <td>{{ $user->name }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td><a href=""><i class="material-icons">edit</i></a></td>
                </tr>
            @else
                No existe
            @endif
          </tbody>
        </table>
    </div>

</div>
