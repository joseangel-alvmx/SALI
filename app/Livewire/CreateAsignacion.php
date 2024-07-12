<?php

namespace App\Livewire;

use App\Models\Linea;
use App\Models\TransacLog;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAsignacion extends Component
{
    public $users;
    public $user_selected;
    public $self;
    public $userrol;
    public $lineaId;
    public $class;
    public $style;
    protected $listeners = ['createAsignacion'];
    #[On('createAsignacion')]
    public function createAsignacion($lineaId)
    {
        $this->class = "show";
        $this->style = "display:block";
        $this->lineaId = $lineaId;
    }
    public function render()
    {
        $this->userrol = Auth::user()->rol;
        $this->users = user::query()->pluck('usuario', 'usuario')->all();
        return view('livewire.create-asignacion');
    }
    public function asignar(){
        if($this->self || $this->userrol != 'admin' || $this->user_selected == null){
            $this->user_selected = Auth::user()->usuario;
        }
        logger($this->user_selected);
        $linea = Linea::find($this->lineaId);
        $linea->agente_asignado = $this->user_selected;
        $linea->estado = 'asi';
        $linea->save();
        $user = Auth::user();
        TransacLog::create([
            'usuario' => $user->usuario,
            'fecha_registro' => date('Y-m-d'),
            'descripcion' => $linea->referencia_unica."-NUEVO-ASIGNADO",
            'operacion' => 'ASIGNACIÓN'
        ]);
        $this->js('window.location.reload()');
    }
}
