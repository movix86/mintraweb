@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @if (isset($data_filter))
        @component('components.box-data-pages', ['data_filter' => $data_filter])
            <x-box-data-pages/>
        @endcomponent
    @endif
    <x-footer/>
@stop
