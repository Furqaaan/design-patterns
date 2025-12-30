<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Services\SmsService;
use App\Services\SlackService;
use Exception;

class NotificationController
{
    public function send($request)
    {
        $channel = $request->input('channel');

        if ($channel === 'email') {
            $service = new EmailService();
            $service->send($request);
            return 200;
        } elseif ($channel === 'sms') {
            $service = new SmsService();
            $service->send($request);
            return 200;
        } elseif ($channel === 'slack') {
            $service = new SlackService();
            $service->send($request);
            return 200;
        }

        throw new Exception('Invalid channel');
    }
}
