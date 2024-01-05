<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Voucher;
use App\Imports\VoucherImport;
use Illuminate\Http\Client\Response;

class VoucherController extends Controller
{
    function index()
    { 
     $data = Voucher::where('status_voucher', 'Available')->orderBy('id_voucher', 'DESC')->with('hargas')->get();
     $paket = Paket::get();
     $lokasi = Lokasi::orderby('id_lokasi', 'ASC')->get();
     return view('voucher.index', compact('data','paket','lokasi'));
    }

    public function filter(Request $request)
    {
        // Ambil data dari request
        $lokasi = Lokasi::orderby('id_lokasi', 'ASC')->get();
        $paket = Paket::get();
        $paketFilter = $request->input('paket');
        $lokasiFilter = $request->input('lokasi');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query berdasarkan filter
        $query = Voucher::query();

        if ($paketFilter) {
            $query->whereIn('paket', $paketFilter);
        }

        if ($lokasiFilter) {
            $query->whereIn('lokasi', $lokasiFilter);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Ambil data setelah difilter
        $data = $query->where('status_voucher', 'Available')->orderBy('id_voucher', 'DESC')->with('hargas')->get();

        return view('voucher.index', compact('data','paket','lokasi'));
    }

    function used()
    { 
     $data = Voucher::where('status_voucher','!=', 'Available')->orderBy('id_voucher', 'DESC')->with('hargas')->get();
     return view('voucher.used', compact('data'));
    }

    public function filterused(Request $request)
    {
        // Ambil data dari request
        $paketFilter = $request->input('paket');
        $lokasiFilter = $request->input('lokasi');
        $status = $request->input('status');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query berdasarkan filter
        $query = Voucher::query();

        if ($paketFilter) {
            $query->whereIn('paket', $paketFilter);
        }

        if ($lokasiFilter) {
            $query->whereIn('lokasi', $lokasiFilter);
        }

        if ($status) {
            $query->whereIn('status_voucher', $status);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Ambil data setelah difilter
        $data = $query->where('status_voucher','!=', 'Available')->orderBy('id_voucher', 'DESC')->with('hargas')->get();

        return view('voucher.used', compact('data'));
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'lokasi' => 'required',
        'paket' => 'required',
        'kode_voucher' => [
            'required',
            'unique:voucher,kode_voucher', // Pastikan kode voucher bersifat unik di dalam tabel vouchers
        ],
    ]);

    // Dapatkan paket berdasarkan ID
    
    // Dapatkan paket berdasarkan ID
    $paket= Paket::where('id_paket', $request->paket)->first();


    try {
        // Cek apakah kode voucher sudah ada di database
        $existingVoucher = Voucher::where('kode_voucher', $request->kode_voucher)->first();

        if ($existingVoucher) {
            return redirect('adminvoucher/voucher')->with('error', 'Kode Voucher sudah ada. Silakan gunakan kode yang berbeda.');
        }

        // Simpan voucher ke database
        $store = Voucher::create([
            'lokasi' => $request->lokasi,
            'paket' => $paket->paket,
            'kode_voucher' => $request->kode_voucher,
            'status_voucher' => 'Available',
        ]);

        if ($store) {
            return redirect('adminvoucher/voucher')->with('success', 'Berhasil Tambah Voucher');
        } else {
            return redirect('adminvoucher/voucher')->with('error', 'Terjadi kesalahan');
        }
    } catch (\Exception $e) {
        return redirect('adminvoucher/voucher')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function upload(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xls,xlsx',
    ]);

    $path = $request->file('excel_file')->getRealPath();

    try {
        // Baca data dari file Excel dan simpan ke database
        Excel::import(new VoucherImport, $path);

        return redirect('adminvoucher/voucher')->with('success','Berhasil Tambah Voucher');
    } catch (\Exception $e) {
        return redirect('adminvoucher/voucher')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function download()
{
    $file = public_path() . "/assets/excel/voucher.xlsx";

    // Pastikan file benar-benar ada
    if (file_exists($file)) {
        // Set headers
        $headers = array(
            'Content-Type: application/xlsx',
        );

        // Kembalikan file sebagai respons
        return response()->download($file, 'voucher.xlsx', $headers);
    } else {
        // Jika file tidak ditemukan, Anda dapat menangani kesalahan di sini
        abort(404, 'File not found');
    }
}


    public function delete($id_voucher)
    {
        $destroy = Voucher::where('id_voucher',$id_voucher)->delete();

        return redirect('adminvoucher/voucher')->with('success','Berhasil menghapus data');
    }

}
