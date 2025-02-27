<?php

namespace App\Livewire;

use Livewire\Component;

class Paises extends Component
{
    public $paises = [
        'peru',
        'colombia',
        'Argentina',
        'Mexico'
    ];

    public $pais;
    public $active;
    public $count;
    public $open = true;


    public function save()
    {

        array_push($this->paises, $this->pais);
        $this->reset('pais');
    }

    public function delete($index)
    {
        unset($this->paises[$index]);
    }

    public function changeActive($pais)
    {

        $this->active = $pais;
    }
    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.paises');
    }
}
