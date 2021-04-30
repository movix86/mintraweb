<div>
    <h2>Usuarios</h2>
    <p>Panel modification de usuarios</p>
    <div class="container table-users">
        <table class="table table-hover">
          <thead>
            <tr align="center">
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Email</th>
              <th>Actualizar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @if (isset($user))
                @foreach ($user as $user_table)
                  <tr align="center">
                    <td>{{ $user_table->name }}</td>
                    <td>{{ $user_table->lastname }}</td>
                    <td>{{ $user_table->email }}</td>
                    <td><a href="{{ url('/modificar/usuario/'.$user_table->id) }}"><i class="material-icons">edit</i></a></td>
                    @if (Auth::user()->id == $user_table->id)
                        <td><a href="{{ url('/modificar/usuario/'.$user_table->id) }}"><i class="material-icons" style="color:rgb(0, 116, 6)">delete</i></a></td>
                    @else
                        {{--<td><a href="{{ url('/eliminar/usuario/'.$user_table->id) }}"><i class="material-icons" style="color:red">delete</i></a></td>--}}
                        <td><a href="javascript:void(0)" onclick="delete_date('/eliminar/usuario/' , {{ $user_table->id }})"><i class="material-icons" data-toggle="modal" data-target="#myModal" style="color:red">delete</i></a></td>
                    @endif


                  </tr>
                @endforeach




            @else
                No existe
            @endif
          </tbody>
        </table>
    </div>
</div>
<x-modal-delete-date/>
