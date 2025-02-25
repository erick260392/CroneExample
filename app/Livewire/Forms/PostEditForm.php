<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PostEditForm extends Form
{
    #[Rule('required')]
    public $category_id;

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $content;

    #[Rule('required|array')]
    public $tags = [];

    public $postEditId ="";

    public $open = false;


    public function edit($postId)
    {

        $this->postEditId = $postId;
        $this->open = true;
        $post = Post::find($postId);
        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->tags = $post->tags->pluck('id')->toArray();
    }


    public function update()
    {

        $this->validate();
        $post = Post::find($this->postEditId);
        $post->update(
            $this->only(['title', 'content', 'category_id'])
        );
        $post->tags()->sync($this->tags);
        $this->reset();
    }
}
