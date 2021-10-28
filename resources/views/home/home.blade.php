@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
<x-btn-services/>
    @if (isset($date))
        @component('components.sliders', ['sliders' => $date['sliders']])
            <x-sliders/>
        @endcomponent
    @endif
    @if (isset($date))
        @component('components.b-home-servicios', ['date' => $date])
            <x-b-home-servicios/>
        @endcomponent
    @endif
    <x-footer/>
@stop
