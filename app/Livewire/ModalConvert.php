<?php

namespace App\Livewire;

use App\Models\Linea;
use App\Models\TransacLog;
use Livewire\Component;

class ModalConvert extends Component
{
    public $selectedLines;
    public $class;
    public $style;
    protected $listeners = ['openConvertModal'];
    #[On('openConvertModal')]
    public function openConvertModal($selectedLines)
    {
        $this->class = "show";
        $this->style = "display:block";
        $this->selectedLines = $selectedLines;
        logger($this->selectedLines);
    }
public function setLines(){
    $user = auth()->user()->usuario;
    $ids = [];

    // Recopilar los IDs de las líneas seleccionadas
    foreach($this->selectedLines as $linea){
        $ids[] = $linea['id'];
    }

    // Actualizar el estado de las líneas seleccionadas en la base de datos
    Linea::whereIn('id', $ids)->update(['estado' => 'nid']);

    // Registrar la transacción en el log y actualizar el estado local de las líneas
    foreach($this->selectedLines as &$linea){
        TransacLog::create([
            'usuario' => $user,
            'fecha_registro' => now(),
            'descripcion' => $linea['referencia_unica'] . '-NUEVO-NO_IDENTIFICADO',
            'operacion' => 'RECLASIFICACION'
        ]);

        // Verificar si el estado está definido antes de actualizar
        if(isset($linea['estado'])){
            $linea['estado'] = 'nid';
            $linea['descripcion'] = 'No identificado';
        }
    }
    
    // Resetear las propiedades de clase y estilo
    $this->class = "";
    $this->style = "";
    $this->dispatch("openConfirmConvertModal",lineas: $this->selectedLines);
    $this->js("$('#modal-convert').modal('hide');$('#modal-confirm-convert').modal('show');");
}

    public function render()
    {
        return view('livewire.modal-convert');
    }
}
