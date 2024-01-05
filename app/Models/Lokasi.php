<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi';
    
    protected $fillable = [
        'lokasi',
    ];
    
    public function vouchers()
    {
        return $this->hasOne('App\Models\Voucher', 'lokasi', 'lokasi');
    }
}
