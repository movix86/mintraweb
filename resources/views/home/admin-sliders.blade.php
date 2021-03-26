@extends('home.base')

@section('nav')
    <x-nav/>
@endsection

@section('contenido')
    @include('flash-message')
    <h2 align="center"><small>Administrador de Sliders</small></h2>
    <div class="row padding-20">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 sliders-box-a">
            <a href="{{ url('/slider/crear') }}"><i class="material-icons" style="font-size:48px;">insert_photo</i><br> Crear Slider</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 sliders-box-b">
            @foreach ($sliders as $slider)
                @component('components.panel-sliders', ['slider' => $slider])
                    <x-panel-sliders/>
                @endcomponent
             @endforeach
        </div>
    </div>
    <x-footer/>
@stop
