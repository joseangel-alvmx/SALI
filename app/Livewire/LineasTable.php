<?php

namespace App\Livewire;

use App\Models\estado;
use App\Models\Linea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LineasTable extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = 'todos'; // Añadir la propiedad filter
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $showNo = true;
    public $showFecha = true;
    public $showFolio = true;
    public $showImporte = true;
    public $showReferencia = true;
    public $showTransaccion = true;
    public $showCodi = true;
    public $showStatus = true;
    public $showCobro = true;
    public $showAsignado = true;
    public $showTipo = true;
    public $showMore = false;
    public $showAccounts = false;
    public $accounts = null;
    public $accountsShow = [];
    public $userrol;
    public $userUsuario;
    public function toogleShowMore()
    {
        $this->showMore = !$this->showMore;
    }
    public function toggleShowAccounts()
    {
        $this->showAccounts = !$this->showAccounts;
    }
    public function toggleAccounts($account)
    {
        $this->accountsShow[$account] = !$this->accountsShow[$account];
    }
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function setOrder($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }
    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage(); // Resetear la paginación al cambiar el filtro
    }
    public function mount()
    {
        $this->accounts = Linea::select('cuenta')->distinct()->get()->pluck('cuenta');
        foreach ($this->accounts as $key => $account) {
            $this->accounts[$key] = substr($account, 12);
            $this->accountsShow[substr($account, 12)] = true;
        }
    }
    public function render()
    {
        $user = Auth::user();
        $query = Linea::search($this->search, $this->filter, $user, [], $this->accountsShow)->orderBy($this->sortField, $this->sortDirection);
        logger($query->toRawSql());
        if ($this->search != '') {
            $this->updatingSearch();
        }
        $lineas = $query->paginate(20);

        $this->userrol = $user->rol;
        $this->userUsuario = $user->usuario;
        return view('livewire.lineas-table', [
            'lineas' => $lineas,
        ]);
    }
}