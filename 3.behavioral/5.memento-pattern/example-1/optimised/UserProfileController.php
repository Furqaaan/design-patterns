<?php

require_once 'UserProfile.php';
require_once 'UserProfileMemento.php';
require_once 'ProfileHistory.php';

$profile = new UserProfile();
$history = new ProfileHistory();

$profile->set("Furkan", "old@mail.com");
$history->push($profile->save());

$profile->set("Furkan Khan", "new@mail.com");
echo "After edit: ";
$profile->show(); // Furkan Khan - new@mail.com

// User clicks Undo
$profile->restore($history->pop());
echo "After undo: ";
$profile->show(); // Furkan - old@mail.com

