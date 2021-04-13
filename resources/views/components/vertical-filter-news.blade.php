@if (isset($data_filter))
{{--ESTA VARIABLE AUN NO SE HA UTILIZADO Y ES PARA EL CRUD DE CATEGORIAS Y FILTROS--}}
<div class="container">
    <h2>Dropdowns</h2>
    <p>The .dropdown-header class is used to add headers inside the dropdown menu:</p>
    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        Seleccione la categoria
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('/información/actualidad') }}">Todas</a>
            <a class="dropdown-item" href="{{ url('/información/actualidad/comunicados') }}">Comunicados</a>
            <a class="dropdown-item" href="{{ url('/información/actualidad/OAR') }}">OAR</a>
            <a class="dropdown-item" href="{{ url('/información/actualidad/convocatorias') }}">Convocatorias</a>
            <a class="dropdown-item" href="{{ url('/información/actualidad/documentos') }}">Documentos</a>
        </div>
    </div>
</div>
@endif
