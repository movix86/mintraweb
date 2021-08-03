
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Curso') }}
        </h2>
        {{--
        @if (isset($data_category))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Categoria') }}
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear una Categoria') }}
            </h2>
        @endif
        --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                <x-courses-components.form-courses/>
            </div>
        </div>
    </div>
</x-app-layout>

