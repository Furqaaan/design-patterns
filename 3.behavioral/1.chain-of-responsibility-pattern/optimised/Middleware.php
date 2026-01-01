<?php

abstract class Middleware
{
    protected ?Middleware $next = null;

    public function setNext(Middleware $next): Middleware
    {
        $this->next = $next;
        return $next;
    }

    public function handle(array $request)
    {
        if ($this->next) {
            return $this->next->handle($request);
        }
        return "200 OK - Request processed";
    }
}
