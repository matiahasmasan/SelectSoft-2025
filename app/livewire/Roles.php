<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Roles extends Component
{
    use WithPagination;

    public int $perPage = 5; // Roles per page

    public \Illuminate\Support\Collection $allRoles;

    public function mount()
    {
        $this->allRoles = collect([
            [ 'id' => 1, 'rol' => 'Administrator' ],
            [ 'id' => 2, 'rol' => 'Utilizator' ],
            [ 'id' => 3, 'rol' => 'Manager' ],
            [ 'id' => 4, 'rol' => 'Operator' ],
            [ 'id' => 5, 'rol' => 'Vizitator' ],
            [ 'id' => 6, 'rol' => 'Supervizor' ],
            [ 'id' => 7, 'rol' => 'Contabil' ],
            [ 'id' => 8, 'rol' => 'Tehnic' ],
            [ 'id' => 9, 'rol' => 'Resurse Umane' ],
            [ 'id' => 10, 'rol' => 'Client' ],
            [ 'id' => 11, 'rol' => 'Furnizor' ],
            [ 'id' => 12, 'rol' => 'Consultant' ],
        ]);
    }

    public function render()
    {
        $currentPage = $this->getPage();
        $total = $this->allRoles->count();
        $offset = ($currentPage - 1) * $this->perPage;
        $items = $this->allRoles->slice($offset, $this->perPage)->values()->all();
        $roles = new LengthAwarePaginator(
            $items,
            $total,
            $this->perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
        return view('livewire.roles', [
            'roles' => $roles,
        ]);
    }
}
