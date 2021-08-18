@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @component('components.courses-components.course-content', ['data' => $data])
        <x-courses-components.course-content/>
    @endcomponent
    <x-footer/>
@stop
