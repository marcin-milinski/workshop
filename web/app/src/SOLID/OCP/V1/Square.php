<?php
namespace App\Workshop\SOLID\OCP\V1;

class Square
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}
