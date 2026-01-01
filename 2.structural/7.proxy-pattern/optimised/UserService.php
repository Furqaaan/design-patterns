<?php

interface UserService
{
    public function getUserProfile(int $userId): array;
}
