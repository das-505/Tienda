<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producto - Rifle Mossberg Patriot</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <!-- Contenedor principal -->
  <div class="min-h-screen flex flex-col">

    <!-- Encabezado -->
    <header>
      <?php
      require_once "./server/parts/navbar.php";
      ?>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow container mx-auto p-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white p-6 rounded-lg shadow-lg">

        <!-- Imágenes del producto -->
        <div class="flex flex-col items-center">
          <!-- Imagen principal -->
          <img id="mainImage" src="public/img/rifle-de-cerrojo-ruger-american-rifle-standard-30-06.jpg" alt="Rifle Mossberg Patriot" class="w-full h-auto mb-4 rounded-lg shadow-md">

          <!-- Miniaturas -->
          <div class="flex space-x-4">
            <img onclick="changeImage('public/img/blackrecon-equipo-militar-miltec-mochila-us-assault-laser-cut-coyote_1_1.jpg')" src="public/img/carabina-gsg-16-calibre-22lr_1.jpg" alt="Miniatura 1" class="w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
            <img onclick="changeImage('public/img/rifle-tactico-ruger-precision-308-win.jpg')" src="public/img/rifle-tactico-ruger-precision-308-win.jpg" alt="Miniatura 2" class="w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
            <img onclick="changeImage('public/img/rifle-de-cerrojo-ruger-american-rifle-standard-30-06.jpg')" src="public/img/rifle-de-cerrojo-ruger-american-rifle-standard-30-06.jpg" alt="Miniatura 3" class="w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
          </div>
        </div>
        <!-- Descripción del producto -->
        <div class="md:col-span-2 flex flex-col justify-between">
          <div>
            <!-- Título y referencia -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Rifle de cerrojo Mossberg Patriot Synthetic OD 270 Win</h2>
            <p class="text-gray-600 text-lg mb-2">Referencia: <span class="font-semibold">74389</span></p>

            <!-- Descripción -->
            <p class="text-gray-700 text-base leading-relaxed">
              El Mossberg Patriot Synthetic OD es un rifle de cerrojo de gran calidad que está dentro de los modelos más conocidos para caza, gracias a su buena resistencia y su precisión.
              Este rifle dispara munición de calibre 270 Win y cuenta con un cañón flotante acanalado de 22" de longitud.
            </p>
            <p class="mt-4 font-bold text-gray-800">Condiciones de compra:</p>
            <ul class="list-disc list-inside text-gray-700">
              <li>Acepto que debo enviar la foto del DNI y Licencia de Armas por Email o Whatsapp.</li>
              <li>No se aceptan cambios o devoluciones.</li>
            </ul>
          </div>

          <!-- Precio y botón de acción -->
          <div class="mt-6">
            <p class="text-2xl font-bold text-red-500 line-through">710,00 €</p>
            <p class="text-3xl font-bold text-gray-800">705,25 €</p>
            <div class="mt-4 flex items-center space-x-4">
              <input type="number" value="1" min="1" class="w-16 text-center border border-gray-300 rounded-md">
              <button class="flex-grow bg-blue-600 text-white text-lg font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
                Comprar
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Pie de página -->
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