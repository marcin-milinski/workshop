<?php

namespace App\Workshop\SOLID\DIP\V1;

use MySQLConnection;

class PasswordReminder
{
    private $dbConnection;

    // Btw. this breaks other principles as well, not just DIP
    // But, with regards to DIP and according to its definition,
    // PasswordReminder is high level module
    // and it shouldn't depend on MySQLConnection which is low level module
    // Instead it should depend on abstraction
    // It's all about knowledge - does PasswordReminder need to know about DB connection?

    // Solution: code to an interface
    public function __construct(MySQLConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}
