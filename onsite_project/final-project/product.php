<?php
$pageTitle = 'Product Details';
include 'header.php';

$slug = $_GET['slug'] ?? '';
$p = getProduct($slug);

if(!$p) { header('Location: shop.php'); exit; }
?>

<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
            <li class="breadcrumb-item active"><?php echo $p['name']; ?></li>
        </ol>
    </nav>
    
    <div class="row g-5">
        <div class="col-lg-6">
            <img src="<?php echo $p['image']; ?>" class="img-fluid rounded-4 shadow" alt="<?php echo $p['name']; ?>" style="width: 100%;">
        </div>
        
        <div class="col-lg-6">
            <small class="text-uppercase text-muted"><?php echo $p['category_name']; ?></small>
            <h1 class="mb-3"><?php echo $p['name']; ?></h1>
            <p class="price display-4 mb-4">$<?php echo number_format($p['price'],2); ?></p>
            
            <p class="lead mb-4"><?php echo $p['description']; ?></p>
            
            <div class="mb-4">
                <span class="badge bg-success">In Stock (<?php echo $p['stock']; ?> available)</span>
            </div>
            
            <div class="d-flex gap-3 mb-4">
                <input type="number" id="qty" value="1" min="1" max="<?php echo $p['stock']; ?>" class="form-control" style="width: 80px;">
                <button class="btn btn-primary btn-lg flex-grow-1" onclick="addWithQty(<?php echo $p['id']; ?>)">
                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
            
            <div class="card bg-light border-0">
                <div class="card-body">
                    <h6><i class="bi bi-truck me-2"></i>Free Shipping over $50</h6>
                    <p class="mb-0 small">Delivery in 3-5 business days</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addWithQty(id) {
    const qty = document.getElementById('qty').