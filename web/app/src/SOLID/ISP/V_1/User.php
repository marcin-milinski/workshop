<?php

namespace App\Workshop\SOLID\ISP\V_1

interface UserInterface
{
    // some functions here
}

interface RemindableInterface
{
    public function getReminderEmail();
}

// a side note: this is Laravel (a popular PHP framework) example
// each User class by default extends Eloquent (a DB layer, ActiveRecord/ORM class)
// that provides DB layer API, ie. $user->save();
class User extends Eloquent implements UserInterface, RemindableInterface
{
    protected $table = 'users';

    public function getReminderEmail()
    {
        return $this->email;
    }
}
