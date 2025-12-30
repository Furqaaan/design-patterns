<?php

namespace App\Http\Controllers;

class SmsNotification implements NotificationInterface
{
    public function send($request)
    {
        return 200;
    }
}