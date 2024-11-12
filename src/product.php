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