<?php

namespace App\Livewire;

use App\Models\user;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserMetricsTable extends Component
{
    use WithPagination;
    public $users;
    public function render()
    {
        $this->users = DB::select("SELECT u.usuario AS Nombre,
               (SELECT COUNT(id) FROM lineas l WHERE l.agente_asignado = u.usuario AND l.estado = 'asi') AS Asignado,
               (SELECT COUNT(id) FROM lineas l WHERE l.agente_asignado = u.usuario AND l.estado = 'apl') AS Aplicado,
               (SELECT COUNT(id) FROM lineas l WHERE l.agente_asignado = u.usuario AND l.estado = 'cnl') AS Cancelado
        FROM users u 
        ORDER BY Asignado DESC, Aplicado DESC, Cancelado DESC LIMIT 9");
        return view('livewire.user-metrics-table');
    }
}
