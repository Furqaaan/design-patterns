# Mediator Pattern

The **Mediator Pattern** centralizes communication between objects, so they don't interact with each other directly. Instead, each object communicates with a mediator, which coordinates all interactions.

**Key Benefits:**
- Objects don’t need to know about each other.
- All communication goes through a single mediator.
- Reduces tight coupling.
- Makes systems easier to modify and extend.

**Analogy:**  
“Instead of everyone talking to everyone, everyone talks to a coordinator.”

---

## Real-World Example: E-commerce Checkout

Suppose a checkout process involves:

- Cart
- Inventory
- Payment
- Notification

Each component needs to react to the others.

---

### 1️⃣ Without Mediator: Tight Coupling (Bad)

Each class directly references all others:

```php
class Cart {
    public function checkout($amount) {
        $inventory = new Inventory();
        $inventory->reserve();

        $payment = new Payment();
        $payment->pay($amount);

        $notification = new Notification();
        $notification->send();
    }
}

class Inventory {
    public function reserve() {
        echo "Inventory reserved\n";
    }
}

class Payment {
    public function pay($amount) {
        echo "Payment of $amount done\n";
    }
}

class Notification {
    public function send() {
        echo "Confirmation email sent\n";
    }
}
```

**Problems:**
- `Cart` knows about every other class.
- Changes (e.g., new payment method, logging) mean modifying multiple places.
- Too many dependencies—a maintenance nightmare.

---

### 2️⃣ Mediator to the Rescue (Concept)

**Instead of:**
- `Cart` → `Inventory`
- `Cart` → `Payment`
- `Cart` → `Notification`

**We want:**
- `Cart` → `Mediator`
- `Mediator` → Other components

Objects become simpler and more focused.

---

### 3️⃣ Mediator Abstraction

Define an interface for communication:

```php
interface CheckoutMediator {
    public function notify(string $event, mixed $data = null): void;
}
```

---

### 4️⃣ Components Talk Only to Mediator

**Cart:**
```php
class Cart {
    private CheckoutMediator $mediator;

    public function __construct(CheckoutMediator $mediator) {
        $this->mediator = $mediator;
    }

    public function checkout(int $amount): void {
        echo "Cart checkout started\n";
        $this->mediator->notify('checkout_started', $amount);
    }
}
```

**Inventory:**
```php
class Inventory {
    public function reserve(): void {
        echo "Inventory reserved\n";
    }
}
```

**Payment:**
```php
class Payment {
    public function pay(int $amount): void {
        echo "Payment of $amount done\n";
    }
}
```

**Notification:**
```php
class Notification {
    public function send(): void {
        echo "Confirmation email sent\n";
    }
}
```

---

### 5️⃣ Concrete Mediator Implementation

```php
class CheckoutFlowMediator implements CheckoutMediator {
    private Inventory $inventory;
    private Payment $payment;
    private Notification $notification;

    public function __construct(
        Inventory $inventory,
        Payment $payment,
        Notification $notification
    ) {
        $this->inventory = $inventory;
        $this->payment = $payment;
        $this->notification = $notification;
    }

    public function notify(string $event, mixed $data = null): void {
        if ($event === 'checkout_started') {
            $this->inventory->reserve();
            $this->payment->pay($data);
            $this->notification->send();
        }
    }
}
```

---

### 6️⃣ Usage: Cleaner and Scalable

```php
$mediator = new CheckoutFlowMediator(
    new Inventory(),
    new Payment(),
    new Notification()
);

$cart = new Cart($mediator);
$cart->checkout(2500);
```

**Advantages:**
- `Cart` doesn’t know about Inventory, Payment, or Notification classes.
- Checkout flow centralized in one place.
- Easy to change or extend behavior.

---

### 🔄 Changing Requirements Is Easy

**Example:**  
Add a `FraudCheck` step or analytics tracking.

Only the mediator changes—not the `Cart` or individual components.

```php
class FraudCheck {
    public function verify(): void {
        echo "Fraud check passed\n";
    }
}
```

Just add the logic inside the mediator’s `notify` method.

---

## Why Use Mediator?

| Without Mediator      | With Mediator         |
|---------------------- |----------------------|
| Tight coupling        | Loose coupling       |
| Hard to modify        | Easy to extend       |
| Logic scattered       | Logic centralized    |
| Fragile system        | Stable system        |

---

### Real-life Analogy

- **Without mediator:** Everybody in an office talks to everybody—chaos!
- **With mediator:** Everybody communicates through a manager/HR. Rules change? The manager updates and everyone adapts.

---

### Where You’ll See Mediator Pattern

- GUI frameworks (buttons/dialogs/forms)
- Checkout or order workflows
- Event-driven architectures
- Chat rooms/bots
- Distributed orchestration (e.g., Saga pattern)
- Microservices coordination

---

### 📋 Interview One-Liner

> The Mediator Pattern reduces coupling by centralizing communication between related objects.
