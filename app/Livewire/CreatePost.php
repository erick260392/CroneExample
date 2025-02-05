<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    // Array, String, Integer, Float, Boolean, Null
    //Colletion ,Models, Datatime , etc;  estos datos se deshidratan e hidratan en la ejecucion  por lo cual cambia el tiempo de ejecucion en el cual se renderiza el codigo

    // public $title , $user ;
    public  $name ,$email;

    public function mount(User $user){ //podermos mandar a llamar directamente el modelo

        // $this->user = User::find(User $user);
        // $this->email = $user->email;
        // $this->name = $user->name;+

        $this->fill(  //podemos usar el metodo fill para extraer solo las propiedades necesarias del modelo 
         $user->only(['name', 'email'])
        );
    }

    public function save(){

    
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
