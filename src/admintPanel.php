<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
    <link rel="stylesheet" href="./public/css/output.css">
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Insertar Nuevo Producto</h1>

        <form action="server/controllers/controller.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            <input type="hidden" name="action" value="insert_product">
            <div>
                <label for="nameProduct" class="block text-sm font-semibold text-gray-700 mb-1">Nombre del Producto</label>
                <input type="text" name="nameProduct" id="nameProduct" placeholder="Nombre del producto" class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
            </div>

            <div>
                <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Precio</label>
                <input type="text" name="price" id="price" placeholder="€0.00" pattern="^\$?\d+(\.\d{1,2})?$" class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
                <textarea id="description"  name="description" placeholder="Describe el producto" class="w-full p-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-none"></textarea>
            </div>

            <div>
                <label for="product_avatar" class="block text-sm font-semibold text-gray-700 mb-1">Imagen del Producto</label>
                <input type="file" name="product_avatar" id="product_avatar" class="w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Guardar Producto</button>
            </div>
        </form>
    </div>
</body>

</html>