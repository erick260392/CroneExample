<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{
    public $categories, $tags;
    public $category_id = "", $title, $content;
    public $selectedTags = [];
    public $posts;

    public function mount()
    {

        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();

    }

    public function save()
    {

        //creamos un nuevo registro
        // $post = Post::create([
        //     'category_id' => $this->category_id,
        //     'title' => $this->title,
        //     'content' => $this->content
        // ]);

        $post = Post::create(
            $this->only('category_id', 'title', 'content')
        );

        //agrega registros atravez de el metodo de laravel a nuestra tabla pivote
        $post->tags()->attach($this->selectedTags);

        //con este metodo limpiamos todas nuestras porpiedades
        $this->reset(['category_id', 'title', 'content', 'selectedTags']);

        //actualizamos la propiedad
        $this->posts = Post::all();

    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
