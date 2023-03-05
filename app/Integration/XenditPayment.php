<?php

namespace App\Integration;

use App\Models\Payment;
use Carbon\Carbon;
use Xendit\Xendit;

class XenditPayment
{
    protected $secretXendit;
    protected $eWallets;

    public function __construct()
    {
        $this->secret_Xendit = 'xnd_development_dZZ6FkT5CQpaQwzU4IX7usMBegyR64QoxO7AqhlorX8Gh4npkwOWha23C16lUF';
        $this->eWallets = array('GOPAY','OVO','DANA','Link-Aja');
        Xendit::setApiKey($this->secret_xendit);
    }

    public function createPayment($body, $price, $order_id)
    {
        return $this->virtualAccount($body, $price, $order_id);
    }

    private function virtualAccount($body, $price, $order_id)
    {
        $params =
        ["external_id" => $order_id,
        "bank_code" => $body->method,
        "name" => $body->name_pay,
        "is_closed" => true,
        "expected_amount" => (string)$price,
        "experation_date" => Carbon::now()->addDay(1)->toISOString()
    ];

    $createVA = \Xendit\VirtualAccounts::create($params);
    Payment::where('invoice_id', $order_id)->update([
        'account_number' => $createVA['account_number']
    ]);

    return response()->json(['data' => $createVA]);
    }
}
