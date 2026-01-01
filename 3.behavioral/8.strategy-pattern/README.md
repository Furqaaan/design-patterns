# Strategy Pattern — Summary & Example

The **Strategy Pattern** enables you to define a group of interchangeable algorithms, encapsulate each, and allow the client to select the desired algorithm at runtime.

**Key Features:**
- Multiple behaviors share the same interface
- Actual behavior is chosen at runtime
- Eliminates large if–else or switch statements
- The context object delegates operations to a strategy

> _"Pick the algorithm; don’t hardcode it into the context."_

---

## 🛒 Real-World Example: E-commerce Payment Methods

Suppose an online checkout needs to support multiple payment options:

- Credit Card
- UPI
- Wallet

The checkout logic stays the same; only the payment process differs.

---

### 🚫 Problem: No Strategy Pattern

All payment logic is inside one class, using if–else.

```php
class CheckoutService {
    public function pay(string $method, int $amount): void {
        if ($method === 'card') {
            echo "Paid $amount using Credit Card\n";
        } elseif ($method === 'upi') {
            echo "Paid $amount using UPI\n";
        } elseif ($method === 'wallet') {
            echo "Paid $amount using Wallet\n";
        } else {
            echo "Invalid payment method\n";
        }
    }
}
```

**Drawbacks:**
- if–else grows with new methods
- Harder to test individual payment logic
- Breaks Open/Closed Principle (must edit for each change)
- Tight coupling: `CheckoutService` knows every payment detail

---

### ✅ Solution: Strategy Pattern

**1. Define the Strategy Interface**

```php
interface PaymentStrategy {
    public function pay(int $amount): void;
}
```

**2. Create Concrete Strategies**

```php
class CreditCardPayment implements PaymentStrategy {
    public function pay(int $amount): void {
        echo "Paid $amount using Credit Card\n";
    }
}

class UpiPayment implements PaymentStrategy {
    public function pay(int $amount): void {
        echo "Paid $amount using UPI\n";
    }
}

class WalletPayment implements PaymentStrategy {
    public function pay(int $amount): void {
        echo "Paid $amount using Wallet\n";
    }
}
```

**3. Context Class (Selects & Uses Strategy)**

```php
class CheckoutService {
    private PaymentStrategy $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $strategy): void {
        $this->paymentStrategy = $strategy;
    }

    public function pay(int $amount): void {
        $this->paymentStrategy->pay($amount);
    }
}
```

**4. Usage — Runtime Switching**

```php
$checkout = new CheckoutService();

$checkout->setPaymentStrategy(new CreditCardPayment());
$checkout->pay(2500);

$checkout->setPaymentStrategy(new UpiPayment());
$checkout->pay(1800);
```

- ✔ Same checkout flow
- ✔ Can swap algorithms at runtime
- ✔ Code is clean, extensible, and testable

---

### 🔁 New Requirement? Add A Strategy!

Suppose you need to support Crypto payments.  
Just add:

```php
class CryptoPayment implements PaymentStrategy {
    public function pay(int $amount): void {
        echo "Paid $amount using Crypto\n";
    }
}
```

**No changes required to `CheckoutService` or existing code.**

---

## 🧠 Why Use Strategy Pattern?

| No Strategy        | With Strategy    |
|--------------------|-----------------|
| if–else logic      | Polymorphism    |
| Hard to extend     | Add strategies  |
| Tight coupling     | Loose coupling  |
| Hard to test       | Easy to mock    |

---

## 🚗 Real-World Analogy

**Google Maps Routing**
- Fastest route
- Shortest route
- Avoid tolls

_Same app — can pick different algorithms per need._

---

## 🧩 Where Is Strategy Pattern Used?

- Payment processing
- Pricing algorithms
- Sorting logic
- Data compression
- Authentication providers

---