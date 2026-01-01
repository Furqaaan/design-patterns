<?php

class AuthMiddleware extends Middleware
{
    public function handle(array $request)
    {
        if (!$request['authenticated']) {
            return "401 Unauthorized";
        }
        return parent::handle($request);
    }
}
