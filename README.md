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
4. **Mediator Pattern:** Use Mediator when multiple components need to communicate with each other, and you want to centralize and control their interactions to reduce tight coupling
5. **Memento Pattern:** Memento Pattern captures an object’s state so it can be restored later without violating encapsulation.
6. **Observer Pattern:** Observer Pattern allows objects to be notified automatically when another object’s state changes, without tight coupling.
7. **State Pattern:** State Pattern allows an object to alter its behavior when its internal state changes, by delegating behavior to state objects.
8. **Strategy Pattern:** Strategy Pattern lets you define a family of algorithms, encapsulate each one, and switch between them at runtime.
9. **Template Method Pattern:** Template Method Pattern defines the skeleton of an algorithm in a base class, while allowing subclasses to override specific steps without changing the overall flow
10. **Visitor Pattern:** Allows us to separate an algorithm from an Object Structure on which it operates.

### Mental Models for Design Patterns

#### Creational Patterns 🏗️

- **Singleton:**  
  _Ensure only one instance exists for the entire application._

- **Factory Method:**  
  _Delegate the decision of which object to instantiate to a method._

- **Abstract Factory:**  
  _Create families of related objects together._

- **Builder:**  
  _Construct complex objects step-by-step._

- **Prototype:**  
  _Clone existing objects efficiently instead of building from scratch._


#### Structural Patterns 🧱

- **Adapter:**  
  _Make incompatible interfaces work together._

- **Bridge:**  
  _Separate abstraction from implementation for independent evolution._

- **Composite:**  
  _Treat individual and group objects uniformly._

- **Decorator:**  
  _Add new behavior to objects without modifying their underlying code._

- **Facade:**  
  _Provide a simple interface to a complex subsystem._

- **Flyweight:**  
  _Share common data to reduce memory usage when dealing with many similar objects._

- **Proxy:**  
  _Control access to an object or add behavior before/after request._


#### Behavioral Patterns 🔄

- **Chain of Responsibility:**  
  _Allow more than one object to handle a request—avoid coupling sender and receiver._

- **Command:**  
  _Encapsulate a request as an object; support actions like undo, queueing, logging._

- **Iterator:**  
  _Provide a standard way to access elements in a collection._

- **Mediator:**  
  _Centralize communication between components to reduce dependencies._

- **Observer:**  
  _Notify multiple objects when another object's state changes._

- **Memento:**  
  _Capture and restore an object's state without violating encapsulation._

- **State:**  
  _Change an object's behavior when its internal state changes._

- **Strategy:**  
  _Select an algorithm’s behavior at runtime._

- **Template Method:**  
  _Define the skeleton of an algorithm, deferring some steps to subclasses._

- **Visitor:**  
  _Add new operations to objects without changing their classes._

- **Interpreter:**  
  _Define a language and interpret its expressions within the context._