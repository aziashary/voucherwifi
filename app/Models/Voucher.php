<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    
    protected $fillable = [
        'lokasi',
        'kode_voucher',
        'paket',
        'status_voucher',
    ];

    public function hargas()
    {
        return $this->hasOne('App\Models\Paket', 'paket', 'paket');
    }
}
