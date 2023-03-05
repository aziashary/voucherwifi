<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Voucher;

class MenuController extends Controller
{
    public function menu($lokasi)
    {
        $item = $lokasi;
        $data= Paket::orderBy('id_paket', 'ASC')->get();
        return view('menu.create', compact('data','item'));
    }
    public function checkout($paket, $lokasi)
    {
        $data= Voucher::where([
            ['paket',$paket],
            ['lokasi', $lokasi],
            ['status_voucher','Available']
        ])->count();
        // $item= Voucher::where('paket', $paket)->where('lokasi','GRD.NET')->get();

        return response()->json([
            'stok' => $data,
            'paket' => $paket,
            'lokasi' => $lokasi,
        ]); 
    }

}
