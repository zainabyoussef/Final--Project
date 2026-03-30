<?php
$pageTitle = 'Shop';
include 'header.php';

$cat = $_GET['category'] ?? null;
$products = getProducts($cat);
$cats = getCategories();
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3">Categories</h5>
                    <div class="list-group list-group-flush">
                        <a href="shop.php" class="list-group-item <?php echo !$cat ? 'active' : ''; ?>">All Products</a>
                        <?php foreach($cats as $c): ?>
                        <a href="?category=<?php echo $c['slug']; ?>" class="list-group-item <?php echo $cat==$c['slug']?'active':''; ?>">
                            <?php echo $c['name']; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0"><?php echo $cat ? ucwords(str_replace('-',' ',$cat)) : 'All Products'; ?></h4>
                <span class="text-muted"><?php echo count($products); ?> items</span>
            </div>
            
            <div class="row g-4">
                <?php foreach($products as $p): ?>
                <div class="col-6 col-md-4">
                    <div class="product-card h-100">
                        <a href="product.php?slug=<?php echo $p['slug']; ?>">
                            <img src="<?php echo $p['image']; ?>" class="product-img" alt="<?php echo $p['name']; ?>">
                        </a>
                        <div class="p-3">
                            <small class="text-muted"><?php echo $p['category_name']; ?></small>
                            <h6 class="mt-1 mb-2">
                                <a href="product.php?slug=<?php echo $p['slug']; ?>" class="text-dark text-decoration-none">
                                    <?php echo $p['name']; ?>
                                </a>
                            </h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$<?php echo number_format($p['price'],2); ?></span>
                                <button class="btn btn-sm btn-primary" onclick="event.preventDefault();addToCart(<?php echo $p['id']; ?>)">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>