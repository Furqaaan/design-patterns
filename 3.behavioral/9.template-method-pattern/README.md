# Template Method Pattern — Summary & Example

The **Template Method Pattern** defines the *structure* of an algorithm in a base class and lets subclasses change *certain steps* without altering the entire workflow.

**Key Features:**  
- Algorithm structure is fixed  
- Subclasses override customizable steps  
- Ensures code reuse and consistent flow  
- Keeps main control in the base class  
- Reduces workflow duplication

> _“The steps remain constant, the specifics can be customized.”_

---

## 🛒 Real-World Example: Data Import Workflow

Imagine an admin system that supports different data imports (CSV, API, Excel). Every import must:

1. Validate input  
2. Transform data  
3. Save to database  
4. Send notification  

The *order* of these steps never changes; only their implementation does.

---

### 🚫 Problem: No Template Method

Each importer defines the whole process from scratch:

```php
class CsvImportService {
    public function import(): void {
        echo "Validate CSV\n";
        echo "Transform CSV\n";
        echo "Save CSV data\n";
        echo "Notify user\n";
    }
}

class ApiImportService {
    public function import(): void {
        echo "Validate API data\n";
        echo "Transform API data\n";
        echo "Save API data\n";
        echo "Notify user\n";
    }
}
```

#### Drawbacks:
- Workflow logic duplicated  
- Hard to guarantee consistent step order  
- Bug fixes must be repeated everywhere  
- Breaks DRY principle

---

### 💡 Solution: Template Method Pattern

**Goal:**  
- One place defines the overall process  
- Subclasses “plug in” their specific steps

---

#### 🧱 Abstract Base Class (The Template)

```php
abstract class DataImportTemplate {

    // The template method defines the algorithm skeleton (final = cannot be overridden)
    final public function import(): void {
        $this->validate();
        $this->transform();
        $this->save();
        $this->notify();
    }

    abstract protected function validate(): void;
    abstract protected function transform(): void;

    protected function save(): void {
        echo "Save data to DB\n";
    }

    protected function notify(): void {
        echo "Notify user\n";
    }
}
```

---

#### 🏗️ Concrete Importers

```php
class CsvImport extends DataImportTemplate {
    protected function validate(): void {
        echo "Validate CSV data\n";
    }
    protected function transform(): void {
        echo "Transform CSV rows\n";
    }
}

class ApiImport extends DataImportTemplate {
    protected function validate(): void {
        echo "Validate API response\n";
    }
    protected function transform(): void {
        echo "Transform API payload\n";
    }
}
```

---

#### ▶️ Usage (order is enforced)

```php
$importer = new CsvImport();
$importer->import();

$importer = new ApiImport();
$importer->import();
```

**Result:**  
- ✔ Same workflow  
- ✔ Fixed step order  
- ✔ Easy customization

---

## 🧠 Why Use Template Method?

| Without Template         | With Template          |
|-------------------------|-----------------------|
| Duplicated workflow     | Centralized process   |
| Inconsistent steps      | Consistent order      |
| Harder to maintain      | Easier maintenance    |
| Error-prone             | Robust & reliable     |

---

## 🚗 Real-World Analogy

**Cooking Recipe:**  
- Steps: Prepare → Cook → Serve  
- Ingredients may differ  
- Step order always the same

---

## 🧩 Where Is Template Method Used?

- Data import/export flows  
- Authentication pipelines  
- Framework lifecycle hooks  
- Report generation  
- Payment processing

---