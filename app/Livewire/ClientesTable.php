<?php

namespace App\Livewire;

use App\Models\clientes;
use Livewire\Component;
use Livewire\WithPagination;

class ClientesTable extends Component
{
    use WithPagination;
    public $search = '';
    public $pages = 20;
    public $userrol;
    public function render()
    {
        $this->userrol = auth()->user()->rol;
        $clientes = clientes::search($this->search)->paginate($this->pages);
        return view('livewire.clientes-table',compact('clientes'));
    }
}
