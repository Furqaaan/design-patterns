<?php

namespace App\Http\Controllers;

use Exception;

class NotificationFactory
{
    public static function create($channel)
    {
        switch ($channel) {
            case 'email':
                return new EmailNotification();
            case 'sms':
                return new SmsNotification();
            case 'slack':
                return new SlackNotification();
            default:
                throw new Exception('Invalid channel');
        }
    }
}