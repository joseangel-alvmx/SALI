<?php

namespace App\Livewire;

use App\Models\Linea;
use App\Models\TransacLog;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepositedChart extends Component
{
    public $labels;
    public $data;
    public function render()
    {
        $this->labels = TransacLog::select('fecha_registro')->distinct()
            ->orderBy('fecha_registro')
            ->where('operacion', '=', 'ASIGNACION')
            ->get()
            ->pluck('fecha_registro');
            // ->toArray();
        $importesTotales = DB::table('transac_logs')->selectRaw('COUNT(id) AS total_importe, fecha_registro')
    ->where('operacion', 'ASIGNACION')
    ->groupBy('fecha_registro')
    ->get();
        $data = [];
        foreach ($importesTotales as $importe) {
            $data[] = $importe->total_importe;
        }
        $this->data = json_encode($data);
        return view('livewire.deposited-chart');
    }
}
