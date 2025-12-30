<?php

namespace App\Http\Controllers;

interface NotificationInterface
{
    public function send($request);
}