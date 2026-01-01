# Memento Pattern

The **Memento Pattern** captures and restores an object’s previous state *without* exposing its internal structure.

---

### **When to use**

- Undo / rollback / restore features
- Need to save state without breaking encapsulation

---

### **How it works**

- The object itself (“Originator”) decides **what** to save as a snapshot.
- A separate object (“Caretaker”) just **stores** these snapshots.
- Snapshots (“Mementos”) *don’t expose* internals, only the Originator can interpret them.

> **In short:**  
> 🖼️ “Let me save a snapshot now, and possibly revert to it later.”

---

## Real-world Example: Web Form Undo

**Use case:**  
On a settings/edit page, user changes fields and clicks “Undo” or cancels.

Very typical for user editors, dashboards, CMS, etc.

---

### 🚫 **WITHOUT Memento: Everything is public, undo is hacky**

```php
class UserProfile {
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

// Undo: restore manually
$profile->name = $oldName;
$profile->email = $oldEmail;
```

**Problems:**
- Outside code sees & touches all fields (breaks encapsulation)
- Adding new fields → must update undo code everywhere
- Fragile, error-prone

---

### ✅ **WITH Memento: Safe, encapsulated undo**

**Step 1 – Memento: State Snapshot**

```php
class UserProfileMemento {
    public function __construct(
        private string $name,
        private string $email,
    ) {}
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
}
```

---

**Step 2 – Originator: The Main Object**

```php
class UserProfile {
    private string $name;
    private string $email;

    public function set(string $name, string $email): void {
        $this->name = $name;
        $this->email = $email;
    }

    public function show(): void {
        echo "{$this->name} - {$this->email}\n";
    }

    public function save(): UserProfileMemento {
        return new UserProfileMemento($this->name, $this->email);
    }

    public function restore(UserProfileMemento $memento): void {
        $this->name = $memento->getName();
        $this->email = $memento->getEmail();
    }
}
```

---

**Step 3 – Caretaker: Stores the Snapshots**

```php
class ProfileHistory {
    private array $history = [];
    public function push(UserProfileMemento $memento): void {
        $this->history[] = $memento;
    }
    public function pop(): ?UserProfileMemento {
        return array_pop($this->history);
    }
}
```

---

**Step 4 – Usage (Undo Example):**

```php
$profile = new UserProfile();
$history = new ProfileHistory();

$profile->set("Furkan", "old@mail.com");
$history->push($profile->save());

$profile->set("Furkan Khan", "new@mail.com");
$profile->show(); // Furkan Khan - new@mail.com

// User clicks Undo
$profile->restore($history->pop());
$profile->show(); // Furkan - old@mail.com
```

---

### **Benefits**

- ✅ Clean
- ✅ Encapsulated (Undo/restore code never touches internals directly)
- ✅ Easy to add more fields (add them to Originator & Memento, done!)

---

### 🔄 What if fields change?
- Add `phone`, `avatar`, etc?  
  **Only `UserProfile` and `UserProfileMemento` change.**
- Undo logic/code doesn’t care, so it’s stable.

---

## 🧠 Why Memento?

| Without Memento   | With Memento            |
|-------------------|------------------------|
| Exposes internals | Preserves encapsulation |
| Fragile undo      | Stable snapshots        |
| Hard to extend    | Easy to add fields      |
| Bug-prone         | Safe, reliable restore  |

---

## 🚗 **Common Real-life Analogies**

- CTRL+Z (Undo) in editors
- Draft autosave/restore
- “Cancel” changes form button
- Game save-points / checkpoints
- Transaction rollback

---

## 🧩 **Where used in production**

- Profile & settings editors
- CMS content editing
- IDEs (undo, revert)
- Graphic design tools
- Complex workflows / rollback
- Stateful business operations

