<?php
$pageTitle = 'Contact Us';
include 'header.php';
$success = isset($_POST['submit']);
?>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-6">
            <h2 class="mb-4">Get in Touch</h2>
            <?php if($success): ?>
                <div class="alert alert-success">Thank you! Your message has been sent.</div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Send Message</button>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100 p-4">
                <h5 class="mb-4">Contact Info</h5>
                <p><i class="bi bi-geo-alt me-2" style="color: var(--primary);"></i>123 Fashion Avenue, NY</p>
                <p><i class="bi bi-envelope me-2" style="color: var(--primary);"></i>hello@luxeaccessories.com</p>
                <p><i class="bi bi-phone me-2" style="color: var(--primary);"></i>+1 555 123 4567</p>
                <hr>
                <p class="small text-muted">Website by <a href="<?php echo DEV_URL; ?>"><?php echo DEV_NAME; ?></a></p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>