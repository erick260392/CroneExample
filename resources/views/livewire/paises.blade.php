<div class="card m-3 rounded" style="background-color: whitesmoke">
    <form wire:submit="save">
        <x-input wire:model="pais" wire:keydown.space="increment" />
        <x-button>Agregar</x-button>
    </form>

    <ul class="list-disc list-inside">
        @foreach ($paises as $index => $pais)
            <li wire:key="pais-{{ $index }}">
                <span wire:mouseenter="changeActive('{{ $pais }}')">{{ $pais }}</span>


                <x-danger-button wire:click="delete({{ $index }})">x</x-danger-button>
            </li>
        @endforeach
        {{$active}}

        {{$count}}
    </ul>
</div>
