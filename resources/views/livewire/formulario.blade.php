<div>
    <div class="bg-white shadow rounded-lg p-3">

        <form>
            <div class="m-3">
                <x-label>
                    Nombre
                </x-label>
            </div>
            <x-input class="w-full"  wire:model="title" />

            <div class="m-3">

                <x-label>
                    Contenido
                </x-label>
                <x-textarea class="w-full" wire:model="content">

                </x-textarea>
            </div>
            <div class="m-4">
                <x-label>
                    Categoria
                </x-label>
                <x-select class="mb-4 w-full" wire:model="category_id">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <x-checkbox  wire:model="selectedTags"  value="{{ $tag->id }}" /> {{ $tag->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex justify-end">
                <x-button> Crear </x-button>
            </div>
        </form>

    </div>
</div>
