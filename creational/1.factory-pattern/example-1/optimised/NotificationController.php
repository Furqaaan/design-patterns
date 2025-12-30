<?php

namespace App\Http\Controllers;

class NotificationController
{
    public function send($request)
    {
        $channel = $request->input('channel');
        
        $service = NotificationFactory::create($channel);
        $service->send($request);
    }
}