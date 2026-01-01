<?php

class RateLimitMiddleware extends Middleware
{
    public function handle(array $request)
    {
        if ($request['rate_limited']) {
            return "429 Too Many Requests";
        }
        return parent::handle($request);
    }
}
