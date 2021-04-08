@if (isset($noticias_filter))
{{--ESTA VARIABLE AUN NO SE HA UTILIZADO Y ES PARA EL CRUD DE CATEGORIAS Y FILTROS--}}
<div class="container">
    <h2>Dropdowns</h2>
    <p>The .dropdown-header class is used to add headers inside the dropdown menu:</p>
    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        Seleccione la categoria
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('/noticia/actualidad') }}">Todas</a>
            <a class="dropdown-item" href="{{ url('/noticia/actualidad/comunicados') }}">Comunicados</a>
            <a class="dropdown-item" href="{{ url('/noticia/actualidad/OAR') }}">OAR</a>
            <a class="dropdown-item" href="{{ url('/noticia/actualidad/convocatorias') }}">Convocatorias</a>
            <a class="dropdown-item" href="{{ url('/noticia/actualidad/documentos') }}">Documentos</a>
        </div>
    </div>
</div>
@endif
