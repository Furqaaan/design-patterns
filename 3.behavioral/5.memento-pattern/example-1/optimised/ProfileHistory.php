<?php

require_once 'UserProfileMemento.php';

class ProfileHistory
{
    private array $history = [];

    public function push(UserProfileMemento $memento): void
    {
        $this->history[] = $memento;
    }

    public function pop(): ?UserProfileMemento
    {
        return array_pop($this->history);
    }
}

