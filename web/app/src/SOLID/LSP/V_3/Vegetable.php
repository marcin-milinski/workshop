<?php

namespace App\Workshop\SOLID\LSP\V_3;

interface Peelable
{
    public function peel(): string;
}

interface Processable
{
    public function process(): string;
}

class Vegetable implements Peelable, Processable
{
    protected $name = 'vegetable';

    public function peel(): string
    {
        return 'Peeling ' . $this->name;
    }

    public function process(): string
    {
        return $this->peel();
    }

    // this method is not used by VegetableProcessor
    public function cook()
    {
        return 'Cooking ' . $this->name;
    }
}

class Carrot extends Vegetable
{
    protected $name = 'carrot';

    public function peel(): string
    {
        return 'It is not easy, but I am ' . parent::peel();
    }
}

// Note that Pumpkin doesn't inherit from Vegetable super-class
// Instead we extend Pumpkin behaviour through composition by
// injecting Vegetable class as a constructor argument
// That way we can still implement same method "peel", but with different return type
// This can be a workaround for LSP or maybe rather a sign that Pumpkin does not
// really belong to Vegetable family and should not inherit from it...
class Pumpkin implements Processable
{
    public $vegetable;

    public function __construct(Vegetable $vegetable)
    {
        $this->vegetable = $vegetable;
    }

    // note we can now return different type without any problem
    public function peel(): bool
    {
        return false;
    }

    public function process(): string
    {
        return $this->vegetable->process();
    }

    // the drawback is that if we want to fully extend Vegetable behaviour
    // we need to create here dedicated methods to cover each Vegetable class method
    // Traits can minimize this drawback though
    public function cook()
    {
        return $this->vegetable->cook();
    }
}

class VegetableProcessor
{
    public $vegetable;

    public function __construct(Processable $vegetable)
    {
        $this->vegetable = $vegetable;
    }

    public function make()
    {
        return $this->vegetable->process();
    }
}
