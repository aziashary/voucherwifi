<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    function index()
    { 
     $data = Voucher::where('status_voucher', 'Available')->orderBy('id_voucher', 'DESC')->with('hargas')->get();
     return view('voucher.index', compact('data'));
    }

    function used()
    { 
     $data = Voucher::where('status_voucher','!=', 'Available')->orderBy('id_voucher', 'DESC')->with('hargas')->get();
     return view('voucher.used', compact('data'));
    }
}
