The Decorator Pattern allows you to add new behavior or responsibilities to an object dynamically, without modifying its original class.

Think of it like wrapping a gift box with layers of wrapping paper — each layer adds something (like color or protection) but the gift inside remains the same.


We have a repository that fetches data from a database (simulated).
We want to add:

Logging
Caching

Normally you would be adding the logic in the repository itself,
but with this pattern, you can add these without touching the original repository class.

new CachedProductRepository(
    new LoggedProductRepository(
        new DbProductRepository()
    )
);

✅ You can add/remove caching or logging without touching the core DbProductRepository.
✅ You can combine multiple decorators easily (Cache + Logging + Validation).
✅ Each decorator has one clear responsibility.
✅ Complies with Open/Closed and Single Responsibility principles.