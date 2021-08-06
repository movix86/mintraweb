<div class="form-user">
    <form action="{{ url('/guardar-categoria-curso') }}" method="POST" enctype="multipart/form-data">
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
        {{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}

        {{--<input type="hidden" name="id" value="">--}}
        <div class="form-group">
            <label for="name">Nombre de la Categoria</label><br>
            <input type="text" class="form-control" name="name" id="name" value=""><br>
        </div>
        <div class="form-group">
            <label for="lastname">Descripcion de la Categoria</label><br>
            <input type="text" class="form-control" name="description" id="description" value=""><br>
        </div>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input url_path_image_course_btn" id="url_path_image_category_btn" name="url_path_image_category_btn">
            <label class="custom-file-label" for="url_path_image_category_btn">Imagen de boton, debe ser de 300*100px</label>
        </div>
        <button type="submit" class="btn btn-primary" name="guardar" id="guardar">Guardar</button><br>
    </form>
</div>
