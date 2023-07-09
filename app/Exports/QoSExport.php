<?php

namespace App\Exports;

use App\Models\QoS;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QosExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return QoS::query();
    }

    public function headings(): array
    {
        return [
            'Availability',
            'Packet Loss',
            'Throughput',
            'Latency',
            'Jitter',
            'PM',
            'TTR',
            'Nilai Avail',
            'Nilai PL',
            'Nilai T',
            'Nilai L',
            'Nilai J',
            'Nilai PM',
            'Nilai TTR',
        ];
    }
}
