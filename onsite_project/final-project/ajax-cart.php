<?php
require_once 'config.php';
header('Content-Type: application/json');

$action = $_POST['action'] ?? '';
$id = intval($_POST['id'] ?? 0);
$qty = intval($_POST['qty'] ?? 1);

if($action === 'add' && $id) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();
    
    if($product) {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'qty' => $qty
            ];
        }
        echo json_encode(['success' => true, 'count' => cartCount()]);
        exit;
    }
}

echo json_encode(['success' => false]);
?>