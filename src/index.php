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
      <div class="container mx-auto mt-6 px-4">
    <select id="category-filter" class="border border-gray-300 rounded-lg py-2 px-4 text-gray-700">
        <option value="">Todas las categorías</option>
        <option value="rifles">Rifles</option>
        <option value="Pistolas">Pistolas</option>
        <option value="Escopetas">Escopeta</option>
        <option value="Carabinas">Carabinas</option>
        <option value="Cuchillo">Cuchillería</option>
        <option value="Fundas">Fundas</option>
        
    </select>
</div>


      <div id="catalogo-container" class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <!-- Aquí se agregarán las tarjetas -->
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