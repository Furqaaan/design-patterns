# State Pattern

The **State Pattern** allows an object to change its behavior when its internal state changes—removing the need for complex if–else or switch logic. Instead, each state is encapsulated as a separate class, with the context object delegating behavior to its current state.

---

**Key Concepts:**

- **Behavior varies by state:** The object's behavior depends on its current state.
- **Encapsulation:** Logic for each state is stored in its own class.
- **Delegation:** The context object forwards actions to its current state object.
- **Extensibility:** Adding new states is easy and doesn't impact existing code.

> **In summary:**  
> _“Same object, but it acts differently based on its state.”_

---

## Example Use Case: Order Lifecycle in E-Commerce

An Order can be:

- Pending
- Paid
- Shipped
- Cancelled

Each action (pay, ship, cancel) behaves differently depending on the state.

---

### 1️⃣ Without State Pattern (Problematic, Large if–else)

```php
<?php

class Order {
    private string $state = 'pending';

    public function pay(): void {
        if ($this->state === 'pending') {
            echo "Payment successful\n";
            $this->state = 'paid';
        } else {
            echo "Payment not allowed\n";
        }
    }

    public function ship(): void {
        if ($this->state === 'paid') {
            echo "Order shipped\n";
            $this->state = 'shipped';
        } else {
            echo "Shipping not allowed\n";
        }
    }

    public function cancel(): void {
        if ($this->state === 'pending') {
            echo "Order cancelled\n";
            $this->state = 'cancelled';
        } else {
            echo "Cancel not allowed\n";
        }
    }
}
```

**Why is this bad?**

- Lots of if–else
- Hard to add new states
- Difficult to read and maintain
- Breaks Open/Closed Principle

---

### 2️⃣ State Pattern Approach (Solution)

#### Instead of:
```php
if ($state == X) {
   // do A
}
```
#### We do:
```php
$currentState->doAction();
```
Each state class controls its own logic.

---

### 3️⃣ Define State Interface (Contract)

```php
<?php

interface OrderState {
    public function pay(OrderContext $order): void;
    public function ship(OrderContext $order): void;
    public function cancel(OrderContext $order): void;
}
```

---

### 4️⃣ Concrete State Classes

**Pending State**
```php
class PendingState implements OrderState {
    public function pay(OrderContext $order): void {
        echo "Payment successful\n";
        $order->setState(new PaidState());
    }
    public function ship(OrderContext $order): void {
        echo "Cannot ship unpaid order\n";
    }
    public function cancel(OrderContext $order): void {
        echo "Order cancelled\n";
        $order->setState(new CancelledState());
    }
}
```

**Paid State**
```php
class PaidState implements OrderState {
    public function pay(OrderContext $order): void {
        echo "Already paid\n";
    }
    public function ship(OrderContext $order): void {
        echo "Order shipped\n";
        $order->setState(new ShippedState());
    }
    public function cancel(OrderContext $order): void {
        echo "Cannot cancel after payment\n";
    }
}
```

**Shipped State**
```php
class ShippedState implements OrderState {
    public function pay(OrderContext $order): void {
        echo "Already paid\n";
    }
    public function ship(OrderContext $order): void {
        echo "Already shipped\n";
    }
    public function cancel(OrderContext $order): void {
        echo "Cannot cancel shipped order\n";
    }
}
```

**Cancelled State**
```php
class CancelledState implements OrderState {
    public function pay(OrderContext $order): void {
        echo "Order cancelled\n";
    }
    public function ship(OrderContext $order): void {
        echo "Order cancelled\n";
    }
    public function cancel(OrderContext $order): void {
        echo "Already cancelled\n";
    }
}
```

---

### 5️⃣ Context Class

```php
<?php

class OrderContext {
    private OrderState $state;

    public function __construct() {
        $this->state = new PendingState();
    }

    public function setState(OrderState $state): void {
        $this->state = $state;
    }

    public function pay(): void {
        $this->state->pay($this);
    }

    public function ship(): void {
        $this->state->ship($this);
    }

    public function cancel(): void {
        $this->state->cancel($this);
    }
}
```

---

### 6️⃣ Usage

```php
$order = new OrderContext();

$order->pay();    // Payment successful
$order->ship();   // Order shipped
$order->cancel(); // Cannot cancel shipped order
```

---

## Benefits of State Pattern

| Without State Pattern | With State Pattern        |
|----------------------|--------------------------|
| if–else hell         | Clean delegation         |
| Hard to extend       | Easy to add states       |
| Low readability      | High readability         |
| Fragile logic        | Stable & testable design |

---

## Real-Life Analogy

**Traffic Light**

- Red → Stop
- Yellow → Slow
- Green → Go

Same object, different behavior—State handles it cleanly.

---

## Where is State Pattern used?

- Order lifecycles
- Payment flows
- Workflow engines
- Game states
- UI state machines
