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
    <div class="flex">

      <!-- Panel lateral de filtros -->
      <aside class="w-1/4 bg-gray-100 p-4 border-r border-gray-300">
        <h2 class="text-lg font-semibold mb-4">Filtros</h2>

        <!-- Filtro por categoría -->
        <div class="mb-6">
          <label for="category-filter" class="block text-sm font-medium text-gray-700 mb-2">Categoría:</label>
          <select id="category-filter" class="border border-gray-300 rounded-lg py-2 px-4 text-gray-700 w-full">
            <option value="">Todas las categorías</option>
            <option value="rifles">Rifles</option>
            <option value="Pistolas">Pistolas</option>
            <option value="Escopetas">Escopetas</option>
            <option value="Carabinas">Carabinas</option>
            <option value="Cuchillos">Cuchillos</option>
            <option value="Fundas">Fundas</option>
          </select>
        </div>

        <!-- Filtro por precio -->
        <div>
          <label for="min-price" class="block text-sm font-medium text-gray-700 mb-2">Precio mínimo:</label>
          <input type="number" id="min-price" class="border border-gray-300 rounded-lg py-2 px-4 w-full mb-4">

          <label for="max-price" class="block text-sm font-medium text-gray-700 mb-2">Precio máximo:</label>
          <input type="number" id="max-price" class="border border-gray-300 rounded-lg py-2 px-4 w-full mb-4">

          <button id="filter-price" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 w-full">
            Filtrar por precio
          </button>
        </div>
      </aside>

      <!-- Contenido principal (catálogo) -->
      <section class="flex-grow p-4">
        <div id="catalogo-container" class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
          <!-- Aquí se agregarán las tarjetas -->
        </div>
      </section>

    </div>
  </main>

  <footer>
    <?php
    require_once "./server/parts/footer.php";
    ?>
  </footer>

  <script src="public/js/ajaxProduct.js" defer></script>

</div>

    <script src="public/js/ajaxProduct.js" defer></script>

  </div>
</body>

</html>