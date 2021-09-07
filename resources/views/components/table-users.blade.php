<div>
    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 padding-20">
            <h2>Hola {{Auth::user()->name}}</h2>
            <p>*Panel modificación de usuarios</p>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 padding-20" align="center">
            @if (Route::has('register'))
                <a href="{{ route('mis-cursos', [Auth::user()->id]) }}"><i class="fa fa-mortar-board" style="font-size:36px"></i><br>Mis cursos</a>
            @endif
        </div>
    </div>
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
