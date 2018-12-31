<?php

namespace App\Workshop\SOLID\SRP\V1;

// This class violates SRP a couple of times
class SalesReporter
{
    public function between($startDate, $endDate)
    {
        // get sales from DB
        $sales = $this->queryDbForSalesBetween($startDate, $endDate);

        // return formatted results
        return $this->format($sales);
    }

    // Querying the DB in here makes SalesReporter to have too many resons to change in the future
    // eg. when we change DB to another service
    // It is not this class responsibility to understand what this class persistance layer is
    // or how to fetch the data

    // Solution: Move it to repository class
    private function queryDbForSalesBetween($startDate, $endDate)
    {
        return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge');
    }

    // Why should be this class responsibility to output or format the results?
    // If we want to format the output to eg. H1 or JSON, we again will have to change this class

    // Solution 1: Leave it to consumer to format the results
    // SOlution 2: Code to an interface
    private function format($sales)
    {
        return '<p>Sales: ' . $sales . '</p>';
    }
}
