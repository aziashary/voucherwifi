<?php

namespace App\Http\Controllers;

use app\Integration\XenditPayment;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Xendit\Xendit;

class PaymentController extends Controller
{
    // private $payment;

    // public function __construct()
    // {
    //     $this->payment = new XenditPayment();
    // }

    // public function payment(request $request)
    // {
    //     $order_id = 'payment-'.time();
    //     $price = $request->price;

    //     Payment::create([
    //         'invoice_id' => $order_id,
    //         'name' => $request->name_pay,
    //         'method' => $request->method,
    //         'price' => $request->price
    //     ]);

    //     return $this->payment->createPayment($request, $price, $order_id);

    // } 

    private $token = 'xnd_development_oBxN5sgA4rncDfoilFoVKeopW9K7f6pdtmgIkb4pZdzLrJaZZgUwfT0ZqeCwJw';

    // VIRTUAL ACCOUNT
    public function createVa(request $request){
        Xendit::setApiKey($this->token);
        $external_id = 'va-'.time();

        $params =
        [
            "external_id" => $external_id,
            "bank_code" => $request->bank,
            "name" => $request->email,
            "expected_amount" => $request->price,
            "is_closed" => true,
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
            "is_single_use" => true
        ];
        $insert = Payment::create([
            "external_id" => $external_id,
            "payment_channel" => "Virtual Account",
            "email" => $request->email,
            "price" => $request->price
        ]);

        $createVa = \Xendit\VirtualAccounts::create($params);
        return response()->json([
            'data' => $createVa
        ])->setStatusCode(200);
    }

    public function callbackVa(Request $request){
        $external_id = $request->external_id;
        $status = $request->status;
        $payment = Payment::where('external_id', $external_id)->exists();
        if($payment){
            if ($status == "ACTIVE"){
                $update = Payment::where('external_id', $external_id)->update([
                    'status' => 1
                ]);
                if ($update > 0){
                    return 'ok';
                }
                return 'false';
            }else{
                return response()->json([
                    'message' => 'Data Tidak Ada'
                ]);
            }
        }
    }

    // QR CODE
    public function createQR(request $request){
        Xendit::setApiKey($this->token);
        $external_id = 'va-'.time();

        $params =
        [
            "external_id" => $external_id,
            "type" => 'STATIC',
            "name" => $request->email,
            "amount" => $request->price,
            'callback_url' => 'https://7488-110-137-192-70.ap.ngrok.io/api/callbackQR',
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
           
        ];
        $insert = Payment::create([
            "external_id" => $external_id,
            "payment_channel" => "QR CODE",
            "email" => $request->email,
            "price" => $request->price
        ]);

        $createQa = \Xendit\QRCode::create($params);
        return response()->json([
            'data' => $createQa
        ])->setStatusCode(200);
    }

    public function callbackQR(Request $request){
        $external_id = $request->external_id;
        $status = $request->status;
        $payment = Payment::where('external_id', $external_id)->exists();
        if($payment){
            if ($status == "SUCCEEDED"){
                $update = Payment::where('external_id', $external_id)->update([
                    'status' => 1
                ]);
                if ($update > 0){
                    return 'ok';
                }
                return 'false';
            }else{
                return response()->json([
                    'message' => 'Data Tidak Ada'
                ]);
            }
        }
    }

    // E-WALLET
    public function createWallet(request $request){
        Xendit::setApiKey($this->token);
        $external_id = 'va-'.time();

        $params =
        [
            'reference_id' => $external_id,
            'currency' => 'IDR',
            'amount' => 50000,
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_SHOPEEPAY',
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
            'channel_properties' => [
                'success_redirect_url' => 'https://7488-110-137-192-70.ap.ngrok.io/api/callbackWallet',
            ],
            'metadata' => [
            'meta' => 'data'
        ]
           
        ];
        $insert = Payment::create([
            "external_id" => $external_id,
            "payment_channel" => "e-Wallet",
            "email" => 'tes',
            "price" => 50000
        ]);

        $createWallet = \Xendit\EWallets::createEWalletCharge($params);
        return response()->json([
            'data' => $createWallet
        ])->setStatusCode(200);
    }

    public function callbackWallet(Request $request){
        $external_id = $request->reference_id;
        $status = $request->status;
        $payment = Payment::where('external_id', $external_id)->exists();
        if($payment){
            if ($status == "ACTIVE"){
                $update = Payment::where('external_id', $external_id)->update([
                    'status' => 1
                ]);
                if ($update > 0){
                    return 'ok';
                }
                return 'false';
            }else{
                return response()->json([
                    'message' => 'Data Tidak Ada'
                ]);
            }
        }
    }
}
