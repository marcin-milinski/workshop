<?php

namespace App\Workshop\SOLID\LSP\V_2;

use Exception;

abstract class Bird
{
    protected $lifetime;
    protected $speed;

    abstract public function getAverageLife();
    abstract public function getFlyingSpeed();

    public function canFly()
    {
        return true;
    }
}

class Hawk extends Bird
{
    public function getAverageLife()
    {
        return $this->lifetime;
    }

    public function getFlyingSpeed()
    {
        return $this->speed;
    }
}

class Penguin extends Bird
{
    public function getAverageLife()
    {
        return $this->lifetime;
    }

    public function getFlyingSpeed()
    {
        // This violates Liskov Substitution Principle
        throw new Exception('Penguins do not fly');
    }

    public function getSwimmingSpeed()
    {
        return $this->speed;
    }

    public function canFly()
    {
        return false;
    }
}

class BirdClientBad
{
    public function __construct(Bird $bird)
    {
        // you can imagine there're other birds that do not fly and for example can run
        // and the below implementation would then need to be changed again in the future
        // with eg. elseif ($bird instanceof Chicken) { ... }, many combinations really
        if ($bird instanceof Penguin) {
            $speed = $bird->getSwimmingSpeed();
        } else {
            $speed = $bird->getFlyingSpeed();
        }
    }
}

class BirdClientNotThatBad
{
    public function __construct(Bird $bird)
    {
        // implementing "canFly" method could be a quick fix
        // but it also violates OCP principle, ie. we may need "canRun" for Chicken in the future
        if ($bird->canFly()) {
            $speed = $bird->getFlyingSpeed();
        } else {
            $speed = $bird->getSwimmingSpeed();
        }
    }
}

class BirdClientGood
{
    public function __construct(Bird $bird)
    {
        // check out V_3
    }
}
