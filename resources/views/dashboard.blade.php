<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- @livewire('create-post',[
            'title'=> 'hola que hace chanchito',
            'user'=> 1
        ]) --}}


        {{-- @livewire('Contador') --}}


        {{-- @livewire('Paises') --}}


        @livewire('Formulario')
</x-app-layout>
