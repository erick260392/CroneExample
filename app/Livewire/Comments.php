<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Comments extends Component
{

    public $comments = [];


    #[On('post-Created')]
    public function addComment($comments)
    {
        array_push($this->comments, $comments);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
