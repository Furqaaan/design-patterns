<?php

class UserApiService {
    public function getUserProfile(int $userId): array {
        sleep(2);
        echo "Calling external API...\n";

        return [
            'id' => $userId,
            'name' => 'Furqan',
            'email' => 'furqan@example.com'
        ];
    }
}

$service = new UserApiService();

// Even if called multiple times → API hit every time
$user1 = $service->getUserProfile(1);
$user2 = $service->getUserProfile(1);