Use Builder when:

Object creation needs multiple steps.
You don’t want a huge constructor like:

new User("David", "Hunt", 12, "India", "Laravel Dev", "david@example.com", true, "hashed_pass");


That’s hard to read & maintain.
Builder lets you build the object fluently step by step.

Factory = which class to instantiate?
Builder = how to assemble a complex object step by step?

Without Builder
$order = new Order(
    $userId,
    $shippingAddress,
    $paymentMethod,
    $items,
    $discount,
    $taxes
);

Problems:

Too many parameters → hard to read, you must remember the order.
Optional fields → you still need to pass null or undefined.
Maintainability → if tomorrow we add couponCode, all old constructors break.
Readability → 101, "London", "stripe" doesn’t say what each argument means.

With Builder Pattern
$order = (new OrderBuilder())
    ->setUser(101)
    ->setShipping("221B Baker Street, London")
    ->setPayment("stripe")
    ->addItem("iPhone 15")
    ->addItem("MacBook Pro")
    ->setDiscount(1000)
    ->setTaxes(500)
    ->build();

Whenever you feel:
“My constructor is getting too long”
“I have too many optional parameters”
“I want a step-by-step way to build an object”

➡️ Think Builder Pattern.


Rule of Thumb

If you’re building an entity or value object → Builder is a natural fit.
If your service method takes 8–10+ arguments → create a Request Object + Builder (or DTO) instead of passing raw arguments


Factory → removes if/else logic from controller, decides the right kind of builder.
Builder → makes it easy to set values step by step.
DTO → clean, immutable object for your service layer.