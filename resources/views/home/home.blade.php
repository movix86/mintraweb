@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @component('components.sliders', ['sliders' => $sliders])
        <x-sliders/>
    @endcomponent
    <x-b-home-servicios/>
    <x-footer/>
@stop
