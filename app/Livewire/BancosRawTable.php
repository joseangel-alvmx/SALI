<?php

namespace App\Livewire;

use App\Models\Bancosraw;
use Livewire\Component;
use Livewire\WithPagination;

class BancosRawTable extends Component
{
    use WithPagination;
    public $userrol;
    public $search = '';
    public $pages = 20;
    public function render()
    {
        $this->userrol = auth()->user()->rol;
        $bancosraws = Bancosraw::search($this->search)->paginate($this->pages);

        return view('livewire.bancos-raw-table', compact('bancosraws'))
            ->with('i', (request()->input('page', 1) - 1) * $bancosraws->perPage());
    }
}
