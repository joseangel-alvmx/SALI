<?php

namespace App\Livewire;

use App\Models\Linea;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AppliedChart extends Component
{
    public $labels;
    public $data;
    public function render()
    {
        $this->labels = Linea::select('fecha_movimiento')->distinct()
            ->where('estado', 'apl')
            ->orderBy('fecha_movimiento')
            ->get()
            ->pluck('fecha_movimiento');
            // ->toArray();
        $importesTotales = Linea::select(DB::raw('SUM(importe) as total_importe'), 'fecha_movimiento')
            ->where('estado', 'apl')
            ->groupBy('fecha_movimiento')
            ->orderBy('fecha_movimiento')
            ->get();
        $data = [];
        foreach ($importesTotales as $importe) {
            $data[] = $importe->total_importe;
        }
        $this->data = json_encode($data);
        return view('livewire.applied-chart');
    }
}
