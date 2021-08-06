@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    <x-courses-components.banner-home-courses/>
    @if (isset($cursos))
        @component('components.courses-components.category-btn-home-courses', ['cursos' => $cursos])
            <x-courses-components.category-btn-home-courses/>
        @endcomponent
    @endif
    <x-footer/>
@stop
<x-btn-services/>
