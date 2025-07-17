<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Livewire\Roles;

class Users extends Component
{
    use WithPagination;

    public int $perPage = 5; // Users per page

    public Collection $allUsers;
    public \Illuminate\Support\Collection $allRoles; //dropdown modals

    public function mount()
    {
        $this->allUsers = collect([
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
            [
                'id' => 3,
                'email' => 'bob.wilson@email.com',
                'companie' => 'SA',
                'rol' => 'Manager',
                'subordonat' => 'john.doe@email.com',
            ],
            [
                'id' => 4,
                'email' => 'alice.brown@email.com',
                'companie' => 'SRL',
                'rol' => 'Utilizator',
                'subordonat' => 'bob.wilson@email.com',
            ],
            [
                'id' => 5,
                'email' => 'charlie.davis@email.com',
                'companie' => 'SA',
                'rol' => 'Utilizator',
                'subordonat' => 'john.doe@email.com',
            ],
            [
                'id' => 6,
                'email' => 'diana.evans@email.com',
                'companie' => 'SRL',
                'rol' => 'Manager',
                'subordonat' => '-',
            ],
            [
                'id' => 7,
                'email' => 'frank.garcia@email.com',
                'companie' => 'SA',
                'rol' => 'Utilizator',
                'subordonat' => 'diana.evans@email.com',
            ],
            [
                'id' => 8,
                'email' => 'grace.harris@email.com',
                'companie' => 'SRL',
                'rol' => 'Utilizator',
                'subordonat' => 'john.doe@email.com',
            ],
            [
                'id' => 9,
                'email' => 'henry.jones@email.com',
                'companie' => 'SA',
                'rol' => 'Administrator',
                'subordonat' => '-',
            ],
            [
                'id' => 10,
                'email' => 'iris.king@email.com',
                'companie' => 'SRL',
                'rol' => 'Utilizator',
                'subordonat' => 'henry.jones@email.com',
            ],
            [
                'id' => 11,
                'email' => 'jack.lee@email.com',
                'companie' => 'SA',
                'rol' => 'Manager',
                'subordonat' => 'john.doe@email.com',
            ],
            [
                'id' => 12,
                'email' => 'karen.miller@email.com',
                'companie' => 'SRL',
                'rol' => 'Utilizator',
                'subordonat' => 'jack.lee@email.com',
            ],
        ]);
        // Load Roles.php
        $rolesComponent = new Roles();
        $rolesComponent->mount();
        $this->allRoles = $rolesComponent->allRoles;
    }

    

    public function render()
    {
        // pagination
        $currentPage = $this->getPage();
        $total = $this->allUsers->count();
        $offset = ($currentPage - 1) * $this->perPage;
        $items = $this->allUsers->slice($offset, $this->perPage)->values()->all();
        $users = new LengthAwarePaginator(
            $items,
            $total,
            $this->perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
        
        // render
        return view('livewire.users', [
            'users' => $users,
            'roles' => $this->allRoles,
        ]);
    }
}