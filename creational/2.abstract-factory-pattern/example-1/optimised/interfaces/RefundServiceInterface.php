<?php

namespace App\Http\Interfaces;

interface RefundServiceInterface
{
    public function refund($amount);
}