
<div class="form-user">
    <form method="POST" action="{{ isset($usuario) ? url('actualizar/usuario/') : url('guardar/usuario/') }}">
        @csrf
        {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
        @include('flash-message')
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

        <input type="hidden" name="id" value="{{ isset($usuario) ? $usuario->id : '' }}">
        <div class="form-group">
            <label for="name">Nombre</label><br>
            <input type="text" class="form-control" name="name" id="name" value="{{ isset($usuario) ? $usuario->name : old('name') }}"><br>
        </div>
        <div class="form-group">
            <label for="lastname">Apellido</label><br>
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ isset($usuario) ? $usuario->lastname : old('lastname') }}"><br>
        </div>
        <div class="form-group">
            <label for="email">Email</label><br>
            <input type="text" class="form-control" name="email" id="email" value="{{ isset($usuario) ? $usuario->email : '' }}"><br>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label><br>
            <input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="Nueva Contraseña"><br>
        </div>
        <button type="submit" class="btn btn-primary" name="guardar" id="guardar">Guardar</button><br>
    </form>
</div>
