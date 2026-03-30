<?php
$pageTitle = 'Elegant Accessories';
include 'header.php';

$featured = array_slice(getProducts(), 0, 12);
$categories = getCategories();
?>

<!-- Hero -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-white text-dark mb-3 px-3 py-2 shadow-sm">Latest Accessories Launch</span>
                <h1 class="display-3 fw-bold mb-4" style="color: var(--secondary);">Premium Accessories to Elevate Your Style</h1>
                <p class="lead mb-4 text-muted">Explore a rich collection of necklaces, bracelets, rings, and curated gift sets.</p>
                <a href="shop.php" class="btn btn-primary btn-lg px-5">Start Shopping <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1522312346375-d1a52e2b99b3?w=1200" class="img-fluid rounded-4 shadow-lg" alt="Stylish Accessories Collection">
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Shop by Category</h2>
        <div class="row g-4">
            <?php foreach($categories as $cat): ?>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="shop.php?category=<?php echo $cat['slug']; ?>" class="text-decoration-none">
                    <div class="category-card h-100">
                        <i class="bi bi-gem fs-2 mb-3" style="color: var(--primary);"></i>
                        <h6 class="mb-0 text-dark"><?php echo $cat['name']; ?></h6>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- New Arrivals -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="mb-0">New Arrivals</h2>
            <a href="shop.php" class="btn btn-outline-primary">Browse Catalog</a>
        </div>
        <div class="row g-4">
            <?php foreach($featured as $p): ?>
            <div class="col-6 col-lg-3">
                <div class="product-card h-100">
                    <div class="position-relative">
                        <img src="<?php echo $p['image']; ?>" class="product-img" alt="<?php echo $p['name']; ?>">
                        <?php if($p['featured']): ?>
                        <span class="badge position-absolute top-0 start-0 m-2" style="background: var(--primary);">Featured</span>
                        <?php endif; ?>
                    </div>
                    <div class="p-3">
                        <small class="text-muted"><?php echo $p['category_name']; ?></small>
                        <h6 class="mt-1 mb-2"><?php echo $p['name']; ?></h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">$<?php echo number_format($p['price'],2); ?></span>
                            <button class="btn btn-sm btn-primary" onclick="addToCart(<?php echo $p['id']; ?>)">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <i class="bi bi-truck fs-1 mb-3" style="color: var(--primary);"></i>
                <h5>Free Shipping</h5>
                <p class="text-muted small">On orders over $50</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-shield-check fs-1 mb-3" style="color: var(--primary);"></i>
                <h5>Secure Payment</h5>
                <p class="text-muted small">100% secure checkout</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-gift fs-1 mb-3" style="color: var(--primary);"></i>
                <h5>Gift Wrapping</h5>
                <p class="text-muted small">Free on request</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-heart fs-1 mb-3" style="color: var(--primary);"></i>
                <h5>Made with Love</h5>
                <p class="text-muted small">Every piece is special</p>
            </div>
        </div>
    </div>
</section>

<!-- Developer -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container">
        <i class="bi bi-code-square display-1 mb-4" style="color: var(--primary);"></i>
        <h2>About This Project</h2>
        <p class="lead mb-4">This e-commerce website was built with PHP, MySQL, and Bootstrap. A professional store for premium fashion accessories.</p>
        <a href="<?php echo DEV_URL; ?>" class="btn btn-primary btn-lg" target="_blank">
            <i class="bi bi-person-workspace me-2"></i>View My Portfolio
        </a>
        <p class="mt-4 mb-0 opacity-75"><i class="bi bi-heart-fill text-danger me-2"></i>Crafted by <?php echo DEV_NAME; ?></p>
    </div>
</section>

<?php include 'footer.php'; ?>