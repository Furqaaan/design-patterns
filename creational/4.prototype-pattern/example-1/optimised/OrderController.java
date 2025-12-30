class Order {
    private String status;
    private String currency;
    private double taxRate;
    private Integer userId;

    // Expensive constructor
    public Order(String status, Integer userId) {
        System.out.println("Fetching settings from DB...");
        this.status = status;
        this.userId = userId;

        // DB CALL MADE HERE
        this.currency = "USD";
        this.taxRate = 0.18;
    }

    // Copy constructor for prototype pattern
    public Order(Order other) {
        this.status = "DRAFT";  // reset fields for the duplicate
        this.currency = other.currency;  // copy expensive-to-fetch fields
        this.taxRate = other.taxRate;
        this.userId = null;
    }

    @Override
    public String toString() {
        return "Order{status='" + status + "', currency='" + currency + "', taxRate=" + taxRate + ", userId=" + userId + "}";
    }
}

class OrderController
{
    public static void main(String[] args) {
        Order original = new Order("PAID", 42);

        // Duplicate → avoid expensive constructor ✅ (reuse existing data)
        Order draft = new Order(original);
    }
}
