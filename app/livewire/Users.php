<?php

namespace App\Livewire;

use Livewire\Component;

class Users extends Component
{
    public array $users = [
        [
            'id' => 1,
            'email' => 'john.doe@email.com',
            'companie' => 'SRL',
            'rol' => 'Administrator',
            'subordonat' => '-',
        ],
        [
            'id' => 2,
            'email' => 'jane.smith@email.com',
            'companie' => 'SRL',
            'rol' => 'Utilizator',
            'subordonat' => 'john.doe@email.com',
        ],
    ];

    public function render()
    {
        return view('livewire.users', [
            'users' => $this->users,
        ]);
    }
}
