
<x-app-layout>
    <x-slot name="header">
        @if (isset($data_category))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Categoria') }}
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear una Categoria') }}
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                @if (isset($data_category))
                    @component('components.form-category', ['data_category' => $data_category])
                        <x-form-category/>
                    @endcomponent
                @else
                    <x-form-category/>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

