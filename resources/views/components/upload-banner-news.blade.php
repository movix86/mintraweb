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
<form action="{{ isset($data) ? route('save-update-page') : route('save-page') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 upload-banner-new">
            <div class="form-group">
                <label for="upload-banner-news">Elije el banner de la noticia</label>
                <input type="file" class="form-control-file" id="url_path_image_news" name="url_path_image_news">
            </div>
        </div>
    </div>
    <div class="row padding-20">
        <div class="col-12 sm-12 col-md-12 col-lg-5">
            <input type="hidden" id="id" name="id" value="{{ isset($data) ? $data['data']->id : '' }}">
            <input type="text" class="form-control form-control-lg" name="news_name" placeholder="Titulo de la noticia" value="{{ isset($data) ? $data['data']->news_name : '' }}">
        </div>
        <div class="col-12 sm-12 col-md-12 col-lg-2">
            <div class="form-group">
                <select class="form-control form-control-lg" id="tittle_activation" name="tittle_activation" @php if(isset($data) and $data['data']->tittle_activation == 'si'){ echo "style='border: 1px solid blue;'"; }elseif(isset($data) and $data['data']->tittle_activation == 'no'){ echo "style='border: 1px solid red;'"; }else{ echo "style='border: 1px solid blue;'"; } @endphp>
                  <option value="si" @php if(isset($data) and $data['data']->tittle_activation == 'si'){ echo "selected"; } @endphp>Con título</option>
                  <option value="no" @php if(isset($data) and $data['data']->tittle_activation == 'no'){ echo "selected"; } @endphp>Sin título</option>
                </select>
            </div>
        </div>
        <div class="col-12 sm-12 col-md-12 col-lg-5">
            <input type="text" class="form-control form-control-lg" name="resume" placeholder="Resumen de noticia" maxlength="100" value="{{ isset($data) ? $data['data']->resume : '' }}">
        </div>
    </div>
    <div class="row">
        <div class="col-12 father-text-box-code" id="father-text-box-code">
            <textarea class="text-editor" name="code_block">{{ isset($data) ? $data['data']->code_block : '' }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="sel2">Seleccione Tipo:</label>
            <select multiple class="form-control" id="sel2" name="type">
                <option value="noticias" @php if(isset($data) and $data['data']->type == 'noticias'){ echo "selected"; } @endphp>Noticia</option>
                <option value="eventos" @php if(isset($data) and $data['data']->type == 'eventos'){ echo "selected"; } @endphp>Evento</option>
                <option value="wikis" @php if(isset($data) and $data['data']->type == 'wikis'){ echo "selected"; } @endphp>Wiki</option>
                <option value="sitios" @php if(isset($data) and $data['data']->type == 'sitios'){ echo "selected"; } @endphp>Sitio</option>
            </select>
        </div>
    </div>
    {{--
    <div class="row">
        <div class="col-12">
            <label for="sel2">Seleccione Categoria:</label>
            <select multiple class="form-control" id="sel2" name="category">
                <option value="comunicados" @php if(isset($data) and $data->category == 'comunicados'){ echo "selected"; } @endphp>Comunicados</option>
                <option value="oar" @php if(isset($data) and $data->category == 'oar'){ echo "selected"; } @endphp>OAR</option>
                <option value="convocatorias" @php if(isset($data) and $data->category == 'convocatorias'){ echo "selected"; } @endphp>Convocatorias</option>
                <option value="documentos" @php if(isset($data) and $data->category == 'documentos'){ echo "selected"; } @endphp>Documentos</option>
            </select>
        </div>
    </div>
    --}}
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
    <div class="row padding-20">
        <div class="col-10">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
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
     </div>
</form>

