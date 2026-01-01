## Creational Patterns

1. **Factory Pattern:** Choose which class/object to instantiate based on a runtime condition.
2. **Abstract Factory Pattern:** Like Factory, but returns groups of related objects that must work together.
3. **Builder Pattern:** Construct complex objects step by step, typically when many parameters are involved.
4. **Prototype Pattern:** Clone/copy objects efficiently, especially to avoid costly constructor calls.
5. **Singleton Pattern:** Ensure only one instance of a class exists throughout the application.

## Structural Patterns

1. **Adapter Pattern (Wrapper):** Make incompatible classes, APIs, or methods work together via interfaces and adapter classes.
2. **Bridge Pattern:** Decouple a class that varies along two dimensions (e.g., types and implementations), allowing independent extension of either dimension.
3. **Composite Pattern:** Treat individual objects and groups (trees) of objects uniformly, enabling recursive structures.
4. **Decorator Pattern:** Dynamically add new behaviors by wrapping objects, without changing the original class. Supports flexible stacking/removal of behaviors like caching, logging, etc.
5. **Facade Pattern:** Provide a simple interface to access a group of complex subsystems, hiding internal complexity.
6. **Flyweight Pattern:** When you create many objects that repeat the same data, Flyweight saves memory by sharing that common data instead of duplicating it
7. **Proxy Pattern:** Use Proxy when you want to add behavior before or after accessing a real object — without modifying it.

## Behavioral Patterns

1. **Chain Of Responsibility Pattern:** Use Chain of Responsibility when request processing has multiple independent steps and you want to avoid if–else hell.
2. **Command Pattern:** Encapsulate an action as an object so that the caller (UI/controller) is decoupled from the actual logic. This makes it easy to add new actions, queue actions, log them, or support undo/redo (e.g., editor commands, button actions in web apps).
3. **Iterator Pattern:** The Iterator Pattern is essential for iterating over collections/data in a structured and maintainable way