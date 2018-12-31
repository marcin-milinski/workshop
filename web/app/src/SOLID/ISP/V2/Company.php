<?php

namespace App\Workshop\SOLID\ISP\V2;

interface WorkerInterface
{
    public function work();
    public function haveLunchBreak();
}

class HumanWorker implements WorkerInterface
{
    public function work()
    {
        return 'human is working';
    }

    public function haveLunchBreak()
    {
        return 'human is having a lunch break';
    }
}

class RobotWorker implements WorkerInterface
{
    public function work()
    {
        return 'robot is working';
    }

    // This breaks Interface Segregation Principle as client (btw. LSP too)
    // Client should not be forced to implement an interface they do not use.
    // However, the class must conform to the contract (interface) and implement this method,
    // so how to solve this problem?
    //
    // Solution: get rid of fat interfaces
    public function haveLunchBreak()
    {
        return null;
    }
}

class Company
{
    public function manage(WorkerInterface $worker)
    {
        $worker->work();
        $worker->haveLunchBreak();
    }
}
