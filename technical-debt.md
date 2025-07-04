# Technical Debt: Detailed Breakdown by Artifact Type

## 1. Source Code Level

**Invisible + Maintainability**

### Characteristics

- **Fine-grained, localized issues** - ปัญหาที่ละเอียด เฉพาะจุด
- **Detectable by static analysis tools** - ตรวจจับได้ด้วยเครื่องมือวิเคราะห์แบบคงที่
- **Usually results from poor practices or shortcuts** - มักเกิดจากการปฏิบัติที่ไม่ดีหรือทางลัด
- **Primarily affects maintainability** - ส่งผลกระทบหลักต่อความสามารถในการดูแลรักษา

### Specific Examples

#### Code Smells

```java
// Long Method
public void processOrder(Order order) {
    // 200+ lines of code doing multiple responsibilities
    validateOrder(order);
    calculateTax(order);
    applyDiscounts(order);
    updateInventory(order);
    sendConfirmationEmail(order);
    generateInvoice(order);
    // ... many more operations
}

// Large Class
public class OrderManager {
    // 50+ methods handling everything from validation to email sending
    // Should be split into OrderValidator, OrderProcessor, EmailService, etc.
}

// Duplicate Code
public void processOnlineOrder(Order order) {
    if (order.getAmount() > 1000) {
        order.setDiscount(0.1);
    }
    // ... processing logic
}

public void processPhoneOrder(Order order) {
    if (order.getAmount() > 1000) {
        order.setDiscount(0.1);  // Same logic duplicated
    }
    // ... similar processing logic
}
```

#### Complexity Issues

```python
# High Cyclomatic Complexity
def calculate_shipping_cost(weight, distance, shipping_type, customer_type,
                          is_express, is_international, has_insurance):
    if shipping_type == "standard":
        if customer_type == "premium":
            if weight < 5:
                if distance < 100:
                    if is_express:
                        return 15.0
                    else:
                        return 10.0
                else:
                    if is_international:
                        if has_insurance:
                            return 45.0
                        else:
                            return 35.0
                    # ... many more nested conditions
```

#### Style Violations

```javascript
// Inconsistent naming - การตั้งชื่อที่ไม่สม่ำเสมอ
var userName = 'john';
var user_age = 25;
var UserEmail = 'john@email.com';

// Poor formatting - การจัดรูปแบบที่แย่
function calculateTotal(items) {
  var total = 0;
  for (var i = 0; i < items.length; i++) {
    total += items[i].price * items[i].quantity;
  }
  return total;
}

// Missing documentation - ขาดเอกสารประกอบ
function processPayment(amount, cardNumber, cvv) {
  // No comments explaining complex payment logic
  // No parameter documentation
  // No return value documentation
}
```

### Tools for Detection

- **SonarQube**: Multi-language code quality analysis
- **ESLint**: JavaScript linting and style checking
- **PMD**: Java source code analyzer
- **FindBugs/SpotBugs**: Java bytecode analysis
- **Pylint**: Python code analysis

### Impact

- **Slower feature development** 
- **Higher defect rates** 
- **Difficulty onboarding new developers** 
- **Increased debugging time** 

---

## 2. Architecture Level

**Invisible + Evolvability**

### Characteristics (ลักษณะเฉพาะ)

- **High-level structural issues** - ปัญหาโครงสร้างระดับสูง
- **Difficult to detect with automated tools** - ยากต่อการตรวจจับด้วยเครื่องมืออัตโนมัติ
- **Often results from early design decisions** - มักเกิดจากการตัดสินใจออกแบบในช่วงแรก
- **Primarily affects evolvability** - ส่งผลกระทบหลักต่อความสามารถในการพัฒนา

### Specific Examples

#### 1. Technology Lock-in

```java
// Example: Heavy dependency on specific vendor solution
public class PaymentProcessor {
    private VendorSpecificAPI vendorAPI; // Hard to replace

    public void processPayment(Payment payment) {
        // Code tightly coupled to vendor's specific implementation
        VendorPaymentRequest request = new VendorPaymentRequest();
        request.setVendorSpecificField1(payment.getAmount());
        request.setVendorSpecificField2(payment.getCurrency());

        VendorResponse response = vendorAPI.processPayment(request);
        // Direct use of vendor-specific response format
    }
}
```

