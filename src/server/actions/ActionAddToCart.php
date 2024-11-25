<?php
require_once __DIR__ . "/../daos/DatabaseController.php";
require_once __DIR__ . "/../controllers/controller.php";


class ActionAddToCar implements IAction
{


    public function execute($post)
    {
        session_start();

        $productId = $post['id'] ?? null;
        if (!$productId) {
            echo "No product id provided";
            return;
        }

        $_SESSION['cart'][$productId] = ($_SESSION['cart']['$productId'] ?? 0) + 1;
        echo "Product added to cart.";
    }
}

?>