<?php
/**
 * Noor Accessories - Islamic E-Commerce
 * Developed by: [Your Name]
 * Portfolio: [Your Website]
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'noor_accessories');

define('SITE_NAME', 'Luxe Accessories');
define('SITE_URL', 'http://localhost/luxe-accessories');
define('CURRENCY', '$');
define('DEV_NAME', 'Zainab Youssef');
define('DEV_URL', 'https://example.com');
define('DEV_EMAIL', 'zainab@example.com');

$ACCESSORY_CATEGORIES = ['hijab-pins','tasbih','jewelry','gift-sets','necklaces','bracelets','rings','accessories'];

// Database Connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Session
session_start();
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

// Helper Functions
function accessoryCategorySlugs() {
    global $ACCESSORY_CATEGORIES;
    return $ACCESSORY_CATEGORIES;
}

function getProducts($cat = null) {
    global $pdo;
    $allowed = accessoryCategorySlugs();
    $slugCondition = " AND c.slug IN ('" . implode("','", $allowed) . "')";

    $sql = "SELECT p.*, c.name as category_name FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id WHERE p.stock > 0" . $slugCondition;

    if($cat && in_array($cat, $allowed)) {
        $sql .= " AND c.slug = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cat]);
    } else {
        $sql .= " ORDER BY p.featured DESC";
        $stmt = $pdo->query($sql);
    }
    return $stmt->fetchAll();
}

function getProduct($slug) {
    global $pdo;
    $allowed = accessoryCategorySlugs();
    $slugCondition = " AND c.slug IN ('" . implode("','", $allowed) . "')";

    $stmt = $pdo->prepare("SELECT p.*, c.name as category_name FROM products p 
                          LEFT JOIN categories c ON p.category_id = c.id 
                          WHERE p.slug = ?" . $slugCondition);
    $stmt->execute([$slug]);
    return $stmt->fetch();
}

function getCategories() {
    global $pdo;
    $allowed = accessoryCategorySlugs();
    return $pdo->query("SELECT * FROM categories WHERE slug IN ('" . implode("','", $allowed) . "')")->fetchAll();
}

function cartCount() {
    return array_sum(array_column($_SESSION['cart'], 'qty'));
}

function cartTotal() {
    $total = 0;
    foreach($_SESSION['cart'] as $item) $total += $item['price'] * $item['qty'];
    return $total;
}
?>