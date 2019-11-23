<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            switch (request()->payMethod) {
                case 'bank':
                    return new BankPaymentGateway('NTD');

                default:
                    return new CreditPaymentGateway('NTD');
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