**ตัวอย่าง**:

- ใช้ AngularJS เป็นฐาน
- เมื่อ Angular 2+ เปิดตัว ไม่สามารถอัปเกรดได้ง่าย
- ต้องเขียนใหม่ทั้งหมดหรือคงอยู่กับเทคโนโลยีเก่า

#### 2. Structural Problems

```python
# Monolithic architecture when microservices needed
class ECommerceSystem:
    def __init__(self):
        self.user_manager = UserManager()
        self.product_catalog = ProductCatalog()
        self.order_processor = OrderProcessor()
        self.payment_system = PaymentSystem()
        self.shipping_system = ShippingSystem()
        # All tightly coupled in one monolith

    def process_order(self, order):
        # All systems must be updated together
        # Cannot scale individual components
        # Single point of failure
        pass
```

**ตัวอย่าง**:

- ระบบขนาดใหญ่ที่พัฒนามา 15 ปี
- โครงสร้างแบบ monolithic ทำให้ยากต่อการเพิ่มฟีเจอร์ใหม่
- การเปลี่ยนแปลงเล็กน้อยส่งผลกระทบต่อระบบทั้งหมด

#### 3. Pattern Misapplication

```java
// Overuse of Singleton pattern
public class DatabaseConnection {
    private static DatabaseConnection instance;
    private static UserService userService;
    private static ProductService productService;
    private static OrderService orderService;
    // Everything becomes global state - hard to test and modify
}

// God Object anti-pattern
public class SystemManager {
    public void handleUserRegistration() { }
    public void processPayments() { }
    public void manageInventory() { }
    public void sendEmails() { }
    public void generateReports() { }
    // Single class doing everything
}
```

#### 4. Architectural Drift

```
// Intended Architecture:
UI Layer → Business Logic Layer → Data Access Layer

// Actual Implementation:
UI Layer ←→ Business Logic Layer ←→ Data Access Layer
     ↓              ↓                    ↓
   Database ←→ External APIs ←→ File System
// Layers calling each other chaotically
```

**ตัวอย่าง:

- สถาปัตยกรรมที่วางแผนไว้: Gateway ↔ Adapter
- การพัฒนาจริง: Gateway และ Adapter ผสมผสานกัน
- ความรับผิดชอบไม่ชัดเจน การแยกส่วนยาก

### Detection Methods

- **Architecture reviews and evaluations** - การทบทวนและประเมินสถาปัตยกรรม
- **Dependency analysis tools** - เครื่องมือวิเคราะห์การพึ่งพา
- **Code structure analysis** - การวิเคราะห์โครงสร้างโค้ด
- **Designer interviews** - การสัมภาษณ์นักออกแบบ

### Impact

- **Inability to scale**
- **Difficulty adding new features**
- **Performance bottlenecks**
- **Integration challenges**

---

## 3. Production Infrastructure Level

**Invisible + Both Qualities**

### Characteristics (ลักษณะเฉพาะ)

- **Related to build, test, and deployment processes** - เกี่ยวข้องกับกระบวนการสร้าง ทดสอบ และปรับใช้
- **Often involves "infrastructure as code"** - มักเกี่ยวข้องกับ "infrastructure as code"
- **Can affect both maintainability and evolvability** - ส่งผลต่อทั้งการดูแลรักษาและการพัฒนา
- **Frequently overlooked** - มักถูกมองข้ามในการอภิปราย technical debt

### Specific Categories

#### 1. Build and Integration Debt

```bash
# Complex, fragile build script
#!/bin/bash
# This script has grown organically over 3 years
# No one fully understands all parts anymore

if [ "$ENVIRONMENT" == "production" ]; then
    # Hardcoded paths that break on different machines
    cd /usr/local/app/legacy_path_that_changed
    # Manual steps that often get forgotten
    echo "Remember to manually update config.properties"
    echo "Remember to restart service X before service Y"

    # Copy-pasted commands with slight variations
    mvn clean install -DskipTests=true -Dprod.config=true
elif [ "$ENVIRONMENT" == "staging" ]; then
    mvn clean install -DskipTests=false -Dstage.config=true
elif [ "$ENVIRONMENT" == "development" ]; then
    mvn clean install -DskipTests=false -Ddev.config=true
fi

# Environment differences that cause bugs
export DATABASE_URL="hardcoded-prod-url"  # Oops!
```

