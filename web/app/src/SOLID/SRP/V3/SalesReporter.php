<?php

namespace App\Workshop\SOLID\SRP\V3;

use App\Workshop\SOLID\SRP\V2\Repositories\SalesRepository;
use App\Workshop\SOLID\SRP\V3\SalesOutputInterface;

class SalesReporter
{
    public $salesRepository;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function between($startDate, $endDate, SalesOutputInterface $formatter)
    {
        // get sales from DB
        $sales = $this->salesRepository($startDate, $endDate);

        // return formatted results
        return $formatter->output($sales);
    }
}
