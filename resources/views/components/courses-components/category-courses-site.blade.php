<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias de Cursos') }}
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
                @include('flash-message')
                {{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @livewire('search-table-category-courses')
            </div>
        </div>
    </div>
</x-app-layout>
