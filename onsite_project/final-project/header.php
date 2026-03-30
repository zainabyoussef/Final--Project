<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?php echo DEV_NAME; ?>">
    <meta name="developer" content="<?php echo DEV_NAME; ?>">
    <title><?php echo isset($pageTitle) ? $pageTitle.' | ' : ''; ?><?php echo SITE_NAME; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #a67c00;
            --primary-dark: #805f00;
            --secondary: #1f1f1f;
            --light: #f8f6f2;
        }
        
        body { font-family: 'Inter', sans-serif; background: var(--light); }
        h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; }
        
        .dev-bar {
            background: var(--secondary);
            color: white;
            font-size: 0.75rem;
            padding: 8px;
            text-align: center;
        }
        .dev-bar a { color: var(--primary); text-decoration: none; font-weight: 600; }
        
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--secondary) !important;
        }
        .navbar-brand span { color: var(--primary); }
        
        .nav-link {
            color: var(--secondary) !important;
            font-weight: 500;
            margin: 0 10px;
            position: relative;
        }
        .nav-link:hover { color: var(--primary) !important; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s;
        }
        .nav-link:hover::after { width: 100%; }
        
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .hero-section {
            background: linear-gradient(135deg, #f8f5f0 0%, #e8e0d5 100%);
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        .product-img {
            height: 280px;
            object-fit: cover;
            width: 100%;
        }
        .price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.3rem;
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--primary);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
        }
        
        footer {
            background: var(--secondary);
            color: white;
        }
        .dev-signature {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
        }
        .dev-signature i { color: #e74c3c; }
        .dev-signature a { color: var(--primary); text-decoration: none; font-weight: 600; }
        
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
        
        .category-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
        }
        .category-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Developer Credit -->
    <div class="dev-bar">
        <i class="bi bi-code-slash"></i> Crafted with care by <a href="<?php echo DEV_URL; ?>" target="_blank"><?php echo DEV_NAME; ?></a>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-moon-stars-fill me-2" style="color: var(--primary);"></i>Luxe<span>Accessories</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <a href="cart.php" class="btn btn-link text-dark position-relative text-decoration-none">
                    <i class="bi bi-bag fs-5"></i>
                    <?php if(cartCount() > 0): ?>
                    <span class="cart-badge"><?php echo cartCount(); ?></span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </nav>
    
    <main>