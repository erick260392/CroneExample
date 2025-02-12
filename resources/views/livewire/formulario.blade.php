<div>
    <div class="bg-white shadow rounded-lg p-3">

        <form wire:submit="save">
            <div class="m-3">
                <x-label>
                    Nombre
                </x-label>
            </div>
            <x-input class="w-full" wire:model="title" required />

            <div class="m-3">

                <x-label>
                    Contenido
                </x-label>
                <x-textarea class="w-full" wire:model="content" required>

                </x-textarea>
            </div>
            <div class="m-4">
                <x-label>
                    Categoria
                </x-label>
                <x-select class="mb-4 w-full" wire:model="category_id" required>

                    <option value="" disabled>
                        Seleccione una Categoria
                    </option>

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
                            <label>
                                <x-checkbox wire:model="selectedTags" value="{{ $tag->id }}" /> {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex justify-end">
                <x-button> Crear </x-button>
            </div>
        </form>

        <div class="bg-white shadow rounded-lg p-6 mb-8">

        </div>

        <div class="bg-white shadow rounded-lg p-6">

            @foreach ($posts as $post)
                <ul class="list-disc list-inside mt-2">
                    <li class="flex justify-between " wire:key="post-{{$post->id}}">
                        {{ $post->title }}
                        <div>

                            <x-button wire:click="edit({{$post->id}})">Editar</x-button>

                            <x-danger-button>Eliminar</x-danger-button>

                        </div>
                    </li>
                </ul>
            @endforeach

        </div>

    </div>
    @if ($open)
        {{-- Formulario de Edicion --}}
        <div class="bg-gray-800 bg-opacity-25 fixed  inset-0">

            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6">
                        <form wire:submit="update">
                            <div class="m-3">
                                <x-label>
                                    Nombre
                                </x-label>
                            </div>
                            <x-input class="w-full" wire:model="postEdit.title" required />

                            <div class="m-3">

                                <x-label>
                                    Contenido
                                </x-label>
                                <x-textarea class="w-full" wire:model="postEdit.content" required>

                                </x-textarea>
                            </div>
                            <div class="m-4">
                                <x-label>
                                    Categoria
                                </x-label>
                                <x-select class="mb-4 w-full" wire:model="postEdit.category_id" required>

                                    <option value="" disabled>
                                        Seleccione una Categoria
                                    </option>

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
                                            <label>
                                                <x-checkbox wire:model="postEdit.tags" value="{{ $tag->id }}" />
                                                {{ $tag->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="flex justify-end">
                              <x-danger-button class="mr-2" wire:click="$set('open',false)"> Cancelar </x-danger-button>
                                <x-button> Actualizar </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endif

</div>
