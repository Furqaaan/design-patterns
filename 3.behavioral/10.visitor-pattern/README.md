# Visitor Pattern

## What is it?

The **Visitor Pattern** allows you to add new operations to a collection of object types _without modifying their classes_. It separates the algorithm from the object structure, making it easy to extend functionality.

> **When to use:**  
> You have multiple related object types and want to add new behaviors (operations) to them, but don't want to (or can't) change their code for every new operation.

---

## The Problem (Without Visitor)

Suppose you have a shopping cart containing:

- `Book`
- `Fruit`
- `Electronics`

You want to:

- Calculate total price
- Generate a report
- Apply discounts  
_(...and maybe more in the future)_

A typical but problematic approach:

```java
public class ShoppingCart {
  public int calculatePrice(List<Item> items) {
    int total = 0;
    for (Item item : items) {
      if (item instanceof Book) {
        total += ((Book) item).getPrice();
      } else if (item instanceof Fruit) {
        total += ((Fruit) item).getPricePerKg() * ((Fruit) item).getWeight();
      } else if (item instanceof Electronics) {
        total += ((Electronics) item).getPrice();
      }
    }
    return total;
  }
}
```

**Cons:**  
- Every new item or operation forces you to edit this method.
- `instanceof` checks clutter your logic (fragile!).
- Violates Open/Closed Principle (code isn't "closed for modification").

---

## The Solution (With Visitor)

### Key Interfaces

```java
interface ShoppingCartVisitor {
    int visit(Book book);
    int visit(Fruit fruit);
    int visit(Electronics electronics);
}

interface Item {
    int accept(ShoppingCartVisitor visitor);
}
```

### Example Item Classes

```java
class Book implements Item {
    int price;
    public int accept(ShoppingCartVisitor visitor) {
        return visitor.visit(this);
    }
}

class Fruit implements Item {
    int pricePerKg, weight;
    public int accept(ShoppingCartVisitor visitor) {
        return visitor.visit(this);
    }
}
```

### Implementing a Visitor

```java
class PriceCalculator implements ShoppingCartVisitor {
    public int visit(Book book) {
        return book.price;
    }
    public int visit(Fruit fruit) {
        return fruit.pricePerKg * fruit.weight;
    }
    public int visit(Electronics electronics) {
        return electronics.price;
    }
}
```

### Usage

```java
int total = 0;
for (Item item : items) {
    total += item.accept(new PriceCalculator());
}
```

---

## Comparison Table

|            | Without Visitor         | With Visitor                             |
|------------|------------------------|------------------------------------------|
| Adding operation   | Change all existing code | Write a new visitor                  |
| Adding item type   | Change every operation   | Update visitor and add new method     |
| Code structure     | Many `instanceof` checks | Polymorphism (clean, DRY)             |
| Open/Closed Principle | ❌ Violated              | ✅ Respected                           |


---

## Real-World Analogy

Imagine a museum:

- The museum's collection (Books, Paintings, Statues) stays the same.
- Different experts ('visitors') come in: one appraises value, another writes cleaning reports.

Whenever you need a new operation (e.g., a restoration plan), just send in a new expert.  
**The museum items don't change at all.**

**In short:**  
_Add new behaviors to whole families of objects, without touching their source code—just add Visitors!_
