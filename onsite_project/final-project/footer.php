    </main>

    <footer class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="mb-3"><i class="bi bi-moon-stars-fill me-2" style="color: var(--primary);"></i>Luxe Accessories</h4>
                    <p class="opacity-75">Premium accessories for timeless style. Designed with quality and a polished look.</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-pinterest fs-5"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="mb-3">Shop</h6>
                    <ul class="list-unstyled">
                        <li><a href="shop.php" class="text-white-50 text-decoration-none">All Products</a></li>
                        <li><a href="shop.php?category=hijab-pins" class="text-white-50 text-decoration-none">Hijab Pins</a></li>
                        <li><a href="shop.php?category=tasbih" class="text-white-50 text-decoration-none">Tasbih</a></li>
                        <li><a href="shop.php?category=gifts" class="text-white-50 text-decoration-none">Gift Sets</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="mb-3">Help</h6>
                    <ul class="list-unstyled">
                        <li><a href="about.php" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="contact.php" class="text-white-50 text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Shipping</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Returns</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Newsletter</h6>
                    <p class="small text-white-50">Subscribe for exclusive offers.</p>
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control" placeholder="Your email">
                        <button class="btn btn-primary"><i class="bi bi-arrow-right"></i></button>
                    </form>
                </div>
            </div>
            
            <div class="dev-signature">
                <p class="mb-2">
                    <i class="bi bi-code-slash"></i> Designed & Developed with <i class="bi bi-heart-fill"></i> by 
                    <a href="<?php echo DEV_URL; ?>" target="_blank"><?php echo DEV_NAME; ?></a>
                </p>
                <p class="small text-white-50 mb-0">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <div class="toast-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addToCart(id) {
            fetch('ajax-cart.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'action=add&id=' + id
            })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    showToast('Added to cart!');
                    updateCart(data.count);
                }
            });
        }
        
        function updateCart(count) {
            let badge = document.querySelector('.cart-badge');
            if(!badge) {
                badge = document.createElement('span');
                badge.className = 'cart-badge';
                document.querySelector('.bi-bag').parentNode.appendChild(badge);
            }
            badge.textContent = count;
            badge.style.display = count > 0 ? 'block' : 'none';
        }
        
        function showToast(msg) {
            const container = document.querySelector('.toast-container');
            const toast = document.createElement('div');
            toast.className = 'alert alert-success alert-dismissible fade show';
            toast.innerHTML = msg + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            container.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
    </script>
    <script>
        console.log('%c Luxe Accessories ', 'background: #c9a227; color: white; font-size: 20px; padding: 10px; border-radius: 5px;');
        console.log('%c Developed by <?php echo DEV_NAME; ?> ', 'color: #c9a227; font-size: 14px;');
    </script>
</body>
</html>