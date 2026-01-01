<?php

$auth = new AuthMiddleware();
$rateLimit = new RateLimitMiddleware();
$validation = new ValidationMiddleware();

$auth->setNext($rateLimit)->setNext($validation);

$request = ['authenticated' => true, 'rate_limited' => false, 'valid' => true];
$auth->handle($request);