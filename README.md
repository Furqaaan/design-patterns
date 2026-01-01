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