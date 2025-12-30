<?php

namespace App\Http\Controllers;

class SlackNotification implements NotificationInterface
{
    public function send($request)
    {
        return 200;
    }
}