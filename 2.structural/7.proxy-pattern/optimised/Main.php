<?php

$service = new UserServiceProxy();

$user1 = $service->getUserProfile(1);
$user2 = $service->getUserProfile(1);
