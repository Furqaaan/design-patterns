<?php

interface Worker {
    public function showDetails(): void;
}

class Employee implements Worker {
    public function __construct(
        private string $name,
        private string $role
    ) {}

    public function showDetails(): void {
        echo "- {$this->name} ({$this->role})<br>";
    }
}

class Manager implements Worker {
    private string $name;
    private array $team = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function add(Worker $member): void {
        $this->team[] = $member;
    }

    public function showDetails(): void {
        echo "👔 Manager: {$this->name}<br>";
        foreach ($this->team as $member) {
            $member->showDetails();
        }
    }
}

// Build the same structure
$ceo = new Manager("Alice");
$devManager = new Manager("Bob");
$tester = new Employee("Charlie", "Tester");
$developer = new Employee("David", "Developer");

$devManager->add($developer);
$ceo->add($devManager);
$ceo->add($tester);

$ceo->showDetails();
