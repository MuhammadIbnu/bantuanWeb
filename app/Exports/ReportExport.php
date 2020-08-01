<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Http\Resources\ReportResource;

use App\Data;

class ReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * ReportsExport constructor.
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $filter = Data::whereMonth('updated_at', date_format($this->date, 'm'))
            ->whereYear('updated_at', date_format($this->date, 'Y'))->where('confirmed_III', true)->get();
        // dd($filter);
        return ReportResource::collection($filter);
    }

    public function headings(): array
    {
        return [
            'kd_berkas',
            'waris_nik',
            'waris_nama',
            'ktp_meninggal',
            'kk_meninggal',
            'jamkesmas',
            'ktp_waris',
            'kk_waris',
            'akta_kematian',
            'pakta_waris',
            'pernyataan_waris',
            'keterangan',
            'keterangan_II',
            'keterangan_III',
            'confirmed_I',
            'confirmed_II',
            'confirmed_III',
        ];
    }
}
