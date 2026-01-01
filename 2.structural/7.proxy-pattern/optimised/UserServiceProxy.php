<?php

class UserServiceProxy implements UserService
{
    private UserApiService $realService;
    private array $cache = [];

    public function __construct()
    {
        $this->realService = new UserApiService();
    }

    public function getUserProfile(int $userId): array
    {
        if (!isset($this->cache[$userId])) {
            echo "Cache miss → using real service\n";
            $this->cache[$userId] = $this->realService->getUserProfile($userId);
        } else {
            echo "Cache hit → returning cached data\n";
        }

        return $this->cache[$userId];
    }
}
