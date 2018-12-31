<?php

namespace App\Workshop\SOLID\SRP\V2;

use App\Workshop\SOLID\SRP\V2\Repositories\SalesRepository;

class SalesReporter
{
    public $salesRepository;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function between($startDate, $endDate)
    {
        // get sales from DB
        $sales = $this->salesRepository($startDate, $endDate);

        // return formatted results
        return $this->format($sales);
    }

    private function format($sales)
    {
        return '<p>Sales: ' . $sales . '</p>';
    }
}
