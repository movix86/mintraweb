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
<form action="{{ isset($data) ? route('save-update-courses') : route('course-save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 upload-banner-new">
            <div class="form-group">
                <label for="upload-banner-news">Elije el banner de la noticia</label>
                <input type="file" class="form-control-file" id="url_path_image_course" name="url_path_image_course">
            </div>
        </div>
    </div>
    <div class="row padding-20">
        <div class="col-12 sm-12 col-md-12 col-lg-6">
            <div class="form-group">
                <select class="form-control form-control-lg" id="tittle_activation" name="tittle_activation">
                  <option value="si" selected>Con título</option>
                  <option value="no">Sin título</option>
                </select>
            </div>
        </div>
        <div class="col-12 sm-12 col-md-12 col-lg-6">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input url_path_image_course_btn" id="url_path_image_course_btn" name="url_path_image_course_btn">
                <label class="custom-file-label" for="url_path_image_course_btn">Seleccione Imagen de Boton</label>
            </div>
        </div>
    </div>
    <div class="row padding-20">
        <div class="col-12 sm-12 col-md-12 col-lg-6">
            <input type="hidden" id="id" name="id" value="{{ isset($data) ? $data['course_data']->id : '' }}">
            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Nombre del curso" value="{{isset($data) ? $data['course_data']->name : ''}}">
        </div>
        <div class="col-12 sm-12 col-md-12 col-lg-6">
            <input type="text" class="form-control form-control-lg" id="description" name="description" placeholder="Resumen del curso" maxlength="100" value="{{isset($data) ? $data['course_data']->description : ''}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12 father-text-box-code" id="father-text-box-code">
            <textarea class="text-editor" name="code_block">{{ isset($data) ? $data['course_data']->code_block : '' }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="sel2">Seleccione Categoria:</label>
            <select multiple class="form-control" id="sel2" name="category">
                @if (isset($data))
                    @foreach ($data['category'] as $item)
                        <option value="{{ $item->name }}" @php if(isset($data) && $item->name == $data['course_data']->category){ echo "selected"; } @endphp>{{ ucfirst($item->name) }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    {{--
    <div class="row">
        <div class="col-12">
            <label for="sel2">Seleccione Categoria:</label>
            <select multiple class="form-control" id="sel2" name="category">
                @if (isset($data_type))
                    @foreach ($data_type as $categoria)
                        <option value="{{ $categoria->name }}" @php if(isset($data) and $data['data']->category == $categoria->name){ echo "selected"; } @endphp>{{ ucfirst($categoria->name) }}</option>
                    @endforeach
                @elseif(isset($data))
                    @foreach ($data['category'] as $categoria)
                        <option value="{{ $categoria->name }}" @php if(isset($data) and $data['data']->category == $categoria->name){ echo "selected"; } @endphp>{{ ucfirst($categoria->name) }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    --}}
    <div class="row padding-20">
        <div class="col-10">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        {{--
        <div class="col-2">
            @if (isset($data))
                @php
                    if($data['data']->type == 'noticias'){
                        $url = 'actualidad';
                    }else{
                        $url = $data['data']->type;
                    }
                @endphp

                <a href="{{ url("/informacion/$url" . "/". $data['data']->id ."/". $data['data']->news_name) }}">Ver entrada</a>
            @endif
        </div>
        --}}
    </div>
</form>
