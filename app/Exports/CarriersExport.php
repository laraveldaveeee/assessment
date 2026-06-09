<?php

namespace App\Exports;

use App\NewCarrier;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CarriersExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithEvents
{
    protected $from;
    protected $to;
    protected $filters; // ['applicant_company' => ..., 'class_stations' => ..., 'fees' => ...]
    protected $totalAmount;

    public function __construct($from = null, $to = null, $filters = [])
    {
        $this->from = $from;
        $this->to = $to;
        $this->filters = $filters;

        $query = $this->buildQuery();

        // Compute total amount
        $this->totalAmount = $query->get()->reduce(function ($carry, $item) {
            $raw = preg_replace('/[^0-9.\-]/', '', $item->amount ?? '');
            return $carry + (is_numeric($raw) ? (float)$raw : 0);
        }, 0);
    }

  protected function buildQuery()
{
    $query = NewCarrier::query();

    // Date range
    if ($this->from && $this->to) {
        $query->whereBetween('or_date', [
            Carbon::parse($this->from)->startOfDay(),
            Carbon::parse($this->to)->endOfDay(),
        ]);
    }

    // Applicant Company strict
    if (!empty($this->filters['applicant_company'])) {
        $query->whereRaw('LOWER(TRIM(applicant_company)) = ?', [
            strtolower(trim($this->filters['applicant_company']))
        ]);
    }

    // Class Stations strict
    if (!empty($this->filters['class_stations'])) {
        $query->whereRaw('LOWER(TRIM(class_stations)) = ?', [
            strtolower(trim($this->filters['class_stations']))
        ]);
    }

    // Fees strict
    if (!empty($this->filters['fees'])) {
        $query->whereRaw('LOWER(TRIM(fees)) = ?', [
            strtolower(trim($this->filters['fees']))
        ]);
    }

    return $query->orderBy('or_date');
}


    public function query()
    {
        return $this->buildQuery();
    }

public function headings(): array
{
    return [
        'ID',
        'OR Date',
        'OR Number',
        'SOA Number',   // bagong column
        'Company',
        'Class Stations',
        'Fees (SUF)',
        'Amount',
        'Remarks',
    ];
}

public function map($row): array
{
    $amount = is_numeric($row->amount) ? (float)$row->amount : 0;

    return [
        $row->id,
        $row->or_date,
        $row->or_no,
        $row->soa_number,    // bagong field
        $row->applicant_company,
        $row->class_stations,
        $row->fees,
        $amount,
        $row->remarks,
    ];
}

    public function registerEvents(): array
    {
        $total = $this->totalAmount;

        return [
            AfterSheet::class => function (AfterSheet $event) use ($total) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $totalRow = $highestRow + 2;

                $sheet->setCellValue('D' . $totalRow, 'TOTAL');
                $sheet->setCellValue('G' . $totalRow, $total);

                $sheet->getStyle('A1:H1')->getFont()->setBold(true);
                $sheet->getStyle('D' . $totalRow . ':G' . $totalRow)->getFont()->setBold(true);
                $sheet->getStyle('G2:G' . $highestRow)->getNumberFormat()
                      ->setFormatCode('#,##0.00');
                $sheet->getStyle('G' . $totalRow)->getNumberFormat()
                      ->setFormatCode('#,##0.00');
            },
        ];
    }
}
