<?php

include '../app/vendor/autoload.php';

use App\Workshop\SOLID\LSP\V_3\{
    BirdClient,
    Penguin,
    Hawk
};

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SOLID Principles with PHP examples</title>
    </head>
    <body>
        <h1>SOLID Principles with PHP examples</h1>

        <h2>Single Responsibility Principle</h2>

        <?php
        /*
        $report = SalesReporter(new SalesRepository);
        $start = Carbon::now()->subDays(10);
        $end = Carbon::now();

        $output = $report->between($start, $end, new HtmlOutput());
        */
        ?>

        <h2>Open-CLosed Principle</h2>

        <?php
        /*
        switch ($_REQUEST['payment_method']) {
            case 'bitcoin':
                $paymentMethod = new BitcoinPaymentMethod;
            default:
            case 'cash':
                $paymentMethod = new CashPaymentMethod;
        }
        $payment = (new Checkout)->begin(new Receipt, $paymentMethod);
        */
        ?>

        <h2>Liskov Substitution Principle</h2>

        <?php
        $speed = (new BirdClient(new Hawk))->getSpeed();
        var_dump($speed);
        ?>

        <h2>Interface Segregation Principle</h2>

        <h2>Dependency Inversion Principle</h2>
    </body>
</html>
