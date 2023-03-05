<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    
    protected $fillable = [
        'kode_transaksi',
        'email',
        'no_telepon',
        'lokasi',
        'paket',
        'kuantiti',
        'biaya_admin',
        'total',
        'status',
        'payment_link',
        'payment_method',
    ];

    public function hargas()
    {
        return $this->hasOne('App\Models\Paket', 'paket', 'paket');
    }

}
