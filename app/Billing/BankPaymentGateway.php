<?php

namespace App\Billing;

use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;

    private $discount = 0;

    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    public function setDiscount(int $amount)
    {
        $this->discount = $amount;
    }

    public function charge(int $amount)
    {
        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
        ];
    }
}
