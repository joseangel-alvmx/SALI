<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class LineasExport implements FromView, WithEvents
{
    protected $resultados;

    public function __construct(Collection $resultados)
    {
        $this->resultados = collect($resultados);
    }

    public function view(): View{
        return view('Pdfs.LineasPdf', ['lineas' => $this->resultados]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestColumn = $sheet->getHighestColumn();
                $highestRow = $sheet->getHighestRow();

                // Merge the first cell in the first column
                $sheet->mergeCells('A1:' . $highestColumn . '1');
                // Set the background color and font color for the merged cell
                $sheet->getStyle('A1:' . $highestColumn . '2')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['rgb' => '0085ff'],
                    ],
                    'font' => [
                        'color' => ['rgb' => 'ffffff'],
                        'align' => 'center',
                    ],
                ]);

                // Auto-size columns
                foreach (range('A', $highestColumn) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
                // Apply number format to the last column
                $lastColumn = $highestColumn . '3:' . $highestColumn . $highestRow;
                $sheet->getStyle($lastColumn)->getNumberFormat()->setFormatCode('0');
                $sheet->setAutoFilter("A2:" . $highestColumn . $highestRow);
            },
        ];
    }
}
