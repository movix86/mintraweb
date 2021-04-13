@if (isset($data_filter))
{{--ESTA VARIABLE AUN NO SE HA UTILIZADO Y ES PARA EL CRUD DE CATEGORIAS Y FILTROS--}}
<div class="container">
    <h2>{{ ucfirst($data_filter['tipo']) }}</h2>
    <p>Puedes utilizar el filtro para navegar en las diferentes categorías de {{ $data_filter['tipo'] }}:</p>
    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        Seleccione la categoria
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('/información/'.$data_filter['tipo']) }}">Todas</a>
            <a class="dropdown-item" href="{{ url('/información/'.$data_filter['tipo'].'/comunicados') }}">Comunicados</a>
            <a class="dropdown-item" href="{{ url('/información/'.$data_filter['tipo'].'/OAR') }}">OAR</a>
            <a class="dropdown-item" href="{{ url('/información/'.$data_filter['tipo'].'/convocatorias') }}">Convocatorias</a>
            <a class="dropdown-item" href="{{ url('/información/'.$data_filter['tipo'].'/documentos') }}">Documentos</a>
        </div>
    </div>
</div>
@endif
