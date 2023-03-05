<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    
    protected $fillable = [
        'kode_transaksi',
        'lokasi',
        'kode_voucher',
        'paket',
        'durasi',
        'harga'
    ];

    public function hargas()
    {
        return $this->hasOne('App\Models\Paket', 'paket', 'paket');
    }
}
