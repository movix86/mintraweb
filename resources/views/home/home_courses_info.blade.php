@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    <x-courses-components.banner-home-courses/>
    @if (isset($cursos))
        @component('components.courses-components.course-btn-info', ['cursos' => $cursos])
            <x-courses-components.course-btn-info/>
        @endcomponent
    @endif
    <x-footer/>
@stop
<x-btn-services/>
