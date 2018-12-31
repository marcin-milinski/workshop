<?php
namespace App\Workshop\SOLID\OCP\V1;

use App\Workshop\SOLID\OCP\V1\Square;

class AreaCalculator
{
    // We have added Circle as an additional shape which area we want to be calculated as well
    // Now, below method needs to be changed and this breaks Open-Closed Principle
    public function calculate($squares)
    {
        foreach ($squares as $square) {
            $area[] = $square->width * $square->height;
        }

        return array_sum($area);
    }

    // this is an example of how we could modify the calculate method
    // however this is bad and still breaks OCP, ie. if we add a Triangle class
    // we will have to modify this  method
    public function calculate_adjusted($shapes)
    {
        foreach ($shapes as $shape) {

            if ($shape instanceof Square) {
                $area[] = $shape->width * $shape->height;
            } else {
                $area[] = $shape->radius * $shape->radius * pi();
            }

        }

        return array_sum($area);
    }
}
