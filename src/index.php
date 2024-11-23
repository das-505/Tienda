<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My web</title>

  <link rel="stylesheet" href="./public/css/output.css">

</head>

<body>



  <!--contenedor-->
  <div class="min-h-screen flex flex-col" name="conteiner">

    <header>
      <?php
      require_once "./server/parts/navbar.php";
      ?>
    </header>

    <!-- Contenido principal de la página -->
    <main class="flex-grow">

      <!--para filtrar-->
      <div class="container mx-auto mt-10 px-4">
        <h1 class="text-center text-3xl font-bold text-gray-800">Buscar Productos</h1>
        <form class="mt-6" method="POST" onsubmit="solicitarCatalogo(); return false;">
          <div class="flex flex-col sm:flex-row items-center justify-center">
            <div class="w-full sm:w-auto mb-4 sm:mb-0">
              <input
                type="text"
                class="w-full sm:w-auto border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="busqueda-producto"
                placeholder="Escribe el nombre del producto"
                required>
            </div>
            <div class="w-full sm:w-auto sm:ml-4">
              <button
                type="submit"
                class="w-full sm:w-auto bg-blue-600 text-white font-semibold rounded-lg py-2 px-4 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Buscar
              </button>
            </div>
          </div>
        </form>
      </div>

      <div id="catalogo-container" class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <!-- Aquí se agregarán las tarjetas dinámicamente -->
      </div>

    </main>

    <footer>
      <?php
      require_once "./server/parts/footer.php";
      ?>
    </footer>

    <script src="public/js/ajaxProduct.js" defer></script>

  </div>
</body>

</html>