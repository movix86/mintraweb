@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    <a href="{{ url('/slider/crear') }}">Crear Slider</a>
    @include('flash-message')
        @foreach ($sliders as $slider)
            @component('components.panel-sliders', ['slider' => $slider])
                <x-panel-sliders/>
            @endcomponent
        @endforeach
    <x-footer/>
@stop
