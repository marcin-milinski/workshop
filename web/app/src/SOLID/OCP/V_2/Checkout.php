<?php

namespace App\Workshop\SOLID\OCP\V_2;

use App\Workshop\SOLID\OCP\V_2\PaymentMethodInterface;

class Checkout
{
    public function begin(Receipt $receipt, PaymentMethodInterface $payment)
    {
        // btw. this is also what is called "Polymorphism" - one of OO programming principle
        // which is ability to have different behaviour while still sharing a common interface
        $payment->acceptPayment($receipt);
    }
}
