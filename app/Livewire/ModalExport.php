<?php

namespace App\Livewire;

use App\Exports\LineasExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ModalExport extends Component
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
    public $loading = false;
    protected $listeners = ['openExportModal', 'export', 'loadingData'];
    #[On('openExportModal')]
    public function openExportModal($lineas)
    {
        $this->class = "show";
        $this->style = "display:block";
        $this->lineas = collect($lineas);
    }
    #[On('export')]
    public function export()
    {
        $this->loading = true;
        if ($this->loading == true) {
            if ($this->export_selected == 'pdf') {
                ini_set('memory_limit', '-1');
                ini_set('max_execution_time', '600');
                $pdf = Pdf::loadView('Pdfs.LineasPdf', ['lineas' => $this->lineas]);
                $response = response()->streamDownload(function () use ($pdf) {
                    echo $pdf->stream();
                }, 'reporte.pdf');
            } else {
                $response = Excel::download(new LineasExport($this->lineas), 'reporte.xlsx');
            }

            $this->loading = false;
            $this->js("$('#modal-export').modal('hide');");
            return $response;
        }
    }
    #[On('loadingData')]
    public function loadingData()
    {
        $this->loading = true;
    }
    public function openExport(){
        $this->loading = true;
        $this->dispatch("loadingData");
        $this->dispatch("export");
    }
    public function render()
    {
        return view('livewire.modal-export');
    }
}