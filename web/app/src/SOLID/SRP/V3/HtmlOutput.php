<?php

namespace App\Workshop\SOLID\SRP\V3;

use App\Workshop\SOLID\SRP\V3\SalesOutputInterface;

class HtmlOutput implements SalesOutputInterface
{
    public function output($sales)
    {
        return '<p>Sales: ' . $sales . '</p>';
    }

}
