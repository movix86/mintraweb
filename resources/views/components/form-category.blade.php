
<div class="form-user">
    <form method="POST" action="{{ isset($data_category) ? route('save-update-category') : url('categoria/guardar/') }}">
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

        <input type="hidden" name="id" value="{{ isset($data_category) ? $data_category->id : '' }}">
        <div class="form-group">
            <label for="name">Nombre de la Categoria</label><br>
            <input type="text" class="form-control" name="name" id="name" value="{{ isset($data_category) ? $data_category->name : old('name') }}"><br>
        </div>
        <div class="form-group">
            <label for="lastname">Descripcion de la Categoria</label><br>
            <input type="text" class="form-control" name="description" id="description" value="{{ isset($data_category) ? $data_category->description : old('description') }}"><br>
        </div>
        <button type="submit" class="btn btn-primary" name="guardar" id="guardar">Guardar</button><br>
    </form>
</div>
