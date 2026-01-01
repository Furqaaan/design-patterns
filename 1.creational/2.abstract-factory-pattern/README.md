
# Abstract Factory Pattern Overview

The **Abstract Factory Pattern** is a creational design pattern that:

- **Factory Pattern:** Picks one object (e.g., Payment method).
- **Abstract Factory Pattern:** Picks a whole family of related objects (Payment + Refund + Webhook).

---

## Example Scenario

Imagine you’re building a **payment service** in Laravel that supports **PayPal** and **Stripe**.  
Each provider has a set of related services:

- `PaymentService` (to charge)
- `RefundService` (to refund)
- `WebhookService` (to handle webhooks)

---

### Goal:

👉 You want to ensure:
- If the client picks **Stripe** → you always get `StripePayment` + `StripeRefund` + `StripeWebhook`.
- If **PayPal** → you always get `PayPalPayment` + `PayPalRefund` + `PayPalWebhook`.

This is a classic Abstract Factory case.

---

## Factory vs Abstract Factory

- **Factory:** “Give me *one* object depending on a condition.”
- **Abstract Factory:** “Give me a *set of related* objects depending on a condition.”

---

## Initial Approach

```php
if ($provider === 'stripe') {
    $payment = new StripePayment();
    $refund = new StripeRefund();
    $webhook = new StripeWebhook();
} else {
    $payment = new PayPalPayment();
    $refund = new PayPalRefund();
    $webhook = new PayPalWebhook();
}

$payment->pay($amount);
$refund->refund($amount);
$webhook->handle($amount);
```
*Hard to maintain as app grows and breaks SOLID.*

---

## Updated (Abstract Factory) Approach

```php
$factory = PaymentFactory::make($provider);

$payment = $factory->createPaymentService();
$refund = $factory->createRefundService();
$webhook = $factory->createWebhookService();

$payment->pay($amount);
$refund->refund($amount);
$webhook->handle($amount);
```
