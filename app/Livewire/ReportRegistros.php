<?php

namespace App\Livewire;

use App\Models\Linea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ReportRegistros extends Component
{
    use WithPagination;

    public $selectedLines = [];
    public $selectedL;
    public $selectAll = false;
    public $filter = 'todos'; // Añadir la propiedad filter
    public $showFechaMov = true;
    public $showFechaApp = true;
    public $showFolio = true;
    public $showImporte = true;
    public $showReferencia = true;
    public $showCodi = true;
    public $showStatus = true;
    public $showCobro = true;
    public $showRefUnica = false;
    public $userrol;
    public $userUsuario;
    public $movementDateStart;
    public $movementDateEnd;
    public $appDateStart;
    public $appDateEnd;
    public $lineasCollection;
    public $columnsFilters;
    public $columnData = [
        'fecha_movimiento' => [],
        'fecha_estado' => [],
        'folio_banco' => [],
        'importe' => [],
        'referencia' => [],
        'cliente' => [],
        'estado' => [],
        'cobro' => [],
        'referencia_unica' => [],
    ];
    public $showFilters = [
        'fecha_movimiento' => false,
        'fecha_estado' => false,
        'folio_banco' => false,
        'importe' => false,
        'referencia' => false,
        'cliente' => false,
        'estado' => false,
        'cobro' => false,
        'referencia_unica' => false,
    ];
    public $classes;
    public $styles;
    public $dataCols;
    protected $listeners = ['updateDates'];
    #[On('updateDates')]
    public function updateDates($key, $value)
    {
        $this->$key = $value;
    }
    public function toogleShowMore()
    {
        $this->showMore = !$this->showMore;
    }

    protected $paginationTheme = 'bootstrap';
    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage(); // Resetear la paginación al cambiar el filtro
    }
    public function showFiltersData($filter)
    {
        if (!$this->showFilters[$filter]) {
            $this->showFilters[$filter] = true;
            $this->classes[$filter] = 'show';
            $this->styles[$filter] = 'position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 38px);';
        } else {
            $this->showFilters[$filter] = false;
            $this->classes[$filter] = '';
            $this->styles[$filter] = '';

        }
    }
    public function updatedSelectedLines($value){
        $user = Auth::user();
        $this->selectedL = Linea::search('', $this->filter, $user, $this->columnsFilters, null, $this->movementDateStart, $this->movementDateEnd, $this->appDateStart, $this->appDateEnd, $this->columnData)->where('lineas.estado', '=', 'new')->whereIn('id', $this->selectedLines)->get();
    }
    public function updateFilteredData($key, $value)
    {
        logger($value);
        if (!in_array($value, $this->columnData[$key])) {
            $this->columnData[$key][strval($value)] = strval($value);
        } else {
            unset($this->columnData[$key][strval($value)]);
        }
        logger($this->columnData[$key]);
    }
    public function loadDataCols($key)
    {
        if (!isset($this->dataCols[$key])) {
            $this->dataCols[$key] = Cache::remember("dataCols_{$key}", 60, function () use ($key) {
                return Linea::get()->pluck($key)->unique()->filter()->sort();
            });
        }
    }
    public function mount(){
        $user = Auth::user();
        if ($user->rol === 'admin' || $user->rol === 'conta') {
            $this->showRefUnica = true;
        }
    }
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedLines = $this->lineasCollection->pluck('id')->map(function ($item) {
                return (string) $item;
            })->toArray();
        } else {
            $this->selectedLines = [];
        }
    }
    public function render()
    {
        $user = Auth::user();
        // si es un admin o contabilidad, mostrar la columna de referencia única
        $this->columnsFilters = [
            'fecha_movimiento' => $this->showFechaMov,
            'fecha_estado' => $this->showFechaApp,
            'folio_banco' => $this->showFolio,
            'importe' => $this->showImporte,
            'referencia' => $this->showReferencia,
            'cliente' => $this->showCodi,
            'estado' => $this->showStatus,
            'cobro' => $this->showCobro,
            'referencia_unica' => $this->showRefUnica,
        ];
        foreach ($this->showFilters as $key => $value) {
            if ($value && !isset($this->dataCols[$key])) {
                $this->dataCols[$key] = Cache::remember("dataCols_{$key}", 60, function () use ($key) {
                    return Linea::get()->pluck($key)->unique()->filter()->sort();
                });
            }
        }
        // Definir los filtros de las columnas
        $query = Linea::search('', $this->filter, $user, $this->columnsFilters, null, $this->movementDateStart, $this->movementDateEnd, $this->appDateStart, $this->appDateEnd, $this->columnData)->where('lineas.estado', '=', 'new');
        $this->lineasCollection = $query->get();
        $lineas = $query->paginate(20);
        $this->userrol = $user->rol;
        $this->userUsuario = $user->usuario;
        return view('livewire.report-registros', [
            'lineas' => $lineas,
        ]);
    }
}
