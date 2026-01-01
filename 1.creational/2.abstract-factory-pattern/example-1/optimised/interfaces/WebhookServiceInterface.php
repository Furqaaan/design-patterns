<?php

namespace App\Http\Interfaces;

interface WebhookServiceInterface
{
    public function handle($amount);
}