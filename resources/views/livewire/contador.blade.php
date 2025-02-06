<div>
    <div class="card" style="background-color: whitesmoke">

        <x-button wire:click="decrement" class="m-2"> - </x-button>
        <span class="m-3">{{ $count }}</span>
        <x-button wire:click="increment(5)" class="m-2"> + </x-button>

    </div>
</div>
