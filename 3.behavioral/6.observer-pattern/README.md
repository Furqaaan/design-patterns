# 🧠 Observer Pattern

The **Observer Pattern** creates a **one-to-many** dependency, so when one object (the “subject”) changes, all its dependents (the “observers”) are automatically notified and updated. This helps you build loosely-coupled systems where objects can react to changes elsewhere, without directly linking to each other.

- **Subject:** the object being watched (the “thing that changes”)
- **Observers:** objects that subscribe for changes (the “interested parties”)
- The subject **notifies** all observers whenever its state changes.
- The subject **does not need to know** the details of its observers.

**Summary:**  
👉 “If something important happens, tell everyone who wants to know.”

---

## 🌐 Example Use Case: Order Processing

When an order is placed in a system, you may want to:
- Send email confirmation
- Update analytics
- Notify the warehouse
- Trigger a webhook

All these actions **should react to the event automatically, not be hardcoded**.

---

### 1️⃣ Tight Coupling (WITHOUT Observer Pattern)

Suppose `OrderService` calls all the reactions directly:

```php
class OrderService {
    public function placeOrder(): void {
        echo "Order placed\n";
        (new EmailService())->send();
        (new AnalyticsService())->track();
        (new WarehouseService())->reserveStock();
    }
}
```

**Problems:**
- `OrderService` knows too much about every possible reaction.
- To add new behavior, you must modify `OrderService` (violates Open/Closed Principle).
- Harder to test, extend, and maintain.

---

### 2️⃣ Decoupling with Observer Pattern

**Goal:**
- `OrderService` is only responsible for placing orders.
- Anyone interested can “subscribe” to order events.
- Adding/removing reactions does **not** require touching `OrderService`.

---

### 3️⃣ Observer Contracts

Define interfaces for the pattern:

```php
interface Observer {
    public function update(string $event, mixed $data): void;
}

interface Subject {
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(string $event, mixed $data): void;
}
```

---

### 4️⃣ Implementing the Subject (`OrderService`)

```php
class OrderService implements Subject {
    private array $observers = [];

    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void {
        $this->observers = array_filter(
            $this->observers,
            fn($o) => $o !== $observer
        );
    }

    public function notify(string $event, mixed $data): void {
        foreach ($this->observers as $observer) {
            $observer->update($event, $data);
        }
    }

    public function placeOrder(int $orderId): void {
        echo "Order $orderId placed\n";
        $this->notify('order_placed', $orderId);
    }
}
```

---

### 5️⃣ Observer Implementations

**Email:**
```php
class EmailObserver implements Observer {
    public function update(string $event, mixed $data): void {
        if ($event === 'order_placed') {
            echo "Email sent for order $data\n";
        }
    }
}
```
**Analytics:**
```php
class AnalyticsObserver implements Observer {
    public function update(string $event, mixed $data): void {
        if ($event === 'order_placed') {
            echo "Analytics tracked for order $data\n";
        }
    }
}
```
**Warehouse:**
```php
class WarehouseObserver implements Observer {
    public function update(string $event, mixed $data): void {
        if ($event === 'order_placed') {
            echo "Stock reserved for order $data\n";
        }
    }
}
```

---

### 6️⃣ Usage Example

```php
$orderService = new OrderService();
$orderService->attach(new EmailObserver());
$orderService->attach(new AnalyticsObserver());
$orderService->attach(new WarehouseObserver());

$orderService->placeOrder(101);
```

- ✔ `OrderService` code never changes when you add or remove actions.
- ✔ New observers “plug in” easily.
- ✔ Maximum loose coupling.

---

### 🔁 Adding New Functionality

Suppose you want to **send a Slack notification** when an order is placed. Just create and attach a new observer:

```php
class SlackObserver implements Observer {
    public function update(string $event, mixed $data): void {
        echo "Slack notified for order $data\n";
    }
}
```
No changes required in `OrderService`. 🚀

---

## 🧠 Power of the Observer Pattern

| Without Observer        | With Observer         |
|------------------------|----------------------|
| Tight coupling         | Loose coupling       |
| Fragile, rigid         | Easy to extend       |
| Logic centralized      | Logic distributed    |
| Hard to test/modify    | Scalable, flexible   |

---

## 🚗 Real-Life Analogy

- YouTube channel = Subject
- Subscribers = Observers
- When a video is uploaded, **all subscribers get notified**.
- The channel does not have to know who each subscriber is.

---

## 🧩 Where Is Observer Used in Real Life?

- Event systems
- UI frameworks (React, Vue, Angular)
- Webhooks
- Notifications
- Logging & metrics
- Laravel events/listeners
- Java Spring events

---

## 🎯 Interview Soundbite

> **Observer Pattern** lets objects automatically get notified when another object’s state changes—without tight coupling.

---

## 🔑 Mental Models (Pattern Connections)

- **Observer:** React to changes
- **Mediator:** Coordinate communication
- **Command:** Package actions as objects
- **Memento:** Save and restore state
