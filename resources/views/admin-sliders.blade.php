<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrador de Sliders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                @include('flash-message')
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
            </div>
        </div>
    </div>
</x-app-layout>
