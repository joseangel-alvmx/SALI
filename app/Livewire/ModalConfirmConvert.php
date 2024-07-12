<?php

namespace App\Livewire;

use App\Exports\LineasExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ModalConfirmConvert extends Component
{
    public $options = [
        'xls' => 'Excel',
        'pdf' => 'PDF',
    ];
    public $class = '';
    public $style = '';
    public $export_selected = '';
    public $search;
    public $filter;
    public $columnsFilters;
    public $lineas;
    protected $listeners = ['openConfirmConvertModal'];
    #[On('openConfirmConvertModal')]
    public function openConfirmConvertModal($lineas)
    {
        $this->class = "show";
        $this->style = "display:block";
        $this->lineas = collect($lineas);
        logger("intento de abrir");
    }
    public function export()
    {
        $user = auth()->user();
        $this->class = "";
        $this->style = "";
        if ($this->export_selected == 'pdf') {
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', '600');
            $pdf = Pdf::loadView('Pdfs.LineasPdf', ['lineas' => $this->lineas]);
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, 'reporte.pdf');
        }else{
            return Excel::download(new LineasExport($this->lineas), 'reporte.xlsx');
        }
    }
    public function render()
    {
        return view('livewire.modal-confirm-convert');
    }
}