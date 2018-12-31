<?php

namespace App\Workshop\SOLID\ISP\V1;

class Worker
{
    public function work()
    {
        return 'worker is working';
    }

    public function haveLunchBreak()
    {
        return 'worker is having a lunch break';
    }
}

class Company
{
    public function manage(Worker $worker)
    {
        $worker->work();
        $worker->haveLunchBreak();
    }
}

// Now, what if the company wants to hire and manage robots?
// Well, robots do not need a lunch break, so instead of relying on a concrete class
// we should rather code to an interface, let's have a look at V2
