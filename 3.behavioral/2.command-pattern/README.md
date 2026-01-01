**Command Pattern: Formatting & Application**

---

### What is the Command Pattern?

Command turns an action into an object. You decouple sender from receiver, so you can queue, log, undo, or swap actions easily.

---

### Example: E-commerce Admin Panel – Order Actions

In an admin dashboard, you might need to:

- Approve order
- Cancel order
- Refund order

> **UI button changes, but the controller should NOT care how the action is done.**

This is where **Command Pattern** fits perfectly.

---

#### ❌ Without Command Pattern (Tightly Coupled)

**Controller directly does all logic**:

```php
class OrderController
{
    public function handle(string $action, array $order)
    {
        if ($action === 'approve') {
            echo "Order approved\n";
            echo "Stock reduced\n";
            echo "Email sent\n";
        }

        if ($action === 'cancel') {
            echo "Order cancelled\n";
            echo "Stock restored\n";
            echo "Refund initiated\n";
        }

        if ($action === 'refund') {
            echo "Refund processed\n";
        }
    }
}

$controller = new OrderController();
$controller->handle('cancel', ['id' => 101]);
```

**Problems:**
- `if/else` keeps growing
- Controller knows too much
- Adding new actions is hard
- Individual actions hard to test
- Breaks Single Responsibility Principle

---

#### ✅ With Command Pattern (Clean & Scalable)

**Step 1:** Command Interface

```php
interface Command
{
    public function execute(): void;
}
```

**Step 2:** Concrete Command Classes

```php
class ApproveOrderCommand implements Command
{
    public function execute(): void
    {
        echo "Order approved\n";
        echo "Stock reduced\n";
        echo "Email sent\n";
    }
}

class CancelOrderCommand implements Command
{
    public function execute(): void
    {
        echo "Order cancelled\n";
        echo "Stock restored\n";
        echo "Refund initiated\n";
    }
}

class RefundOrderCommand implements Command
{
    public function execute(): void
    {
        echo "Refund processed\n";
    }
}
```

**Step 3:** Invoker (Controller)

```php
class OrderController
{
    public function handle(Command $command)
    {
        $command->execute();
    }
}
```

**Step 4:** Usage

```php
$action = 'cancel'; // from request

$controller = new OrderController();
$commandMap = [
    'approve' => new ApproveOrderCommand(),
    'cancel'  => new CancelOrderCommand(),
    'refund'  => new RefundOrderCommand(),
];

$controller->handle($commandMap[$action]);
```

---

🔥 **Why This Is Better**

- ✅ Decoupled code
- ✅ Open for extension
- ❌ No need to change controller when adding new actions

> **Add a new action (e.g. ShipOrder)?**
> - Just add a new Command class
> - No controller change

---

### 🧠 Analogy: Restaurant Order System

- **Customer clicks "Place Order"**
- Waiter does *not* cook
- Waiter sends *command* to kitchen
- Kitchen executes the command

| Real World | Command Pattern |
|:-|:-|
| Waiter | Controller (Invoker) |
| Order Slip | Command |
| Kitchen | Business Logic (Receiver) |

---

### 🆚 Facade vs Command (Quick Compare)

| Pattern | Purpose |
| :-- | :-- |
| Facade | Simplifies multiple operations into one |
| Command | Encapsulates an action as an object |

- **Facade**: “Do all this for me”
- **Command**: “Do THIS action”

---

### 💡 When to Use Command Pattern

- Many actions triggered by UI buttons
- Need undo/redo (very common)
- Want clean controllers
- Want to queue or log actions

**Definition:**  
_Command Pattern turns a request into an object, so you can parameterize, queue, and decouple actions._

---

## Example #2: Simple Text Editor (Like Notion/Google Docs)

**Actions:**
- Type text
- Delete text
- (Later) Undo / Redo

---

#### ❌ Without Command Pattern (Messy & Rigid)

Editor directly handles the action types:

```php
class TextEditor
{
    private string $text = '';

    public function handle(string $action, string $value = '')
    {
        if ($action === 'write') {
            $this->text .= $value;
        }

        if ($action === 'delete') {
            $this->text = substr($this->text, 0, -strlen($value));
        }

        echo "Current text: {$this->text}\n";
    }
}

$editor = new TextEditor();
$editor->handle('write', 'Hello ');
$editor->handle('write', 'World');
$editor->handle('delete', 'World');
```

**Problems:**
- Editor knows *every* action
- Adding undo, redo, copy, paste is painful
- No action history
- Lots of if/else

---

