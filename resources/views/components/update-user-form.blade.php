<form method="POST" action="{{ url('actualizar/usuario/') }}">
    @csrf
    <input type="hidden" name="id" value="{{ isset($usuario) ? $usuario->id : '' }}">
    <label for="name">Nombre</label><br>
    <input type="text" name="name" id="name" value="{{ isset($usuario) ? $usuario->name : 'Nombre' }}"><br>
    <label for="lastname">Apellido</label><br>
    <input type="text" name="lastname" id="lastname" value="{{ isset($usuario) ? $usuario->lastname : 'Apellido' }}"><br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="{{ isset($usuario) ? $usuario->email : 'Nombre' }}"><br>
    <label for="password">Contraseña</label><br>
    <input type="password" name="password" id="password" placeholder="Nueva Contraseña"><br>
    <button type="submit" name="guardar" id="guardar">Guardar</button><br>
</form>

{{--
<x-jet-form-section submit="actualizar_user">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

--}}
