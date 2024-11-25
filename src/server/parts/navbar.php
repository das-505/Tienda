<?php
require_once __DIR__ . "/../popos/users.php";
require_once __DIR__ . "/../popos/Admin.php";

if (session_status() === PHP_SESSION_NONE)
  session_start();

$loggedUser = null;
if (isset($_SESSION["logged_user"]))
  $loggedUser = unserialize($_SESSION["logged_user"]);
?>

<nav class="bg-gray-800 shadow-md">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Menú móvil -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>

      <!-- Logo y Links principales -->
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto rounded-md" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="index.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-500 transition">Home</a>
            <a href="product.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-indigo-500 hover:text-white transition">Products</a>
          </div>
        </div>
      </div>

      <!-- Iconos y Menú de Usuario -->
      <div class="absolute inset-y-0 right-0 flex items-center space-x-4 pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <!-- Carrito de compras -->
          
          <a href="shoppingCart.php">
        <button id="shopping-card-button" type="button" class="relative rounded-full p-2 bg-gray-700 text-gray-400 hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 transition">
          <span class="sr-only">Shopping basket</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l3-8H6.4M7 13l-1.5 5.5m11-5.5L16.5 18.5M7 18a1.5 1.5 0 1 0 3 0a1.5 1.5 0 0 0-3 0m10 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 0 0-3 0" />
          </svg> 
          </button></a>

        <!-- Menú de usuario -->
        <?php if ($loggedUser != null) { ?>
          <div class="relative">
            <button id="user-menu-button" type="button" class="flex items-center rounded-full bg-gray-700 p-2 text-sm text-gray-300 hover:text-white hover:bg-gray-600 transition focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="mr-2 text-white font-medium"><?php echo htmlspecialchars($loggedUser->getUsername()); ?></span>
              <svg class="h-6 w-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
              </svg>
            </button>
            <!-- Menú desplegable -->
            <div id="user-dropdown-menu" class="hidden absolute right-0 z-20 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
              <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
              <?php if($loggedUser instanceof Admin && $loggedUser->isAdmin) {?>
                <a href="admintPanel.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">AdmintPanel</a>
              <?php } ?>
              <a href="settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
              <form action="server/controllers/controller.php" method="POST">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
              </form>
            </div>
          </div>
        <?php } else { ?>
          <a href="login.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-indigo-500 hover:text-white transition">Log in</a>
          <a href="registro.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-indigo-500 hover:text-white transition">Sign in</a>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Menú móvil -->
  <div class="hidden sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <a href="index.php" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Home</a>
      <?php if ($loggedUser != null) { ?>
        <a href="profile.php" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Profile</a>
        <a href="settings.php" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Settings</a>
        <form action="server/controllers/controller.php" method="POST">
          <input type="hidden" name="action" value="logout">
          <button type="submit" class="block w-full text-left px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Logout</button>
        </form>
      <?php } else { ?>
        <a href="login.php" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log in</a>
        <a href="registro.php" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Sign in</a>
      <?php } ?>
    </div>
  </div>
</nav>

<script>
  // Toggle para menú móvil
  document.getElementById('mobile-menu-button').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });

  // Toggle para menú de usuario
  document.getElementById('user-menu-button').addEventListener('click', function() {
    const dropdown = document.getElementById('user-dropdown-menu');
    dropdown.classList.toggle('hidden');
  });
</script>
