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
<form action="{{ route('guardar-noticia') }}" method="POST" enctype="multipart/form-data">
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
        <div class="col-6 sm-6 col-md-6 col-lg-4">
            <input type="text" class="form-control form-control-lg" name="news_name" placeholder="titulo de la noticia">
        </div>
        <div class="col-6 sm-6 col-md-6 col-lg-4">
            <input type="text" class="form-control form-control-lg" name="resume" placeholder="Resumen de noticia" maxlength="100">
        </div>

    </div>
    <div class="row">
        <div class="col-12 father-text-box-code" id="father-text-box-code">
            <textarea class="text-editor" name="code_block"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="sel2">Seleccione Tipo:</label>
            <select multiple class="form-control" id="sel2" name="type">
                <option value="noticias">Noticia</option>
                <option value="eventos">Evento</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="sel2">Seleccione Categoria:</label>
            <select multiple class="form-control" id="sel2" name="category">
                <option value="comunicados">Comunicados</option>
                <option value="oar">OAR</option>
                <option value="convocatorias">Convocatorias</option>
                <option value="documentos">Documentos</option>
            </select>
        </div>
    </div>
    <div class="row padding-20">
        <div class="col-12">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
     </div>
</form>

