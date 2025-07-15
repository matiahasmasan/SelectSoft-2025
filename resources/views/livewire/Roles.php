<?php

namespace App\Livewire;

use Livewire\Component;

class Roles extends Component
{
    public array $roles = [
        [
            'id' => 1,
            'rol' => 'Administrator',
        ],
        [
            'id' => 2,
            'rol' => 'Utilizator',
        ],  
    ];

    public function render()
    {
        return view('livewire.roles', [
            'roles' => $this->roles,
        ]);
    }
}
