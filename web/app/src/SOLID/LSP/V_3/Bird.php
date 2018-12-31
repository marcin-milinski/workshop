<?php

namespace App\Workshop\SOLID\LSP\V_3;

interface BirdInterface
{
    public function getAverageLife();
    public function getSpeed();
}

interface Flyable
{
    public function getFlyingSpeed();
}

interface Swimable
{
    public function getSwimmingSpeed();
}

abstract class Bird implements BirdInterface
{
    protected $lifetime;
    protected $speed;

    abstract public function getAverageLife();
    abstract public function getSpeed();
}

class Hawk extends Bird implements Flyable
{
    protected $lifetime = 20;
    protected $speed = 250;

    public function getAverageLife()
    {
        return $this->lifetime;
    }

    public function getFlyingSpeed()
    {
        return $this->speed;
    }

    public function getSpeed()
    {
        return $this->getFlyingSpeed();
    }
}

class Penguin extends Bird implements Swimable
{
    protected $lifetime = 10;
    protected $speed = 40;

    public function getAverageLife()
    {
        return $this->lifetime;
    }

    public function getSwimmingSpeed()
    {
        return $this->speed;
    }

    public function getSpeed()
    {
        return $this->getSwimmingSpeed();
    }
}

class BirdClient
{
    private $speed;

    public function __construct(BirdInterface $bird)
    {
        $this->speed = $bird->getSpeed();
    }

    public function getSpeed()
    {
        return $this->speed;
    }
}
