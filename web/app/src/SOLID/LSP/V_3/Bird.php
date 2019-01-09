<?php

namespace App\Workshop\SOLID\LSP\V_3;

interface BirdInterface
{
    public function getAverageLife(): int;
    public function getSpeed(): int;
}

interface Flyable
{
    public function getFlyingSpeed(): int;
}

interface Swimable
{
    public function getSwimmingSpeed(): int;
}

abstract class Bird implements BirdInterface
{
    protected $lifetime;
    protected $speed;

    abstract public function getAverageLife(): int;
    abstract public function getSpeed(): int;
}

class Hawk extends Bird implements Flyable
{
    protected $lifetime = 20;
    protected $speed = 250;

    public function getAverageLife(): int
    {
        return $this->lifetime;
    }

    public function getFlyingSpeed(): int
    {
        return $this->speed;
    }

    public function getSpeed(): int
    {
        return $this->getFlyingSpeed();
    }
}

class Penguin extends Bird implements Swimable
{
    protected $lifetime = 10;
    protected $speed = 40;

    public function getAverageLife(): int
    {
        return $this->lifetime;
    }

    public function getSwimmingSpeed(): int
    {
        return $this->speed;
    }

    public function getSpeed(): int
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
