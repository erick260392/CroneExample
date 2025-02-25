<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
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
