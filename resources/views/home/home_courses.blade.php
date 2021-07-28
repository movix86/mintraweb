@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    <x-courses-components.banner-home-courses/>
    <x-footer/>
@stop
<x-btn-services/>
