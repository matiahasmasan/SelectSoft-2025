<?php

namespace App\Livewire;

use Livewire\Component;

class Permissions extends Component
{
    public array $permissions = [
        [
            'category' => 'Gestionare utilizatori',
            'items' => [
                [
                    'name' => 'Vizualizare utilizatori',
                    'rights' => ['R', 'W', 'U', 'D'],
                ],
                [
                    'name' => 'Adaugă utilizator',
                    'rights' => ['R', 'W', 'U', 'D'],
                ],
                [
                    'name' => 'Șterge utilizator',
                    'rights' => ['R', 'W', 'U', 'D'],
                ],
            ],
        ],
        [
            'category' => 'Gestionare rapoarte',
            'items' => [
                [
                    'name' => 'Vizualizare rapoarte',
                    'rights' => ['R', 'W', 'U', 'D'],
                ],
                [
                    'name' => 'Generează raport',
                    'rights' => ['R', 'W', 'U', 'D'],
                ],
                [
                    'name' => 'Șterge raport',
                    'rights' => ['R', 'W', 'U', 'D'],
                ],
            ],
        ],
    ];

    public function render()
    {
        return view('livewire.permissions', [
            'permissions' => $this->permissions,
        ]);
    }
}
