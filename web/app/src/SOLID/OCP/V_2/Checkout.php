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

// "Extension" keyword (in "... Open for extension ...") is much broader in this context and allows class
// extension through composition as well, not just inheritance. Or simply you can just add a new piece of
// code to the existing class or method, just make sure it will conform to OCP and will not need to be
// changed later.



// Example:







// so below example is not necessary at all to conform to OCP
class CheckoutAllPayments extends Checkout
{
    public function __construct(Receipt $receipt, PaymentMethodInterface $payment)
    {
        $payment->acceptPayment($receipt);
    }
}
