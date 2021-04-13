@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @if (isset($data_filter) && $data_filter['tipo'] == 'noticia')
        @component('components.cajas-noticias-home', ['data_filter' => $data_filter])
            <x-cajas-noticias-home/>
        @endcomponent
    @elseif (isset($data_filter) && $data_filter['tipo'] == 'evento')
        @component('components.cajas-eventos-home', ['data_filter' => $data_filter])
            <x-cajas-noticias-home/>
        @endcomponent
    @endif
    <x-footer/>
@stop
