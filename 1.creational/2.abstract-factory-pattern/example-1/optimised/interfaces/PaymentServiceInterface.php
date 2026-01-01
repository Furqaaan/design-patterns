<?php

namespace App\Http\Interfaces;

interface PaymentServiceInterface
{
    public function pay($amount);
}