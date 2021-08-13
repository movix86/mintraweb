
<x-app-layout>
    <x-slot name="header">
        @if (isset($data))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Categoria para Cursos') }}
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear Categoria para Cursos') }}
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                @if (isset($data))
                    @component('components.courses-components.form-category-courses', ['data' => $data])
                        <x-courses-components.form-category-courses/>
                    @endcomponent
                @else
                    <x-courses-components.form-category-courses/>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

