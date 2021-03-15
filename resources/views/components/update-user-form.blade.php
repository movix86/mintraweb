@if (isset($usuario))
    <h2>Modificar Usuario</h2>
@else
    <h2>Crear Usuario</h2>
@endif
<br>
<form method="POST" action="{{ isset($usuario) ? url('actualizar/usuario/') : url('guardar/usuario/') }}">
    @csrf
    <input type="hidden" name="id" value="{{ isset($usuario) ? $usuario->id : '' }}">
    <label for="name">Nombre</label><br>
    <input type="text" name="name" id="name" value="{{ isset($usuario) ? $usuario->name : old('name') }}"><br>
    <label for="lastname">Apellido</label><br>
    <input type="text" name="lastname" id="lastname" value="{{ isset($usuario) ? $usuario->lastname : old('lastname') }}"><br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="{{ isset($usuario) ? $usuario->email : '' }}"><br>
    <label for="password">Contraseña</label><br>
    <input type="password" name="password" id="password" minlength="8" placeholder="Nueva Contraseña"><br>
    <button type="submit" name="guardar" id="guardar">Guardar</button><br>
</form>

{{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
@if ($errors->any())
    <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
            @endforeach
         </ul>
    </div>
@endif

{{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
@include('flash-message')
