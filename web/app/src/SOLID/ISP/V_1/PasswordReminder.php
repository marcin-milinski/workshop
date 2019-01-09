<?php

namespace App\Workshop\SOLID\ISP\V_1;

use App\Workshop\SOLID\ISP\V_1\RemindableInterface;

class PasswordReminder
{
    public function sendReminder(RemindableInterface $user)
    {
        $this->sendTo($user->getReminderEmail());
    }
}











// This PasswordReminder class doesn't need to have a knowledge about
// full User object or even Eloquent class which User depends on
// and that's the reason we use RemindableInterface instead as it provides
// the only method (getReminderEmail) that PasswordReminder is interested in
