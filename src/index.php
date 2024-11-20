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
     
      <div class="container bg-white ">
        <div id="catalogo-container-row" class="row">


        </div>
      </div>

      <div id="card-ejemplo" class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <h2 id="card-title" class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

          <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div id="card-base" class="group relative">
              <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="https://www.blackrecon.com/media/catalog/product/cache/e4ddaa721414f8f0bc6bc4a75ae93d16/p/i/pistola-smith-wesson-mp9-m20-metal-nts-4-25-miras-altas_1.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
              </div>
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700">
                    <a href="product.php" id="card-text">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Pistola Smith & Wesson M&P9 M2.0 metal NTS 4.25
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">€1354,70</p>
                </div>
              </div>
            </div>

            <!-- More products... -->
          </div>
        </div>
      </div>



    </main>

    <footer>
      <?php
      require_once "./server/parts/footer.php";
      ?>
    </footer>

    <script src="public/js/ajaxProduct.js"></script>

  </div>
</body>

</html>