#### ✅ With Command Pattern (Clean & Powerful)

**Now, each editor action is a Command.**

**Step 1:** The Actual Editor (Receiver)

```php
class TextEditor
{
    private string $text = '';

    public function write(string $text)
    {
        $this->text .= $text;
    }

    public function delete(int $length)
    {
        $this->text = substr($this->text, 0, -$length);
    }

    public function getText(): string
    {
        return $this->text;
    }
}
```
> **Editor only knows how to perform things, not when.**

**Step 2:** Command Interface

```php
interface Command
{
    public function execute(): void;
    public function undo(): void;
}
```

**Step 3:** Concrete Commands

*WriteCommand*
```php
class WriteCommand implements Command
{
    public function __construct(
        private TextEditor $editor,
        private string $text
    ) {}

    public function execute(): void
    {
        $this->editor->write($this->text);
    }

    public function undo(): void
    {
        $this->editor->delete(strlen($this->text));
    }
}
```

*DeleteCommand*
```php
class DeleteCommand implements Command
{
    private string $deletedText = '';

    public function __construct(
        private TextEditor $editor,
        private int $length
    ) {}

    public function execute(): void
    {
        $this->deletedText = substr(
            $this->editor->getText(),
            -$this->length
        );

        $this->editor->delete($this->length);
    }

    public function undo(): void
    {
        $this->editor->write($this->deletedText);
    }
}
```

**Step 4:** Invoker (Editor Toolbar / Controller)

```php
class EditorInvoker
{
    private array $history = [];

    public function run(Command $command)
    {
        $command->execute();
        $this->history[] = $command;
    }

    public function undo()
    {
        $command = array_pop($this->history);
        if ($command) {
            $command->undo();
        }
    }
}
```

**Step 5:** Usage (Like Real Editor Buttons)

```php
$editor = new TextEditor();
$invoker = new EditorInvoker();

$invoker->run(new WriteCommand($editor, 'Hello '));
$invoker->run(new WriteCommand($editor, 'World'));

echo $editor->getText() . "\n"; // Hello World

$invoker->undo();
echo $editor->getText() . "\n"; // Hello 
```

---

🔥 **Command Pattern Benefits**

- ✅ Undo/Redo support
- ✅ No if/else
- ✅ Each action is independent
- ✅ Super easy to add new actions

>Add PasteCommand, BoldCommand, ReplaceCommand – No editor rewrite!

---

### 🧠 Real-World Mapping (Text Editor)

| Text Editor       | Command Pattern    |
|-------------------|-------------------|
| Button click      | Invoker           |
| Write / Delete    | Command           |
| Document          | Receiver          |
| Undo stack        | Command history   |

Conceptually, this is how:

- VS Code
- Google Docs
- Notion

work internally.

---

**One-line Interview Answer 🚀**

> Command Pattern is ideal for text editors because it encapsulates actions as objects and enables undo/redo effortlessly.



### ✅ Clear Separation of Responsibilities

**TextEditor (Receiver)**

- *Defines* what can be done  
- *Contains* the real business logic  
- *Knows* how to do things

```php
class TextEditor
{
    public function write(string $text) { /* ... */ }
    public function delete(int $length) { /* ... */ }
}
```

*The editor does **not** know:*
- Who clicked the button
- When it was triggered
- Whether it’s for undo/redo

---

**Command Classes**

- *Decide* when and how to call editor methods  
- *Represent* one user action  
- *Can store state for undo/redo*

```php
class WriteCommand implements Command
{
    public function execute()
    {
        $editor->write($text);
    }

    public function undo()
    {
        $editor->delete(strlen($text));
    }
}
```

---

**Mental Model**  
- Command = “*Perform this action*”  
- Editor = “*I know how to do it*”

Think of it like this:  
- Editor is the **engine**
- Command is the **gear** you engage  
**Engine** has all capabilities, **gears** decide which runs and when.

---

#### Why This Separation Matters

If the editor handled everything, it would need to know about:
- write
- delete
- undo
- redo
- macro
- history

> This would make it a *god class*. ❌

But with the Command Pattern:
- Editor stays **stable**, **simple**
- Commands are **flexible**, **replaceable**
- Undo/redo is **trivial**
- UI / Controller stays **dumb**

---

**Typical Real-World Flow (Web App):**
1. *Button Click*
2. → Command created
3. → Invoker runs command
4. → Command calls editor method

- Editor never sees the button
- Button never sees editor internals

---

**One-sentence interview summary:**
> All actions are implemented in the receiver (Editor), but commands decide when and how those actions are executed and reversed.
