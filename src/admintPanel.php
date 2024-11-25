<?php
require_once __DIR__ . "/server/actions/ActionGetProduct.php";
require_once __DIR__ . "/server/actions/ActionDeleteProduct.php";

session_start();

if(!isset($_SESSION["logged_user"])){
    header("Location: login.php");
    exit;
}

$loggedUser = unserialize($_SESSION["logged_user"]);

if(!$loggedUser instanceof Admin || !$loggedUser->isAdmin){
    echo "Access Denied!";
    exit;
}

// Variables que nos permitirán mostrar los productos de la base de datos.
$getPro = new ActionGetProduct();
$products = $getPro->getProduct();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
    <link rel="stylesheet" href="./public/css/output.css">
</head>

<body class="bg-gray-900 min-h-screen flex flex-col justify-between">

    <!-- Header -->
    <header class="bg-gray-800 text-white py-4">
        <?php require_once "./server/parts/navbar.php"; ?>
    </header>

    <!-- Contenedor principal -->
    <main class="flex flex-col lg:flex-row gap-6 px-6 py-8 w-full flex-grow">
        <!-- Formulario -->
        <section class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full mx-auto lg:mx-0">
            <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Insertar Nuevo Producto</h1>

            <form action="server/controllers/controller.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="action" value="insert_product">

                <div>
                    <label for="nameProduct" class="block text-sm font-semibold text-gray-700 mb-1">Nombre del Producto</label>
                    <input type="text" name="nameProduct" id="nameProduct" placeholder="Nombre del producto"
                        class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                </div>

                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Precio</label>
                    <input type="text" name="price" id="price" placeholder="€0.00"
                        pattern="^\$?\d+(\.\d{1,9})?$"
                        class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                </div>

                <div>
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-1">Categoría del Producto</label>
                    <input type="text" name="category" id="category" placeholder="Categoría del producto"
                        class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
                    <textarea id="description" name="description" placeholder="Describe el producto"
                        class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-none"></textarea>
                </div>

                <div>
                    <label for="product_avatar" class="block text-sm font-semibold text-gray-700 mb-1">Imagen del Producto</label>
                    <input type="file" name="product_avatar" id="product_avatar"
                        class="w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                        Guardar Producto
                    </button>
                </div>
            </form>
        </section>

        <!-- Tabla -->
        <section class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-900 p-4 w-full">
            <h1 class="text-2xl font-bold text-center text-white mb-6">Productos disponibles</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Categoría</th>
                        <th scope="col" class="px-6 py-3">Precio</th>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($product['name']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($product['id']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($product['category']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($product['price']); ?></td>
                            <td class="px-6 py-4">
                                <?php if (!empty($product['image_path'])): ?>
                                    <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="producto" class="w-16 h-16 object-cover">
                                <?php else: ?>
                                    Sin Imagen
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($product['description']); ?></td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="server/controllers/controller.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="deleteProduct">
                                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                    <button
                                        type="submit"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Botón Admin Users -->
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <?php require_once "./server/parts/footer.php"; ?>
    </footer>

</body>

</html>