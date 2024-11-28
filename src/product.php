<?php
require_once __DIR__ . "/server/popos/Product.php";
require_once __DIR__ . "/server/actions/ActionGetProduct.php";


$productToShow = null;
$productAction = new ActionGetProduct();

// Verificar si se proporcionó el ID del producto
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

  $productId = intval($_GET["id"]);

  $productData = $productAction->getProductById($productId);

  // Verificamos que el producto seleccionado exista.
  if ($productData) {
    //Asignar los datos del product.
    $productToShow = new Product();
    $productToShow->setId($productData['id']);
    $productToShow->setName($productData['name']);
    $productToShow->setDescription($productData['description']);
    $productToShow->setPrice($productData['price']);
    $productToShow->setImage($productData['image_path']);
  } else {
    echo "Este producto no existe!";
    exit;
  }
} else {
  echo "El ID del producto no es válido!";
  exit;
}

$discountPercentage = 10;
$discountedPrice = $productToShow->getPrice() * (2 - $discountPercentage / 100);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producto - <?php echo $productToShow->getName(); ?> </title>
  <link rel="stylesheet" href="./public/css/output.css">
  <script src="server/actions/ActionAddToCart.php" defer></script>
  <script src="public/js/ajaxAddToCart.js" defer></script>
  <style>
    /* Animación suave para el cambio de imagen */
    #mainImage {
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    #mainImage:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body class="bg-gray-100">
  <!-- Contenedor principal -->
  <div class="min-h-screen flex flex-col">

    <!-- Encabezado -->
    <?php
    require_once "./server/parts/navbar.php";

    ?>


    <!-- Contenido principal -->
    <main class="flex-grow container mx-auto p-6">
      <?php if ($productToShow): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white p-6 rounded-lg shadow-2xl">

          <!-- Imágenes del producto -->
          <div class="flex flex-col items-center">
            <!-- Imagen principal -->
            <img id="mainImage" src="<?php echo $productToShow->getImage(); ?>" alt="Rifle Mossberg Patriot" class="w-full h-auto mb-4 rounded-lg shadow-lg">
          </div>

          <!-- Descripción del producto -->
          <div class="md:col-span-2 flex flex-col justify-between">
            <div>
              <!-- Título y referencia -->
              <h2 class="text-4xl font-bold text-gray-800 mb-4 border-b-2 border-gray-200 pb-2"><?php echo $productToShow->getName(); ?></h2>
              <p class="text-gray-600 text-lg mb-4">Referencia: <span class="font-semibold"> <?php echo $productToShow->getId(); ?> </span></p>

              <!-- Descripción -->
              <p class="text-gray-700 text-lg leading-relaxed mb-6">
                <?php echo $productToShow->getDescription(); ?>
              </p>
              <p class="font-semibold text-gray-800 text-lg mb-4">Condiciones de compra: +25</p>
              <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
                <li>Acepto que debo enviar la foto del DNI y Licencia de Armas por Email o Whatsapp.</li>
                <li>No se aceptan cambios o devoluciones.</li>
              </ul>
            </div>

            <!-- Precio y botón de compra -->
            <div class="mt-6 border-t-2 border-gray-200 pt-4">
              <p class="text-2xl font-bold text-red-500 line-through"> <?php echo number_format($discountedPrice, 2); ?> €</p>
              <p class="text-4xl font-bold text-gray-800 mb-4"><?php echo number_format($productToShow->getPrice(), 2); ?> €</p>

              <div class="flex items-center space-x-4">
                <input type="number" value="1" min="1" class="w-16 text-center border border-gray-300 rounded-md shadow-md">

                <button onclick="addToCart(<?php echo $productToShow->getId(); ?>, '<?php echo $productToShow->getName(); ?>', <?php echo $productToShow->getPrice(); ?>)"  class="flex-grow bg-blue-600 text-white text-lg font-semibold
                 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition flex items-center justify-center">
                  <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 13H4L3 3zm1 16h16m-8-8v8" />
                  </svg>
                  Add to Cart
                </button>

              </div>

            </div>
          </div>
        </div>
      <?php endif; ?>
    </main>



    <footer>
      <?php
      require_once "./server/parts/footer.php";
      ?>
    </footer>
  </div>



  <!-- Script para cambiar de imagen -->
  <script>
    function changeImage(src) {
      document.getElementById('mainImage').src = src;
    }
  </script>


</body>

</html>