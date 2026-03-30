<?php
$pageTitle = 'Checkout';
include 'header.php';

if(empty($_SESSION['cart'])) { header('Location: cart.php'); exit; }

$success = false;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    
    if($name && $email && $address) {
        $total = cartTotal() > 50 ? cartTotal() : cartTotal() + 9.99;
        
        $stmt = $pdo->prepare("INSERT INTO orders (customer_name, email, phone, address, city, country, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $_POST['phone'] ?? '', $address, $_POST['city'] ?? '', $_POST['country'] ?? '', $total]);
        $orderId = $pdo->lastInsertId();
        
        $itemStmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach($_SESSION['cart'] as $id => $item) {
            $itemStmt->execute([$orderId, $id, $item['qty'], $item['price']]);
        }
        
        $_SESSION['cart'] = [];
        $success = true;
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php if($success): ?>
                <div class="text-center py-5">
                    <i class="bi bi-check-circle-fill display-1 text-success"></i>
                    <h2 class="mt-3">Thank You!</h2>
                    <p class="lead">Your order #<?php echo str_pad($orderId, 6, '0', STR_PAD_LEFT); ?> has been placed.</p>
                    <a href="index.php" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            <?php else: ?>
                <h2 class="mb-4">Checkout</h2>
                <form method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address *</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control">
                        </div>
                    </div>
                    
                    <div class="card mt-4 bg-light border-0">
                        <div class="card-body">
                            <h5>Total: $<?php echo number_format(cartTotal() > 50 ? cartTotal() : cartTotal() + 9.99, 2); ?></h5>
                            <p class="small text-muted mb-0">Cash on delivery</p>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="cart.php" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>