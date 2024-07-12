<?php

namespace App\Livewire;

use App\Models\Linea;
use Livewire\Component;

class Dashboard extends Component
{
    public $countTotalRegisters = 0;
    public $countUnassignedRegisters = 0;
    public $countAssignedRegisters = 0;
    public $countAppliedRegisters = 0;
    public $countCanceledRegisters = 0;
    public $countNoIdRegisters = 0;
    public $countTotal = 0;
    public $countUnassigned = 0;
    public $countAssigned = 0;
    public $countApplied = 0;
    public $countCanceled = 0;
    public $countNoId = 0;
    public $userrol;
    public $months = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre',
    ];
    public $years;
    public $month_selected;
    public $year_selected;
    public $dateStart;
    public $dateEnd;
    protected $listeners = ['updateDates'];
    #[On('updateDates')]
    public function updateDates($key, $value)
    {
        $this->$key = $value;
    }
    public function mount()
    {
        $this->userrol = auth()->user()->rol;
        $this->month_selected = date('m');
        $this->year_selected = date('Y');
        // Rango de años para el selector
        foreach (range(2024, 2050) as $year) {
            $this->years[$year] = $year;
        }
    }
    public function render()
    {

        // Define el filtro de fechas
        // Define el filtro de fechas basado en el campo adecuado
        $query = Linea::query();

        // Aplica los filtros correspondientes
        if ($this->dateStart && $this->dateEnd) {
            $query->where(function ($subQuery) {
                $subQuery->where(function ($q) {
                    $q->whereNotNull('updated_at')
                        ->whereBetween('updated_at', [$this->dateStart, $this->dateEnd]);
                })->orWhere(function ($q) {
                    $q->whereNull('updated_at')
                        ->whereBetween('fecha_movimiento', [$this->dateStart, $this->dateEnd]);
                });
            });
        } else {
            $query->where(function ($subQuery) {
                $subQuery->where(function ($q) {
                    $q->whereNotNull('updated_at')
                        ->whereMonth('updated_at', $this->month_selected)
                        ->whereYear('updated_at', $this->year_selected);
                })->orWhere(function ($q) {
                    $q->whereNull('updated_at')
                        ->whereMonth('fecha_movimiento', $this->month_selected)
                        ->whereYear('fecha_movimiento', $this->year_selected);
                });
            });
        }
        logger($query->toRawSql());
        // Clonar la consulta base para cada conteo
        $this->countTotalRegisters = (clone $query)->count();
        $this->countUnassignedRegisters = (clone $query)->where('estado', 'new')->count();
        $this->countAssignedRegisters = (clone $query)->where('estado', 'asi')->count();
        $this->countCanceledRegisters = (clone $query)->where('estado', 'cnl')->count();
        $this->countAppliedRegisters = (clone $query)->where('estado', 'apl')->count();
        $this->countNoIdRegisters = (clone $query)->where('estado', 'nid')->count();

        // Sumas de importes
        $this->countTotal = '$' . number_format((clone $query)->sum('importe'), 2, '.', ',');
        $this->countUnassigned = '$' . number_format((clone $query)->where('estado', 'new')->sum('importe'), 2, '.', ',');
        $this->countAssigned = '$' . number_format((clone $query)->where('estado', 'asi')->sum('importe'), 2, '.', ',');
        $this->countApplied = '$' . number_format((clone $query)->where('estado', 'apl')->sum('importe'), 2, '.', ',');
        $this->countCanceled = '$' . number_format((clone $query)->where('estado', 'cnl')->sum('importe'), 2, '.', ',');
        $this->countNoId = '$' . number_format((clone $query)->where('estado', 'nid')->sum('importe'), 2, '.', ',');


        return view('livewire.dashboard');
    }
}
