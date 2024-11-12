<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
</head>
<body>
    <h1>Insertar Nuevo Producto</h1>
    <form action="insertProduct.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="price">Precio:</label>
        <input type="number" step="0.01" name="price" id="price" required><br>

        <label for="img">Imagen del Producto:</label>
        <input type="file" name="img" id="img" accept="image/*" required><br><br>

        <button type="submit">Insertar Producto</button>
    </form>
</body>
</html>
