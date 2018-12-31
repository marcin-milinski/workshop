<?php

namespace App\Workshop\SOLID\OCP\V_2

use App\Workshop\SOLID\OCP\V_2\PaymentMethodInterface;

class BitcoinPaymentMethod implements PaymentMethodInterface
{
    public function acceptPayment($receipt)
    {
        // implement Bitcoin payment logic
    }
}
