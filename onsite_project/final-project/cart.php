<?php
$pageTitle = 'Shopping Cart';
include 'header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['update'])) {
        foreach($_POST['qty'] as $id => $qty) {
            if($qty > 0) $_SESSION['cart'][$id]['qty'] = intval($qty);
            else unset($_SESSION['cart'][$id]);
        }
    }
    if(isset($_POST['clear'])) $_SESSION['cart'] = [];
    header('Location: cart.php');
    exit;
}
?>

<div class="container py-5">
    <h2 class="mb-4">Shopping Cart</h2>
    
    <?php if(empty($_SESSION['cart'])): ?>
        <div class="text-center py-5">
            <i class="bi bi-cart-x display-1 text-muted"></i>
            <h4 class="mt-3">Your cart is empty</h4>
            <a href="shop.php" class="btn btn-primary mt-3">Continue Shopping</a>
        </div>
    <?php else: ?>
        <form method="POST">
            <div class="row">
                <div class="col-lg-8">
                    <?php 
                    $total = 0;
                    foreach($_SESSION['cart'] as $id => $item): 
                        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
                        $stmt->execute([$id]);
                        $product = $stmt->fetch();
                        $sub = $item['price'] * $item['qty'];
                        $total += $sub;
                    ?>
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <img src="<?php echo $product['image']; ?>" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-1"><?php echo $product['name']; ?></h6>
                                <p class="text-muted mb-0">$<?php echo number_format($item['price'],2); ?> each</p>
                            </div>
                            <input type="number" name="qty[<?php echo $id; ?>]" value="<?php echo $item['qty']; ?>" class="form-control mx-3" style="width: 70px;">
                            <div class="text-end" style="min-width: 100px;">
                                <h6 class="mb-0">$<?php echo number_format($sub,2); ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="shop.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Continue</a>
                        <div>
                            <button type="submit" name="update" class="btn btn-outline-primary me-2">Update</button>
                            <button type="submit" name="clear" class="btn btn-outline-danger" onclick="return confirm('Clear cart?')">Clear</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                        <div class="card-body">
                            <h5 class="mb-3">Order Summary</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>$<?php echo number_format($total,2); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span><?php echo $total > 50 ? 'FREE' : '$9.99'; ?></span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Total</strong>
                                <strong class="price">$<?php echo number_format($total > 50 ? $total : $total + 9.99, 2); ?></strong>
                            </div>
                            <a href="checkout.php" class="btn btn-primary w-100 btn-lg">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>