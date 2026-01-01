<?php

namespace App\Http\Controllers;

class EmailNotification implements NotificationInterface
{
    public function send($request)
    {
        return 200;
    }
}