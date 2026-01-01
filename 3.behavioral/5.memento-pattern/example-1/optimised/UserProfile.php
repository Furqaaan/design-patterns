<?php

require_once 'UserProfileMemento.php';

class UserProfile
{
    private string $name;
    private string $email;

    public function set(string $name, string $email): void
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function show(): void
    {
        echo "{$this->name} - {$this->email}\n";
    }

    public function save(): UserProfileMemento
    {
        return new UserProfileMemento($this->name, $this->email);
    }

    public function restore(UserProfileMemento $memento): void
    {
        $this->name = $memento->getName();
        $this->email = $memento->getEmail();
    }
}

