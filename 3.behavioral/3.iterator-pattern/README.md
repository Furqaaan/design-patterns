## Iterator Pattern

The **Iterator Pattern** is a behavioral design pattern that lets you traverse elements of a collection one by one, without revealing the collection's internal details (such as how it stores items or how to access them directly). It provides a uniform way to access different types of collections (arrays, databases, files, etc.) sequentially.

### When Should You Use the Iterator Pattern?

- You need to loop through a collection without exposing how the collection works internally.
- You want to support different ways of traversing a collection (e.g., forwards, backwards, custom order).
- You want to provide a consistent interface for accessing different data sources.
- You want to decouple business logic from the details of storage or structure.

# 🎯 Real-world Example: Web Application

## Problem: Processing Orders from Multiple Sources

Admin systems may need to handle Orders for:

- UI listing
- CSV export
- Background jobs

But **WHERE** orders come from can vary:

- Array in memory?
- From a database?
- Via API?
- Read from a file?

Traditional code **mixes process logic and data source**:

### 1️⃣ Without Iterator (the problem)

Orders as an array:
```php
$orders = [
    ['id' => 101, 'amount' => 2500],
    ['id' => 102, 'amount' => 1800],
    ['id' => 103, 'amount' => 3200],
];

$i = 0;
while ($i < count($orders)) {
    echo "Processing Order #{$orders[$i]['id']}\n";
    $i++;
}
```

#### 🚨 Fragile! What if source changes?

If tomorrow orders come from a **DB cursor**, **API pagination**, or **file stream** —  
**You must rewrite the loop everywhere.**

---

## 2️⃣ Solution: Iterator Pattern

**Goal:** Processing code should NOT depend on *how* orders are fetched.

**Desired usage:**
```php
while ($iterator->hasNext()) {
    $order = $iterator->next();
    // process $order
}
```
Only the *iterator* changes, not the usage!

---

### 3️⃣ Java-style Iterator for Arrays

Define the abstraction:
```php
abstract class OrderIterator {
    protected int $position = 0;
    abstract public function hasNext(): bool;
    abstract public function next(): array;
}
```

Implementation for an array source:
```php
class ArrayOrderIterator extends OrderIterator {
    private array $orders;
    public function __construct(array $orders) {
        $this->orders = $orders;
    }
    public function hasNext(): bool {
        return isset($this->orders[$this->position]);
    }
    public function next(): array {
        return $this->orders[$this->position++];
    }
}
```

---

### 4️⃣ Repository Returns an Iterator (Not an Array)
```php
class OrderRepository {
    public function getOrders(): OrderIterator {
        $orders = [
            ['id' => 101, 'amount' => 2500],
            ['id' => 102, 'amount' => 1800],
            ['id' => 103, 'amount' => 3200],
        ];
        return new ArrayOrderIterator($orders);
    }
}
```

---

### 5️⃣ Usage (CORE: never changes)
```php
$repo = new OrderRepository();
$iterator = $repo->getOrders();

while ($iterator->hasNext()) {
    $order = $iterator->next();
    echo "Processing Order #{$order['id']}\n";
}
```
- ✔ Clean
- ✔ Data-source-agnostic
- ✔ Java-style

---

## 🔄 Switching Data Source (The Key Point!)

### 6️⃣ Now Orders Come from a Database

```php
class DbOrderIterator extends OrderIterator {
    private array $rows;
    public function __construct() {
        // Simulate getting DB rows
        $this->rows = [
            ['id' => 201, 'amount' => 4000],
            ['id' => 202, 'amount' => 1500],
        ];
    }
    public function hasNext(): bool {
        return isset($this->rows[$this->position]);
    }
    public function next(): array {
        return $this->rows[$this->position++];
    }
}
```

### 7️⃣ Repository Only Needs a Small Change!

```php
class OrderRepository {
    public function getOrders(): OrderIterator {
        return new DbOrderIterator(); // swapped from ArrayOrderIterator!
    }
}
```

---

### 8️⃣ Usage is UNCHANGED

```php
$repo = new OrderRepository();
$iterator = $repo->getOrders();

while ($iterator->hasNext()) {
    $order = $iterator->next();
    echo "Processing Order #{$order['id']}\n";
}
```

- 👉 No change to the business logic!
- 👉 No repeated loops!
- 👉 No coupling to storage!

---

## 🧠 Core Benefit Table

| Thing                | **Without Iterator** | **With Iterator**   |
|----------------------|---------------------|---------------------|
| Data source change   | Breaks code         | No impact           |
| Loop logic           | Duplicated          | Centralized         |
| Coupling             | Tight               | Loose               |
| Scalability          | Poor                | High                |

---

## 🚗 Analogy

**Without iterator:**  
> You're sent into the warehouse to search for your order yourself.

**With iterator:**  
> You stand at the counter and say: “Give me the next order.”
>  
> The warehouse layout may change—you don’t care!

---

## 🎯 Interview Takeaway

> **Iterator Pattern** decouples data source from traversal logic—
> you can change *where* you get data without changing *how* you use it.