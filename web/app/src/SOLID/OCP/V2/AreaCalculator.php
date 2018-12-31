<?php
namespace App\Workshop\SOLID\OCP\V2;

class AreaCalculator
{
    public function calculate($shapes)
    {
        foreach ($shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}
