@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @if (isset($usuario))
        @component('components.update-user-form', ['usuario' => $usuario])
            <x-update-user-form/>
        @endcomponent
    @else
        No existe
    @endif

    <x-footer/>
@stop
