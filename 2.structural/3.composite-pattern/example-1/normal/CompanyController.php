<?php

class Employee {
    public function __construct(public string $name, public string $role) {}
}

class Manager {
    public string $name;
    public array $team = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function add($member) {
        $this->team[] = $member;
    }

    public function showDetails() {
        echo "👔 Manager: {$this->name}<br>";
        foreach ($this->team as $member) {
            // ❌ We must check if this is another Manager or an Employee
            if ($member instanceof Employee) {
                echo "- {$member->name} ({$member->role})<br>";
            } elseif ($member instanceof Manager) {
                $member->showDetails();
            }
        }
    }
}

$ceo = new Manager("Alice");
$devManager = new Manager("Bob");
$tester = new Employee("Charlie", "Tester");
$developer = new Employee("David", "Developer");

$devManager->add($developer);
$ceo->add($devManager);
$ceo->add($tester);

$ceo->showDetails();
