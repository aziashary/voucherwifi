<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    
    protected $fillable = [
        'paket',
        'harga',
        'durasi',
    ];
    
    public function hargas()
    {
        return $this->hasOne('App\Models\Paket', 'paket', 'paket');
    }
}
