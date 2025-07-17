<?php

namespace App\Livewire;
use Illuminate\Support\Collection;
use Livewire\Component;

class Permissions extends Component
{
    public \Illuminate\Support\Collection $permissions;
    //public \Illuminate\Support\Collection $allRoles; //dropdown modals

    public function mount()
    {
        $this->permissions = collect([
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
        ]);
        /* 
        $rolesComponent = new Roles();
        $rolesComponent->mount();
        $this->allRoles = $rolesComponent->allRoles;*/
        
    }

    public function render()
    {
        return view('livewire.permissions', [
            'permissions' => $this->permissions,
            //'roles' => $this->allRoles,
        ]);
    }
}
