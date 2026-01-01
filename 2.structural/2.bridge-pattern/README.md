# Bridge Pattern

A structural design pattern that lets you **split a large class or a set of closely related classes into two separate hierarchies**—**abstraction** and **implementation**—which can be developed independently of each other.

---

## What Is Composition?

**Composition** means:  
“A class contains another class inside it — to use its functionality.”

👉 In short:  
“has-a” relationship, not “is-a”.

---

## The Real Problem

You run an e-commerce backend that:

- Generates Invoices (for online orders, subscriptions, etc.)
- Sends them through different channels (Email, WhatsApp, Slack)

Without the Bridge pattern, you might start doing this:

```php
class EmailOnlineInvoice {}
class WhatsAppOnlineInvoice {}
class SlackOnlineInvoice {}
class EmailSubscriptionInvoice {}
class WhatsAppSubscriptionInvoice {}
class SlackSubscriptionInvoice {}
```

😩 **Boom — combinational explosion again.**  
Each time you add a new invoice type or channel, the class count multiplies.

---

The **Bridge Pattern** helps when your system has **two changing dimensions** (like invoice type and sending channel).  
It lets you extend either one independently, without touching the other.