
<x-app-layout>
    <x-slot name="header">
        @if (isset($data))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Curso') }}
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear Curso') }}
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-jet-welcome /> --}}
                {{-- https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f --}}
                @if (isset($data))
                    @component('components.courses-components.form-courses', ['data' => $data])
                        <x-courses-components.form-courses/>
                    @endcomponent
                @else
                    @component('components.courses-components.form-courses', ['category' => $category])
                        <x-courses-components.form-courses/>
                    @endcomponent
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

