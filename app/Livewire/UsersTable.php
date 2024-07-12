<?php

namespace App\Livewire;

use App\Models\user;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $search = '';
    public $pages = 20;
    public function render()
    {
        $users = user::search($this->search)->paginate($this->pages);

        return view('livewire.users-table', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }
}
