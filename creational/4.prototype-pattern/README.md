Useful when:

-You need to create a copy of an existing object (clone it).
-Creating the object from scratch is expensive (too many steps, DB calls, heavy initialization)

Instead of building an object again and again, you make one object, then clone it whenever you need a new one

A copy constructor is used in Java to create clones of existing objects, avoiding expensive object creation operations like database calls or complex initialization steps.

PHP provides built-in support for object cloning through:

-   The `clone` keyword to create copies of objects
-   The `__clone()` magic method which can be implemented to customize the cloning process

In javascript we use Object.assign to copy the object

````clone() {
    return Object.assign(
      Object.create(Object.getPrototypeOf(this)),
      this
    );
  }```
````
