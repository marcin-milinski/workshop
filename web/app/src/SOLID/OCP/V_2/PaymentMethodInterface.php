<?php

namespace App\Workshop\SOLID\OCP\V_2;

interface PaymentMethodInterface
{
    public function acceptPayment($receipt);
}
