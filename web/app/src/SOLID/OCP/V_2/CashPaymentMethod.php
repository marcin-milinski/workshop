<?php

namespace App\Workshop\SOLID\OCP\V_2

use App\Workshop\SOLID\OCP\V_2\PaymentMethodInterface;

class CashPaymentMethod implements PaymentMethodInterface
{
    public function acceptPayment($receipt)
    {
        // implement cash payment logic
    }
}
