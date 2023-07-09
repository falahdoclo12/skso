<?php
namespace App\Exports;

use App\Models\Boq;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class BoqExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    public function collection()
    {
        return Boq::all();
    }

    public function headings(): array
    {
        return ['Title', 'Description', 'Created At', 'Updated At'];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DATETIME,
            'D' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function exportToExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $boqs = $this->collection();
        $row = 1;

        foreach ($boqs as $boq) {
            $sheet->setCellValue('A'.$row, $boq->title);
            $sheet->setCellValue('B'.$row, $boq->description);
            $sheet->setCellValue('C'.$row, $boq->created_at);
            $sheet->setCellValue('D'.$row, $boq->updated_at);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('app/boqs.xlsx'));
    }
}