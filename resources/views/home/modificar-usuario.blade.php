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
        <x-update-user-form/>
    @endif

    <x-footer/>
@stop
