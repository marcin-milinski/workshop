<?php
namespace App\Workshop\SOLID\OCP\V2;

use App\Workshop\SOLID\OCP\V2\ShapeInterface;

class Circle implements ShapeInterface
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->radius * $this->radius * pi();
    }
}
