<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Paket;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaketController extends Controller
{
    function index()
    { 
     $data = Paket::orderBy('id_paket', 'ASC')->with('hargas')->get();
     return view('paket.index', compact('data'));
    }

    public function store(Request $request)
    {
        $store = Paket::create([
            'paket' => $request->paket,
            'harga' => $request->harga,
            'durasi' => $request->durasi
        ]);
        
        if ($store) {
            return redirect('adminvoucher/paket')->with('success', 'Berhasil Tambah Voucher');
        } else {
            return redirect('adminvoucher/paket')->with('error', 'Terjadi kesalahan');
        }
    }

    public function delete($id_paket)
    {
        $destroy = Paket::where('id_paket',$id_paket)->delete();

        return redirect('adminvoucher/paket')->with('success','Berhasil menghapus data');
    }
    

    
}
