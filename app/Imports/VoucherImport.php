<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Voucher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VoucherImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Sesuaikan dengan nama kolom yang ada pada file Excel
        return new Voucher([
            'lokasi' => $row['lokasi'],
            'kode_voucher' => $row['kode_voucher'],
            'paket' => $row['paket'],
            'status_voucher' => 'Available',
        ]);
    }
}
