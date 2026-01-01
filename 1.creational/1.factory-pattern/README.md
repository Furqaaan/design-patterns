# Factory Pattern

The **Factory Pattern** is a creational design pattern that:

- **Provides a central place (factory) to create objects.**
- **Hides the instantiation logic from the client (controller).**
- **Lets you add new types without modifying client code.**

---

### 👉 In Simple Words

Instead of writing `new Something()` everywhere, you let the factory decide which object to return.

---

### When to Use a Factory

Whenever you find yourself writing `if / else` or `switch` just to decide which object to instantiate, move that logic into a **Factory**.

---

### Example in Plain Words

**Without factory** (controller doing too much):

```php
if ($type === 'sms') {
    $notifier = new SmsNotifier();
} elseif ($type === 'email') {
    $notifier = new EmailNotifier();
} elseif ($type === 'slack') {
    $notifier = new SlackNotifier();
}
```

**With factory** (controller delegates responsibility):

```php
$notifier = NotificationFactory::make($type);
```

Now the controller doesn’t need to know which class or how it’s created.
It just asks the factory: “Give me the right object for this case.”

---

### 🧠 General Rule of Factory Pattern

The Factory Pattern is most useful when:

- You have a fixed but small set of possible classes (say 2–10).
- Each class implements a common interface (so client code can use them interchangeably).
- Which class to use depends on some condition (like user input, config, or environment).

---

### 👉 Example

- **Notification** → could be `EmailNotifier`, `SmsNotifier`, `SlackNotifier`.
- **Payment** → could be `PayPalPayment`, `StripePayment`, `RazorpayPayment`.
- **Shipping** → could be `DHL`, `DPD`, `FedEx`.

These are typically not dynamic from DB, but fixed “strategies” that differ in how they work.