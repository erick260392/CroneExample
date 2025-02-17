<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Formulario extends Component
{


    // #[Rule('required|exists:categories,id' , as : 'categoria')]
    // public $category_id = "";

    // #[Rule('required' , message: 'El campo titulo es obligatorio')]
    // public $title;

    // #[Rule('required', message: 'El campo contenido es obligatorio')]
    // public $content;

    // #[Rule('required|array' , as : 'etiquetas')]
    // public $selectedTags = [];


    public $posts;
    public $categories;
    public $tags;
    public $open = false;

    #[Rule([
        'postCreate.title' => 'required',
        'postCreate.content' => 'required',
        'postCreate.category_id' => 'required|exists:categories,id',
        'postCreate.tags' => 'required|array'

    ],[],['postCreate.category_id' => 'categoria','postCreate.title' => 'titulo','postCreate.content' => 'contenido','postCreate.tags' => 'etiquetas'])]
    
    public $postCreate = [
        'category_id' => '',
        'title' => '',
        'content' => '',
        'tags' => [],
    ];

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

        $this->validate();

        //validamos los campos
        // $this->validate([
        //     'category_id' => 'required|categories,id',
        //     'title' => 'required',
        //     'content' => 'required',
        //     'selectedTags' => 'required|array'
        // ],[],[
        //     'category_id' => 'categoria',
        //     'title' => 'titulo',
        //     'content' => 'contenido',
        //     'selectedTags' => 'etiquetas'
        // ]);

        //creamos un nuevo registro
        // $post = Post::create([
        //     'category_id' => $this->category_id,
        //     'title' => $this->title,
        //     'content' => $this->content
        // ]);

        $post = Post::create(
            [
                'category_id' => $this->postCreate['category_id'],
                'title' => $this->postCreate['title'],
                'content' => $this->postCreate['content'],
            ]
        );

        //agrega registros atravez de el metodo de laravel a nuestra tabla pivote
        $post->tags()->attach($this->postCreate['tags']);


        //con este metodo limpiamos todas nuestras porpiedades
        $this->reset(['postCreate']);

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
            'title' => $this->postEdit['title'],
            'category_id' => $this->postEdit['category_id'],
            'content' => $this->postEdit['content'],
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
