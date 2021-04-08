@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @component('components.cajas-noticias-home', ['noticias_filter' => $noticias_filter])
        <x-cajas-noticias-home/>
    @endcomponent
    <x-footer/>
@stop
