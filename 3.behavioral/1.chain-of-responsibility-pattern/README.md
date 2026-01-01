**Chain of Responsibility Pattern – Summary & Example**

**Definition:**  
Avoids long if–else blocks by sending a request through a series of handler objects, letting each handler decide whether to process or pass it along.

---

### Example Scenario: HTTP Request Processing ("Middleware")

Suppose a web request must go through:
- **Authentication**
- **Rate Limiting**
- **Validation**
- **Business Logic**

---

#### 🚫 Without Chain of Responsibility (Classic If-Else)

```php
class RequestHandler {
    public function handle(array $request) {
        if (!$this->isAuthenticated($request)) {
            return "401 Unauthorized";
        }
        if ($this->isRateLimited($request)) {
            return "429 Too Many Requests";
        }
        if (!$this->isValid($request)) {
            return "400 Bad Request";
        }
        return "200 OK - Request processed";
    }

    private function isAuthenticated($req) { return true; }
    private function isRateLimited($req) { return false; }
    private function isValid($req) { return true; }
}
```

- Tightly coupled and hard-coded logic order
- Difficult to add/remove checks
- Violates Open/Closed Principle (must edit class for new cases)
- Duplicate code if reused elsewhere

---

#### ✅ With Chain of Responsibility

**Key Concepts:**
- Each handler does one thing.
- If it can’t handle, it forwards to the next handler in the chain.

**Step 1: Abstract Handler**

```php
abstract class Middleware {
    protected ?Middleware $next = null;

    public function setNext(Middleware $next): Middleware {
        $this->next = $next;
        return $next;
    }

    public function handle(array $request) {
        if ($this->next) {
            return $this->next->handle($request);
        }
        return "200 OK - Request processed";
    }
}
```

**Step 2: Handlers for Each Responsibility**

_Authentication:_
```php
class AuthMiddleware extends Middleware {
    public function handle(array $request) {
        if (!$request['authenticated']) {
            return "401 Unauthorized";
        }
        return parent::handle($request);
    }
}
```

_Rate Limiting:_
```php
class RateLimitMiddleware extends Middleware {
    public function handle(array $request) {
        if ($request['rate_limited']) {
            return "429 Too Many Requests";
        }
        return parent::handle($request);
    }
}
```

_Validation:_
```php
class ValidationMiddleware extends Middleware {
    public function handle(array $request) {
        if (!$request['valid']) {
            return "400 Bad Request";
        }
        return parent::handle($request);
    }
}
```

**Step 3: Build and Use the Chain**

```php
$auth = new AuthMiddleware();
$rateLimit = new RateLimitMiddleware();
$validation = new ValidationMiddleware();

$auth->setNext($rateLimit)->setNext($validation);

$request = [
    'authenticated' => true,
    'rate_limited' => false,
    'valid' => true,
];

echo $auth->handle($request); // Outputs: "200 OK - Request processed"
```

---

**Benefits:**

| Without Chain (If-Else) | With Chain of Responsibility |
|-------------------------|-----------------------------|
| Big `if`-`else`         | Small, focused classes      |
| Hard to extend/modify   | Easily add/remove steps     |
| Tight coupling          | Loose, flexible coupling    |
| One "god" class         | Single responsibility       |

---

**Bottom Line:**  
Chain of Responsibility = _“Pass the request along a chain of handlers until someone handles it.”_

Use Chain when a request must pass through multiple independent handlers, each capable of stopping or forwarding it.