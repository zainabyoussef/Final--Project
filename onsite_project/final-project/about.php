<?php
$pageTitle = 'About Us';
include 'header.php';
?>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4">
            <img src="https://images.unsplash.com/photo-1615655406736-b37c4fabf923?w=800" class="img-fluid rounded-4 shadow" alt="About">
        </div>
        <div class="col-lg-6">
            <h1 class="mb-4">Our Story</h1>
            <p class="lead">Luxe Accessories was founded with a mission to provide beautiful, high-quality fashion accessories.</p>
            <p>We believe style and elegance go hand in hand. Each piece is carefully selected to ensure quality and lasting appeal.</p>
            <div class="mt-4 p-4 bg-light rounded-4">
                <h5>Why Choose Us?</h5>
                <ul class="list-unstyled mb-0">
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Handpicked quality products</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Affordable prices</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Fast shipping</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="card bg-dark text-white text-center p-5">
        <i class="bi bi-code-slash display-1 mb-3" style="color: var(--primary);"></i>
        <h3>About This Website</h3>
        <p class="lead">Built with PHP, MySQL, and Bootstrap by <?php echo DEV_NAME; ?></p>
        <a href="<?php echo DEV_URL; ?>" class="btn btn-primary" target="_blank">View Portfolio</a>
    </div>
</div>

<?php include 'footer.php'; ?>