<?php

namespace App\Workshop\SOLID\ISP\V4;

interface ManagableInterface
{
    public function beManaged();
}

interface WorkableInterface
{
    public function work();
}

interface LunchableInterface
{
    public function haveLunchBreak();
}

class HumanWorker implements WorkableInterface, LunchableInterface, ManagableInterface
{
    public function work()
    {
        return 'human is working';
    }

    public function haveLunchBreak()
    {
        return 'human is having a lunch break';
    }

    public function beManaged()
    {
        $this->work();
        $this->haveLunchBreak();
    }
}

class RobotWorker implements WorkableInterface, ManagableInterface
{
    public function work()
    {
        return 'robot is working';
    }

    public function beManaged()
    {
        $this->work();
    }
}

class Company
{
    public function manage(ManagableInterface $worker)
    {
        $worker->beManaged();
    }
}
