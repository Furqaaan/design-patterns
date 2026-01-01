<?php
class MailFetcher
{
    private static ?MailFetcher $instance = null;
    private string $token;

    private function __construct()
    {
        echo "Fetching token from API...\n";
        $this->token = bin2hex(random_bytes(5)); // pretend from API
    }

    public static function getInstance(): MailFetcher
    {
        if (self::$instance === null) {
            self::$instance = new MailFetcher();
        }
        return self::$instance;
    }

    public function fetchInbox()
    {
        echo "Fetching inbox with token: {$this->token}\n";
    }
}

// Usage
$m1 = MailFetcher::getInstance();
$m1->fetchInbox();

$m2 = MailFetcher::getInstance();
$m2->fetchInbox();
