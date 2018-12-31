<?php
namespace App\Workshop\SOLID\OCP\V1;

class Circle
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
}
