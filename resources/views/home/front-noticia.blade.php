@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @if (isset($data))
        @component('components.news', ['data' => $data])
            <x-news/>
        @endcomponent
    @endif
    <x-footer/>
@stop
