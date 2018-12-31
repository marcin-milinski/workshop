<?php

namespace App\Workshop\SOLID\OCP\V_1;

class Checkout
{
    public function begin(Receipt $receipt)
    {
        // It was designed to accept cash only, but
        // what if we want to accept credit card, coupon, PayPal or BitCoin now?
        // obviously we'd have to modify the source code and that would break Open-Closed Principle

        // Solution: Separate extensible behaviour behind an interface and flip the dependencies
        $this->acceptCash($receipt);
    }

    public function acceptCash($receipt)
    {
        // accept the cash
    }
}
