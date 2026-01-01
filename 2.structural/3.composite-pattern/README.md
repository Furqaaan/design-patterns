# Composite Design Pattern

The **Composite Design Pattern** is a powerful pattern for creating **tree-like structures** of objects.  
It allows you to **treat individual objects and groups of objects uniformly**.

---

**Without** the Composite Pattern, your code must treat single objects and collections differently —  
for example, using `if` checks to see whether something is an individual item or a group before processing:

```
if (item is a group) {
    // iterate and process each child
} else {
    // process single item
}
```

---

**With** the Composite Pattern:

- Both **individual objects** and **groups of objects** implement the same interface (e.g., `render()`, `execute()`)
- You can **treat them uniformly** in your client code.

> This means your code **doesn't care** whether it's dealing with a single object or a complex hierarchy —  
> it just calls the same method, making the code **cleaner, more flexible, and easier to extend**.