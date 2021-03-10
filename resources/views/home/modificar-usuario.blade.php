@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    <x-update-user-form/>
    <x-footer/>
@stop
