<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Voucher;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;


class TransaksiController extends Controller
{
    public function index()
    {
    $data = Transaksi::orderby('id_transaksi','ASC')->get();
    return view('transaksi.index', compact('data'));
    }

    public function create()
    {
        $data = Paket::orderby('id_paket','ASC')->get();
        return view('transaksi.index', compact('data'));
    }

    public function store(Request $request, $lokasi)
    {
        // Captcha
        // $validate_captcha = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));
        // if (!$validate_captcha) {
        //     return redirect()->back()->with('error_source', 'captcha');
        // }

        // cek stok
        $stok = Voucher::where([
            ['paket',$request->paket],
            ['lokasi',$lokasi],
            ['status_voucher','Available']
        ])->count();

        if($request->kuantiti > $stok) {
            return redirect()->back()->with('error_source', 'stok');
        }else{

        // input variable
        $harga = Paket::where('paket', $request->paket)->select('harga')->value('harga');
        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = 'Qnsi-'.Str::random(10);
        $total = $harga * $request->kuantiti;
        $biaya_admin = $request->biaya_admin;
        $eWalletMethod = 'SHOPEEPAY'; // Misalnya: 'GO_PAY', 'OVO', 'DANA', dll.
        $eWalletInfo = [
            'ewallet_type' => $eWalletMethod,
            'phone' => $request->no_whatsapp, // Nomor telepon yang terkait dengan e-wallet
            // Jika menggunakan OVO, Anda mungkin membutuhkan informasi tambahan, seperti "ovo_id"
            // 'ovo_id' => $request->input('ovo_id'),
        ];
            
        
        // Http request ke xendit
        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => $total + $biaya_admin,
            'payment_method' => $eWalletMethod, // Menggunakan metode pembayaran e-wallet yang telah dipilih
            'ewallet_info' => $eWalletInfo, // Informasi e-wallet
            'customer' => [
                'email' => $request->email,
                'mobile_number' => $request->no_whatsapp,
            ],
            'customer_notification_preference' => [
                'invoice_created' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_paid' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_expired' => [
                    'whatsapp',
                    'sms',
                    'email'
                ]
            ],
            'success_redirect_url' => 'https://adef-110-137-194-136.ngrok-free.app/bayar/showvoucher/'.$external_id,
            'failure_redirect_url' => 'https://6bda-180-252-168-239.ap.ngrok.io/',
        ]);
        $response = $data_request->object();

        // input to database transaksi
        $store = Transaksi::create([
            'kode_transaksi' => $external_id,
            'email' => $request->email,
            'no_telepon' => $request->no_whatsapp,
            'lokasi' => $lokasi,
            'paket' => $request->paket,
            'kuantiti' => $request->kuantiti,
            'status' => $response->status,
            'biaya_admin' => $biaya_admin,
            'payment_link' => $response->invoice_url,
            'total' => $total + $biaya_admin
        ]);
                return redirect('bayar/proses/'.$external_id);
           
        }
    }

    public function proses($kode_transaksi)
    {
        $item = Transaksi::where('kode_transaksi', $kode_transaksi)->with('hargas')->first();
        $data = Transaksi::where('kode_transaksi', $kode_transaksi)->with('hargas')->get();
        return view('payment.bayar', compact('data','item'));
    }

    public function callback(Request $request){
        $external_id = $request->external_id;
        $status = $request->status;
        // $transaksi = Transaksi::where('kode_transaksi', $external_id)->with('hargas')->get();
        $payment = Transaksi::where('kode_transaksi', $external_id)->exists();
       
        if($payment){
            if ($status == "PAID"){
                Transaksi::where('kode_transaksi', $external_id)->update([
                    'status' => $status,
                    'payment_method' => $request->payment_channel
                ]);

            $transaksi = Transaksi::where('kode_transaksi', $external_id)->first();

            $voucher = Voucher::join('transaksi', 'transaksi.paket', '=', 'voucher.paket')
                    ->join('paket', 'paket.paket','=', 'voucher.paket')
                    ->where('transaksi.lokasi','=', $transaksi->lokasi)
                    ->where('transaksi.paket','=', $transaksi->paket)
                    ->where('voucher.status_voucher','=', 'Available')
                    ->orderby('voucher.id_voucher', 'ASC')
                    ->limit($transaksi->kuantiti)->get();

                            if ($voucher->isEmpty()) {
                                return redirect()->back()->withErrors(['No vouchers found']);
                            }
                
                foreach($voucher as $rows){
                Pesanan::create([
                    'kode_transaksi' => $external_id,
                    'lokasi' => $rows->lokasi,
                    'kode_voucher' => $rows->kode_voucher,
                    'paket' => $rows->paket,
                    'durasi' => $rows->durasi,
                    'harga' => $rows->harga
                ]);

                Voucher::where('kode_voucher', $rows->kode_voucher)
                        ->update([
                            'status_voucher' => 'Expired',
                        ]);
                }
            }else{
                return response()->json([
                    'message' => 'Data Tidak Ada'
                ]);
            }
        }
    }

    public function showvoucher($kode_transaksi){
        $status = Transaksi::where('kode_transaksi', '=', $kode_transaksi)->select('status')->value('status');
            if ($status == "PAID"){
                $data = Pesanan::where('kode_transaksi', $kode_transaksi)->with('hargas')->get();
                $item = Transaksi::where('kode_transaksi', $kode_transaksi)->with('hargas')->first();
                return view('payment.showvoucher', compact('data','item'));
            }else{
                return redirect()->back()->withErrors(['Belum Bayar']);
            }
    }

    public function cekkode(Request $request){
        $payment = Transaksi::where('kode_transaksi', $request->kode_transaksi)->exists();

        if($payment){
                return redirect('bayar/proses/'. $request->kode_transaksi);
            }else{
                return redirect()->back()->withErrors(['Kode Transaksi Tidak Ditemukan']);
            }
    }
}
