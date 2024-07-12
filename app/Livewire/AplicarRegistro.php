<?php

namespace App\Livewire;

use App\Models\bancos;
use App\Models\clientes;
use App\Models\Linea;
use App\Models\TransacLog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AplicarRegistro extends Component
{
    public $lineaId;
    public $linea;
    public $banco;
    public $idCliente;
    public $cliente;
    public $class;
    public $style;
    public $cobro;
    public $deposito;
    public $errorMessage;
    protected $listeners = ['aplicarAsignacion'];
    #[On('aplicarAsignacion')]
    public function aplicarAsignacion($lineaId)
    {
        $this->class = "show";
        $this->style = "display:block";
        $this->lineaId = $lineaId;
        $this->linea = Linea::find($this->lineaId);
        $this->banco = bancos::where('banco', $this->linea->banco)->first();
        if ($this->linea->cliente != null) {
            $this->idCliente = $this->linea->cliente;
            $this->cliente = clientes::where('cliente', $this->linea->cliente)->first();
        }
    }
    public function updatedIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
        if (!empty($this->idCliente)) {
            $this->cliente = clientes::where('cliente', $this->idCliente)->first();
            if ($this->cliente == null) {
                $this->cliente = (object) ['nombre_cliente' => ''];
            }
        } else {
            $this->cliente = (object) ['nombre_cliente' => ''];
        }
    }
    public function guardar()
    {
        if ($this->idCliente == null || $this->cobro == null || $this->deposito == null) {
            $this->errorMessage = "Todos los campos son requeridos";
            return;
        }
        $linea = Linea::find($this->lineaId);
        try {
            $cliente = ($this->cliente == null) ? clientes::where('cliente', $this->idCliente)->first() : $this->cliente;
            $linea->cliente = $cliente->cliente;
        } catch (\Exception $e) {
            $this->errorMessage = "Cliente no encontrado, verifique el número de cliente o avise un administrador";
            return;
        }
        try {
        $linea->cobro = $this->cobro;
        $linea->fecha_cobro = date('Y-m-d');
        $linea->num_deposito = $this->deposito;
        $linea->estado = 'apl';
        $linea->save();
        } catch (\Exception $e) {
            $this->errorMessage = "Error en alguno de los campos, verifique los datos o avise a un administrador";
            return;
        }
        $user = Auth::user();
        TransacLog::create([
            'usuario' => $user->usuario,
            'fecha_registro' => date('Y-m-d'),
            'descripcion' => $linea->referencia_unica . "-ASIGNADO-APLICADO",
            'operacion' => 'APLICACIÓN'
        ]);
        $this->js('window.location.reload()');
    }
    public function cancelar()
    {
        $linea = Linea::find($this->lineaId);
        $linea->estado = 'cnl';
        $linea->save();
        $referencia_unica_old = $linea->referencia_unica;
        $antes = substr($referencia_unica_old, 0, 8);
        $envios = substr($referencia_unica_old, 8, 2);
        if ($envios < 99) {
            $envios += 1;
            $envios = str_pad($envios, 2, '0', STR_PAD_LEFT);
        } else {
            $envios = '01';
        }
        $despues = substr($referencia_unica_old, 10, 6);
        $referencia_unica_new = $antes . $envios . $despues;
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
        try {
            TransacLog::create([
                'usuario' => $user->usuario,
                'fecha_registro' => date('Y-m-d'),
                'descripcion' => $referencia_unica_old . "-MODAL-" . $referencia_unica_new,
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
                'agente_asignado' => $linea->agente_asignado,
                'vendedor' => $linea->vendedor,
                'estado' => 'asi',
                'fecha_estado' => date('Y-m-d'),
                'cobro' => $linea->cobro,
                'fecha_cobro' => $linea->fecha_cobro,
                'num_deposito' => $linea->num_deposito,
                'href' => $linea->href
            ]);
        } catch (\Exception $e) {
            $this->errorMessage = "Error en alguno de los campos, verifique los datos o avise a un administrador";
            return;
        }
        $this->js('window.location.reload()');
    }
    public function render()
    {
        return view('livewire.aplicar-registro');
    }
    public function copiarReferencia()
    {
        $this->js("
        if (window.isSecureContext && navigator.clipboard) {
            navigator.clipboard.writeText('" . $this->linea->referencia_unica . "');
        } else {
            unsecuredCopyToClipboard('" . $this->linea->referencia_unica . "');
        }
        ");
        $this->js("iziToast.success({
                title: 'Copiada',
                message: 'La referencia unica se ha copiado',
            });");
    }
}
