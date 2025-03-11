<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{


    public $posts;
    public $categories;
    public $tags;

    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;

    public function mount()
    {

        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function save()
    {

        // llamamos al form Objects
        $this->postCreate->save();

        //actualizamos la propiedad
        $this->posts = Post::all();


        // Dispatch the event 
        $this->dispatch('post-Created', 'Nuevo Articulo Creado');
    }

    public function edit($postId)
    {

        $this->resetValidation();
        $this->postEdit->edit($postId);
    }

    public function update()
    {

        $this->postEdit->validate();
        $this->postEdit->update();
        $this->posts = Post::all();

        // Dispatch the event 
        $this->dispatch('post-Created', 'Nuevo Articulo Actualizado');
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        $this->posts = Post::all();

        // Dispatch the event 
        $this->dispatch('post-Created', 'Articulo Eliminado');
    }

    public function redirigir()
    {
        return $this->redirect('/prueba', navigate: true);
    }
    public function render()
    {
        return view('livewire.formulario');
    }
}
