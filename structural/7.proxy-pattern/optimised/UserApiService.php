<?php


class UserApiService implements UserService
{
    public function getUserProfile(int $userId): array
    {
        sleep(2);
        echo "Calling external API...\n";

        return [
            'id' => $userId,
            'name' => 'Furkan',
            'email' => 'furkan@example.com'
        ];
    }
}
