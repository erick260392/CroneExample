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
    public $open = false;
    public $postEdit = [
        'category_id' => '',
        'title' => '',
        'content' => '',
        'tags' => [],
    ];

    public $postEditId;

    public function mount()
    {

        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function save()
    {
        //validamos los campos
        $this->validate([
            'category_id' => 'required|categories,id',
            'title' => 'required',
            'content' => 'required',
            'selectedTags' => 'required|array'
        ]);

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

    public function edit($postId)
    {

        $this->postEditId = $postId;
        $this->open = true;

        $post = Post::find($postId);

        $this->postEdit = [
            'title' => $post->title,
            'content' => $post->content,
            'category_id' => $post->category_id,
            'tags' => $post->tags->pluck('id')->toArray(),
        ];
    }

    public function update()
    {

        $post = Post::find($this->postEditId);
        $post->update([
            'title'=>$this->postEdit['title'],
            'category_id'=>$this->postEdit['category_id'],
            'content'=>$this->postEdit['content'],
        ]);

        $post->tags()->sync($this->postEdit['tags']);

        $this->reset(['open', 'postEdit', 'postEditId']);

        $this->posts = Post::all();
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
