<?php

class ValidationMiddleware extends Middleware
{
    public function handle(array $request)
    {
        if (!$request['valid']) {
            return "400 Bad Request";
        }
        return parent::handle($request);
    }
}
