<?php

namespace App\Workshop\SOLID\LSP\V_1;

use Exception;

abstract class Bird
{
    protected $lifetime;
    protected $speed;

    abstract public function getAverageLife();
    abstract public function getFlyingSpeed();
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
        // There are two solutions to fix this, more in V_2 and V_3
        throw new Exception('Penguins do not fly');
    }
}
