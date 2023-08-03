<?php

namespace App\Exports;

use Carbon\Carbon;

use App\Models\Transaksi;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class TransaksiExport extends DefaultValueBinder implements FromQuery, WithMapping,WithHeadings,ShouldAutoSize, WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function query()
    {
        return Transaksi::query();
    }
    public function map($transaksi) : array 
    {
        return [
            $transaksi->tanggal_pendataan,
            $transaksi->objekpajak->nama_objek,
            $transaksi->jenispajak->nama_pajak,
            $transaksi->wajibpajak->nama,
            $transaksi->norek_transaksi,
            $transaksi->kode_bayar,
            $transaksi->kegiatan,
            Carbon::parse($transaksi->bulan_bayar)->locale('id')->getTranslatedMonthName('MMMM'),
            $transaksi->dasar_pengenaan,
            $transaksi->tarif_pajak,
            $transaksi->total_pajak,
            $transaksi->metode_bayar,
            $transaksi->status,
        ];
    }
    public function headings(): array
    {
        return [
            'TANGGAL PENDATAAN',
            'NAMA OBJEK',
            'JENIS PAJAK',
            'WAJIB PAJAK',
            'NOREK TRANSAKSI',
            'KODE BAYAR',
            'KETERANGAN',
            'BULAN BAYAR',
            'DASAR PENGENAAN',
            'TARIF PAJAK(%)',
            'TOTAL PAJAK',
            'METODE BAYAR',
            'STATUS',            
        ];
    }
    
}
