<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Roles extends Component
{
    use WithPagination;

    public $term='';

    public int $perPage = 5; // Roles per page

    public Collection $allRoles;
    // public \Illuminate\Support\Collection $allRoles;

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
            [ 'id' => 13, 'rol' => 'Administrator' ],
            [ 'id' => 14, 'rol' => 'Utilizator' ],
            [ 'id' => 15, 'rol' => 'Manager' ],
            [ 'id' => 16, 'rol' => 'Operator' ],
            [ 'id' => 17, 'rol' => 'Vizitator' ],
            [ 'id' => 18, 'rol' => 'Supervizor' ],
            [ 'id' => 19, 'rol' => 'Contabil' ],
            [ 'id' => 20, 'rol' => 'Tehnic' ],
            [ 'id' => 21, 'rol' => 'student' ],
        ]);
    }

    public function updatedTerm()
    {
        $this->resetPage();
    }

    public function render()
        {
            $collection = $this->allRoles;

            if ($this->term) {
                $collection = $collection->filter(function ($role) {
                    return str_contains(strtolower($role['id']), strtolower($this->term))
                        || str_contains(strtolower($role['rol']), strtolower($this->term));
                });
            }

            $currentPage = $this->getPage();
            $total = $collection->count();
            $offset = ($currentPage - 1) * $this->perPage;
            $items = $collection->slice($offset, $this->perPage)->values();

            $roles = new LengthAwarePaginator($items, $total, $this->perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]);

            return view('livewire.roles', [
                'roles' => $roles,
                // 'roles' => $this->allRoles,
            ]);
        }
}