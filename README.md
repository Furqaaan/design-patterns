Creational

1-Factory Pattern : If you need to choose which class/object to instantiate based on a condition
2-Abstract Factory Pattern: Same as factory but Good for multiple related objects that must work together , ie when you need a group of objects that must work together.
3-Builder Pattern: When you need to construct complex objects step by step, especially when an object requires many parameters
4-Prototype Pattern: Used to clone/copy objects w/o expensive constructor calls
5-Singleton Pattern: Used to ensure that only one instance of a class exists in the whole application


Structural

1-Adapter Pattern (Wrapper) : When you need to make two/more incompatible classes/api/methods to work together , we use an interface and adapter classes
2-Bridge Pattern : When a class has two separate dimensions that both vary, such as types of operations and ways of performing them, and you want to separate their code so you can add new types or implementations without touching existing ones
3-Composite Pattern :  Pattern for creating tree-like structures of objects. It allows you to treat individual objects and groups of objects uniformly. 
4-Decorator Pattern: Lets you wrap objects to add new behaviors dynamically, without modifying the original class — like adding caching or logging layers around a core service.You can add/remove these behaviors w/o changing original class.
5-Facade Pattern: Use the Facade Pattern when you want to simplify access to a group of complex subsystems by exposing a single, easy-to-use interface.