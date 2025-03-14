<div>
    <div class="bg-white shadow rounded-lg p-3">
        <x-button wire:click='redirigir'>Ir a prueba</x-button>
        <form wire:submit="save">
            <div class="m-3">
                <x-label>
                    Nombre
                </x-label>
            </div>
            <x-input class="w-full" wire:model.live="postCreate.title" />
            <x-input-error for="postCreate.title" />

            <div class="m-3">

                <x-label>
                    Contenido
                </x-label>
                <x-textarea class="w-full" wire:model="postCreate.content">

                </x-textarea>

                <x-input-error for="postCreate.content" />
            </div>
            <div class="m-4">
                <x-label>
                    Categoria
                </x-label>
                <x-select class="mb-4 w-full" wire:model="postCreate.category_id">

                    <option value="" disabled>
                        Seleccione una Categoria
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </x-select>

                <x-input-error for="postCreate.category_id" />
            </div>
            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model="postCreate.tags" value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <x-input-error for="postCreate.selectedTags" />
            </div>
            <div class="flex justify-end">
                <x-button> Crear </x-button>
            </div>
        </form>


        <div class="bg-white shadow rounded-lg p-6">

            @foreach ($posts as $post)
                <ul class="list-disc list-inside mt-2">
                    <li class="flex justify-between " wire:key="post-{{ $post->id }}">
                        {{ $post->title }}
                        <div>

                            <x-button wire:click="edit({{ $post->id }})">Editar</x-button>

                            <x-danger-button wire:click="destroy({{ $post->id }})">Eliminar</x-danger-button>

                        </div>
                    </li>
                </ul>
            @endforeach

        </div>

    </div>


    <form wire:submit="update">
        <x-dialog-modal wire:model="postEdit.open">

            <x-slot name="title">
                Actualizar Post
            </x-slot>

            <x-slot name="content">
                <div class="m-3">
                    <x-label>
                        Nombre
                    </x-label>
                </div>
                <x-input class="w-full" wire:model="postEdit.title" />

                <x-input-error for='postEdit.title' />
                <div class="m-3">

                    <x-label>
                        Contenido
                    </x-label>
                    <x-textarea class="w-full" wire:model="postEdit.content">

                    </x-textarea>
                    <x-input-error for = "postEdit.content" />
                </div>
                <div class="m-4">
                    <x-label>
                        Categoria
                    </x-label>
                    <x-select class="mb-4 w-full" wire:model="postEdit.category_id">

                        <option value="" disabled>
                            Seleccione una Categoria
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for= "postEdit.category_id" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Etiquetas
                    </x-label>
                    <ul>
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <x-checkbox wire:model="postEdit.tags" value="{{ $tag->id }}" />
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <x-input-error for= "postEdit.tags" />
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-danger-button class="mr-2" wire:click="$set('postEdit.open',false)"> Cancelar
                    </x-danger-button>
                    <x-button> Actualizar </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>

    <script>
        document.addEventListener('livewire:init', function() {
            Livewire.on('post-Created', (comment) => {
                alert(comment);
            });
        });
    </script>
</div>
