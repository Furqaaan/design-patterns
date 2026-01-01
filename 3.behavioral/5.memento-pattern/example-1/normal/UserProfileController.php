<?php

class UserProfile
{
    public string $name;
    public string $email;
}

$profile = new UserProfile();
$profile->name = "Furkan";
$profile->email = "old@mail.com";

// Save "old" manually outside
$oldName = $profile->name;
$oldEmail = $profile->email;

// User edits
$profile->name = "New Name";
$profile->email = "new@mail.com";

echo "After edit: {$profile->name} - {$profile->email}\n";

// Undo: restore manually
$profile->name = $oldName;
$profile->email = $oldEmail;

echo "After undo: {$profile->name} - {$profile->email}\n";

