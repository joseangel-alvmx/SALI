<?php

namespace App\Livewire;

use App\Models\Linea;
use App\Models\TransacLog;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ConfirmarReasignacionModal extends Component
{
    public $users;
    public $user_selected;
    public $self;
    public $userrol;
    public $lineaId;
    public $class;
    public $style;
    protected $listeners = ['confirmarReasignacion'];
    #[On('confirmarReasignacion')]
    public function confirmarReasignacion($lineaId)
    {
        $this->class = "show";
        $this->style = "display:block";
        $this->lineaId = $lineaId;
    }
    public function reasignar(){
        $linea = Linea::find($this->lineaId);
        $linea->estado = 'cnl';
        $linea->save();
        $referencia_unica_old = $linea->referencia_unica;
        $antes = substr($referencia_unica_old, 0, 8);
        $envios = substr($referencia_unica_old, 8, 2);
        if($envios < 99){
            $envios += 1;
            $envios = str_pad($envios, 2, '0', STR_PAD_LEFT);
        }else{
            $envios = '01';
        }
        $despues = substr($referencia_unica_old, 10, 6);
        $referencia_unica_new = $antes.$envios.$despues;
        $digitos = str_split($referencia_unica_new);
        $sumatoriaPar = 0;
        $sumatoriaImpar = 0;
        foreach ($digitos as $posicion => $digito) {
        if ($posicion % 2 == 0) {
            $sumatoriaPar += $digito;
        } else {
            $sumatoriaImpar += $digito * 3;
        }
        }
        $digitoControl = 10 - (($sumatoriaPar + $sumatoriaImpar) % 10);
        if ($digitoControl == 10) {
        $digitoControl = 0;
        }
        $referencia_unica_new .= $digitoControl;

        $user = Auth::user();
        TransacLog::create([
            'usuario' => $user->usuario,
            'fecha_registro' => date('Y-m-d'),
            'descripcion' => $referencia_unica_old ."-MODAL-" . $referencia_unica_new,
            'operacion' => 'CANCELACIÓN'
        ]);
        TransacLog::create([
            'usuario' => $user->usuario,
            'fecha_registro' => date('Y-m-d'),
            'descripcion' => $referencia_unica_new . "-" . $linea->agente_asignado . "-" . $linea->agente_asignado,
            'operacion' => 'REASIGNACIÓN'
        ]);
        Linea::create([
            'referencia_unica' => $referencia_unica_new,
            'fecha_movimiento' => $linea->fecha_movimiento,
            'banco' => $linea->banco,
            'cuenta' => $linea->cuenta,
            'folio_banco' => $linea->folio_banco,
            'folio_aceptacion' => $linea->folio_aceptacion,
            'transaccion' => $linea->transaccion,
            'referencia' => $linea->referencia,
            'importe' => $linea->importe,
            'tipo_operacion' => $linea->tipo_operacion,
            'cliente' => $linea->cliente,
            'agente_asignado' => null,
            'vendedor' => $linea->vendedor,
            'estado' => 'new',
            'fecha_estado' => date('Y-m-d'),
            'cobro' => $linea->cobro,
            'fecha_cobro' => $linea->fecha_cobro,
            'num_deposito' => $linea->num_deposito,
            'href' => $linea->href
        ]);
        $this->js('window.location.reload()');
    }
    public function render()
    {
        $this->userrol = Auth::user()->rol;
        $this->users = user::query()->pluck('usuario', 'usuario')->all();
        return view('livewire.confirmar-reasignacion-modal');
    }
}
