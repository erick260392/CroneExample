<div class="text-center">
    <div class="card rounded m-2" style="background-color: whitesmoke">
        {{-- <div class="in-line">{{$name}} : {{$email}}</div> --}}

        {{-- el metodo .live permite que se renderice en tiempo real --}}
        <x-input wire:model.live="name"  /> 
        <x-button wire:click="save" class="m-2">Save</x-button>
    </div>
    <div class="card" style="background:white">
        {{$name}}
    </div>
   
</div>
