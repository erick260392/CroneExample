<div class="card m-3 rounded" style="background-color: whitesmoke">
    {{-- 
    @livewire('Hijo') --}}

    {{-- //este metodo permite setear una propiedad sin necesidad de definir una funcion en nuestra clase del componente --}}
    <x-button class="mb-4" wire:click="$set('count',0)"> Reset </x-button>


    <x-button class="mb-4" wire:click="$toggle('open')"> Mostrar/Ocultar </x-button>

    <form wire:submit="save">
        <x-input wire:model="pais" wire:keydown.space="increment" />
        <x-button>Agregar</x-button>
    </form>

    @if ($open)
    <ul class="list-disc list-inside">
        @foreach ($paises as $index => $pais)
            <li wire:key="pais-{{ $index }}">
                <span wire:mouseenter="changeActive('{{ $pais }}')">{{ $pais }}</span>


                <x-danger-button wire:click="delete({{ $index }})">x</x-danger-button>
            </li>
        @endforeach

        {{ $active }}

        {{ $count }}
    </ul>
    @endif
 
</div>
