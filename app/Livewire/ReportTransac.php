<?php

namespace App\Livewire;

use App\Models\TransacLog;
use Livewire\Component;
use App\Models\Linea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class ReportTransac extends Component
{
    use WithPagination;

    public $filter = 'todos'; // Añadir la propiedad filter
    public $showFechaReg = true;
    public $showUsuario = true;
    public $showDescripcion = true;
    public $showOperacion = true;
    public $registerDateStart;
    public $registerDateEnd;
    public $transacCollection;
    public $columnsFilters;
    public $columnData = [
        'fecha_registro' => [],
        'usuario' => [],
        'descripcion' => [],
        'operacion' => [],
    ];
    public $showFilters = [
        'fecha_registro' => false,
        'usuario' => false,
        'descripcion' => false,
        'operacion' => false,
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
    public function render()
    {
        // si es un admin o contabilidad, mostrar la columna de referencia única
        $this->columnsFilters = [
            'fecha_registro' => $this->showFechaReg,
            'usuario' => $this->showUsuario,
            'descripcion' => $this->showDescripcion,
            'operacion' => $this->showOperacion,
        ];
        foreach ($this->showFilters as $key => $value) {
            if ($value && !isset($this->dataCols[$key])) {
                $this->dataCols[$key] = Cache::remember("dataCols_{$key}", 60, function () use ($key) {
                    return TransacLog::get()->pluck($key)->unique()->filter()->sort();
                });
            }
        }
        // Definir los filtros de las columnas
        $query = TransacLog::search($this->columnsFilters, $this->registerDateStart, $this->registerDateEnd, $this->columnData);
        $this->transacCollection = $query->get();
        $transacs = $query->paginate(20);
        return view('livewire.report-transac', [
            'transacs' => $transacs,
        ]);
    }
}
