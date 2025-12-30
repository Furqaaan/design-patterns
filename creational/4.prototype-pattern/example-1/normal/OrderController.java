class Order {
    private String status;
    private String currency;
    private double taxRate;
    private Integer userId;

    // Expensive setup
    public Order(String status, Integer userId) {
        System.out.println("Fetching settings from DB...");
        this.status = status;
        this.userId = userId;

        // DB CALL MADE HERE
        this.currency = "USD";
        this.taxRate = 0.18;
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

        // Duplicate → must call constructor again ❌ (re-fetch DB)
        Order draft = new Order("DRAFT", null);
    }
}
