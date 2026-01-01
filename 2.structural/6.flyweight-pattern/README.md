When you create many objects that repeat the same data, **Flyweight saves memory by sharing that common data instead of duplicating it.**

---

**Consider:**  
_Game characters_ / _bullets_ / _trees_ / _letters in a document_

**Example:**  
**10,000 soldiers on screen**

Each soldier has:
- same image
- same weapon
- same uniform
- **Only position (x, y) changes**

---

❌ **Creating everything again and again = wasted memory**

- 1,000 trees = 1,000 copies of same data
- High memory usage

---

### Why Flyweight is better (simple comparison)

| Without Flyweight         | With Flyweight        |
|--------------------------|----------------------|
| Many duplicate objects   | One shared object    |
| High memory usage        | Low memory usage     |
| Slow for large data      | Fast & scalable      |
| Hard to optimize         | Easy to control      |

---

**One-line intuition (very important 🔥):**

- _Facade_ **simplifies usage**
- _Flyweight_ **optimizes memory**

---

### When should YOU think of Flyweight?

✔ **When you see:**
- Thousands / millions of similar objects
- Most data is same
- Only few fields change (position, id, state)

❌ **Don’t use when:**
- Objects are very different
- Memory is not a concern

---

### Ultra-short analogy

📄 **Word document**

- 10,000 letters “A”
    - Font & shape stored *once*
    - Position stored *separately*
- ➡️ That’s Flyweight

---

The Flyweight pattern always involves **caching and reuse of objects**, because its core purpose is to reduce memory usage by sharing common (intrinsic) data instead of duplicating it.  
This caching is in-memory and object-level, usually implemented via a factory that stores already created flyweight objects and returns the same instance when requested again.

> Without this reuse mechanism, the pattern provides no benefit and effectively stops being a Flyweight. It’s important to note that this is not external caching like Redis or databases, but a lightweight, per-process cache meant purely for efficient object sharing.

```php
class TreeFactory {
    private static array $treeTypes = []; // 👈 THIS is the cache
}
```

