<?php

require_once __DIR__ . "/server/popos/Users.php";
require_once __DIR__ . "/server/daos/DatabaseController.php";

    session_start();
    
    $tablename = "users";
    $db = new DatabaseController();
    $allUsers = $db->getAll($tablename);
    echo print_r($allUsers[0]["email"]);
    $db->close();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My web</title>
  <link rel="stylesheet" href="./public/css/output.css">
</head>

<body>
  <div class="" name="footerConteiner">
    <header>
      <?php
      require_once "./server/parts/navbar.php";
      ?>
    </header>



    <main>
      <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="server/controllers/controller.php" method="POST">
          
            <div class="mt-2">
                <input type="hidden" name="action" value="login">
            </div>

            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="Email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              </div>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
          </form>

          <p class="mt-10 text-center text-sm text-gray-500">
            Not a member?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
          </p>
        </div>
      </div>
    </main>


    <footer>
      <?php
      require_once "./server/parts/footer.php";
      ?>
    </footer>

  </div>
</body>

</html>