<?php

class RequestHandler
{
    public function handle(array $request)
    {
        if (!$this->isAuthenticated($request)) {
            return "401 Unauthorized";
        }

        if ($this->isRateLimited($request)) {
            return "429 Too Many Requests";
        }

        if (!$this->isValid($request)) {
            return "400 Bad Request";
        }

        return "200 OK - Request processed";
    }

    private function isAuthenticated($req)
    {
        return true;
    }
    private function isRateLimited($req)
    {
        return false;
    }
    private function isValid($req)
    {
        return true;
    }
}