**ตัวอย่างจาก**:

- Make dependency calculation ใช้เวลา 20% ของการ build แบบ incremental
- ต้องเลือกระหว่างโค้ดที่สะอาดกับประสิทธิภาพ

#### 2. Testing Debt

```java
// Inadequate test coverage
public class OrderProcessor {
    public void processOrder(Order order) {
        // Complex business logic with no tests
        if (order.getAmount() > 1000 &&
            order.getCustomer().isPremium() &&
            order.getShippingAddress().getCountry().equals("US")) {
            // Critical business rule with no test coverage
            order.applyPremiumDiscount();
        }
    }
}

// Slow, unreliable tests
@Test
public void testOrderProcessing() {
    // Test that takes 30 seconds to run
    Thread.sleep(5000); // Waiting for external service

    // Flaky test that fails randomly
    if (Math.random() > 0.7) {
        fail("Random failure - this happens 30% of the time");
    }
}

// Duplicate test code
public class OrderProcessorTest {
    // Same setup code copied in 15 different test classes
    @Before
    public void setUp() {
        database = new TestDatabase();
        database.loadTestData();
        mockService = new MockExternalService();
        // 50 lines of identical setup
    }
}
```

**ตัวอย่าง**:

- Framework ทดสอบเก่าและใหม่ทำงานแบบขนานกัน
- ต้องดูแลรักษา helper ทดสอบสองชุด
- การเปลี่ยนแปลงต้องทำในสองที่

#### 3. Deployment Debt

```yaml
# Manual deployment process documentation
# (that's often out of date)
Deployment Steps:
1. SSH to server1.company.com
2. Manually stop service (kill -9 pid_number)
3. Backup database (remember to check disk space first!)
4. Copy new JAR file (make sure permissions are 755)
5. Update config file (there are 3 versions, use the right one)
6. Start service (pray it starts without errors)
7. Check logs (tail -f /var/log/app.log)
8. If broken, restore backup (hope backup is good)
9. Update load balancer manually
10. Send email to team confirming deployment

# Environment configuration drift
Production:
  - Java 8 Update 181
  - MySQL 5.7.25
  - Redis 4.0.10

Staging:
  - Java 8 Update 152  # Different version!
  - MySQL 5.7.23       # Different version!
  - Redis 3.2.8        # Different version!

Development:
  - Java 11             # Completely different!
  - PostgreSQL 10.6     # Different database!
  - No Redis            # Missing component!
```

### Impact (ผลกระทบ)

- **การปรับใช้ที่ไม่เชื่อถือได้** - Unreliable deployments
- **การทดสอบที่ช้าและไม่เสถียร** - Slow and flaky testing
- **ความแตกต่างระหว่างสภาพแวดล้อม** - Environment inconsistencies
- **การสูญเสียเวลาในการแก้ไขปัญหาโครงสร้างพื้นฐาน** - Time lost debugging infrastructure issues
- **ความเสี่ยงในการปรับใช้การผลิต** - Risk in production deployments

---

## Cross-Cutting Concerns (ข้อกังวลที่ตัดผ่าน)

### Interdependencies (การพึ่งพาซึ่งกันและกัน)

```
Code Debt → Architecture Debt → Production Debt
     ↑              ↑                    ↑
     └──────────────┴────────────────────┘
```

**ตัวอย่าง**:

- โค้ดที่ซับซ้อน (Code Debt) ทำให้ยากต่อการทดสอบ (Production Debt)
- สถาปัตยกรรมที่ไม่ดี (Architecture Debt) ทำให้การปรับใช้ยาก (Production Debt)
- การทดสอบที่ไม่เพียงพอ (Production Debt) ทำให้กลัวการปรับโครงสร้างโค้ด (Code Debt)


