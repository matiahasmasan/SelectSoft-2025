<?php

namespace App\Livewire;

use Livewire\Component;

class Users extends Component
{
    public int $n = 1000;

    public function render()
    {
        return view('livewire.users');
    }
}
