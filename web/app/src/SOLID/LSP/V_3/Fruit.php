<?php

namespace App\Workshop\SOLID\LSP\V_3;

class Fruit
{
    public function peel(): string
    {
        return 'Peeling a fruit';
    }

    public function chop(): string
    {
        return 'Chopping fruit';
    }
}

class Apple extends Fruit
{
    public function peel(): int
    {
        return 123;
    }
}

class FruitProcessor
{
    public $fruit;

    public function __construct(Fruit $fruit)
    {
        $this->fruit = $fruit;
    }

    public function make()
    {
        return $this->fruit->peel();
    }
}



    // Fatal error: Declaration of ...\Apple::peel(): int
    //                                                        must be compatible with
    //                             ...\Fruit::peel(): string
