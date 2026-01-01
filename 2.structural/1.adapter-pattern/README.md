
# Adapter Pattern

The Adapter Pattern allows incompatible interfaces to work together.  
Think of it like a "translator" between your code and a third-party service.

---

## The Core Problem (Before Adapter)

When you integrate multiple external SDKs/APIs (Stripe, PayPal, Razorpay, etc.),  
each has different method names and structures:

- **Stripe SDK**: `pay($amount, $currency)`
- **PayPal SDK**: `payment($amount, $currency)`
- **Razorpay SDK**: `charge($amount)`

So if you call them directly in your controller, you end up with **if-else hell**:

```php
class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $amount = 100;
        $gateway = $request->input('gateway');

        if ($gateway === 'stripe') {
            $stripe = new \Vendor\Stripe\StripePayment();
            $stripe->pay($amount, 'USD');
        } elseif ($gateway === 'paypal') {
            $paypal = new \Vendor\PayPal\PayPalPayment();
            $paypal->payment($amount, 'USD');
        }
        // add Razorpay later -> another if/else
    }
}
```

---

## The Adapter Solution

We fix this by:

1. **Defining a common interface:** `PaymentGateway`.
2. **Writing an Adapter for each provider** that "translates" its unique methods into a unified method (`processPayment()`).
3. **Controller now calls one method**, no matter what the vendor SDK.

---

## Benefits

- Controller doesn’t know about Stripe or PayPal internals.
- If tomorrow you add Razorpay, you just make `RazorpayAdapter`.
- Zero changes in controller.
