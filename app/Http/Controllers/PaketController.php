<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Paket;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaketController extends Controller
{
    function index()
    { 
     $data = Paket::orderBy('id_paket', 'ASC')->with('hargas')->get();
     return view('paket.index', compact('data'));
    }
}
