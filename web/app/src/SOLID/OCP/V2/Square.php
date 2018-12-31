<?php
namespace App\Workshop\SOLID\OCP\V2;

use App\Workshop\SOLID\OCP\V2\ShapeInterface;

class Square implements ShapeInterface
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}
