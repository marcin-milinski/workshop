<?php

include '../app/vendor/autoload.php';

use App\Workshop\SOLID\LSP\V_3\{
    BirdClient, Penguin, Hawk,
    FruitProcessor, Fruit, Apple,
    VegetableProcessor, Vegetable, Pumpkin, Carrot, Peelable, Processable
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

        <h2>Open-Closed Principle</h2>

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
        // -- Bird example

        $hawkSpeed = (new BirdClient(new Hawk))->getSpeed();
        var_dump($hawkSpeed);

        $penguinSpeed = (new BirdClient(new Penguin))->getSpeed();
        var_dump($penguinSpeed);

        // -- Fruit and Veg examples

        // Fruit example - will not work due to mismatch in returned type
        //$fruitProcessing = (new FruitProcessor(new Apple));
        //var_dump($fruitProcessing->make());

        $vegetableProcessing = (new VegetableProcessor(new Vegetable));
        var_dump($vegetableProcessing->make());
        //var_dump((new Vegetable)->cook());

        $carrotProcessing = (new VegetableProcessor(new Carrot));
        var_dump($carrotProcessing->make());
        //var_dump((new Carrot)->cook());

        $pumpkinProcessing = (new VegetableProcessor(new Pumpkin(new Vegetable)));
        var_dump((new Pumpkin(new Vegetable))->peel());
        var_dump($pumpkinProcessing->make());
        //var_dump((new Pumpkin(new Vegetable))->cook());
        ?>

        <h2>Interface Segregation Principle</h2>

        <h2>Dependency Inversion Principle</h2>
    </body>
</html>
