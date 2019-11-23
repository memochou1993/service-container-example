<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Order\OrderDetails;

class OrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {
        $order = $orderDetails->all();

        dd($paymentGateway->charge(2500));
    }
}
