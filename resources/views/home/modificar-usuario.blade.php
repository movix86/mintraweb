
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (isset($usuario))
                {{ __('Actualizar Usuario') }}
            @else
                {{ __('Crear Usuario') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                @if (isset($usuario))
                    @component('components.update-user-form', ['usuario' => $usuario])
                        <x-update-user-form/>
                    @endcomponent
                @else
                    <x-update-user-form/>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
