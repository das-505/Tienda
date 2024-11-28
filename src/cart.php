<?php
session_start();
require_once __DIR__ . "/../popos/Product.php";

$cartItems = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="./public/css/output.css">
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if (!empty($cartItems)): ?>
        <ul>
            <?php foreach ($cartItems as $item): 
                $product = unserialize($item);
            ?>
                <li>
                    <h3><?php echo $product->getName(); ?></h3>
                    <p>Precio: <?php echo $product->getPrice(); ?> €</p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</body>
</html>
