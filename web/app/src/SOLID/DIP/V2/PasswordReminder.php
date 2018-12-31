<?php

namespace App\Workshop\SOLID\DIP\V2;

interface ConnectionInterface
{
    public function connect();
}

// what we've achieved here is "Low level modules should depend on abstraction"
class DBConnection implements ConnectionInterface
{
    public function connect()
    {
        // implement connection
    }
}

class PasswordReminder
{
    private $dbConnection;

    // what we've achieved here is "High level modules should depend on abstraction"
    public function __construct(ConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}
