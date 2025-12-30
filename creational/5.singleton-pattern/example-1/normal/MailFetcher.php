<?php
class MailFetcher
{
    private string $token;

    public function __construct()
    {
        echo "Fetching token from API...\n";
        // Imagine a costly API call to get a token
        $this->token = bin2hex(random_bytes(5));
    }

    public function fetchInbox()
    {
        echo "Fetching inbox with token: {$this->token}\n";
    }
}

// Two separate fetchers
$m1 = new MailFetcher(); // Calls API
$m1->fetchInbox();

$m2 = new MailFetcher(); // Calls API AGAIN
$m2->fetchInbox();
