<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (isset($data))
                {{ __('Actualizar') }}
            @endif
            @if (isset($data_type) && $data_type['tipo'] == 'noticia')
                {{ __('Crear '. ucfirst($data_type['tipo'])) }}
            @elseif (isset($data_type) && $data_type['tipo'] == 'evento')
                {{ __('Crear '. ucfirst($data_type['tipo'])) }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                @if (isset($data))
                    @component('components.upload-banner-news', ['data' => $data])
                        <x-upload-banner-news/>
                    @endcomponent
                @else
                    @component('components.upload-banner-news', ['data_type' => $data_type['category']])
                        <x-upload-banner-news/>
                    @endcomponent
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
