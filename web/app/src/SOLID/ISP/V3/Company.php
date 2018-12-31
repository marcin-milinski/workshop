<?php

namespace App\Workshop\SOLID\ISP\V3;

interface WorkableInterface
{
    public function work();
}

interface LunchableInterface
{
    public function haveLunchBreak();
}

class HumanWorker implements WorkableInterface, LunchableInterface
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

class RobotWorker implements WorkableInterface
{
    public function work()
    {
        return 'robot is working';
    }
}

class Company
{
    public function manage(WorkableInterface $worker)
    {
        $worker->work();
        // now, what about below method?
        // using if statement with "instanceof" would break OCP
        // let's see the refactoring in V4
        $worker->haveLunchBreak();
    }
}
