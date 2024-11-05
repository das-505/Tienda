<?php

require_once __DIR__ . "/server/popos/Users.php";
require_once __DIR__ . "/server/daos/DatabaseController.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/output.css">
</head>

<body>

    <header>
        <?php
        require_once "./server/parts/navbar.php";
        ?>
    </header>

    <main>
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">

                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form name="action" action="server/controllers/controller.php" method="POST" class=" space-y-6">
                    <div class="mt-2">
                        <input type="hidden" name="action" value="register">
                    </div>
                                      
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input type="text" placeholder="username..." name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input type="email" placeholder="email..." name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password" placeholder="*******" name="password" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Sign In
                        </button>
                    </div>

                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2024 Acme Corp. All rights reserved.
                </p>
            </div>
        </div>

    </main>

    <footer>
        <?php
        require_once "./server/parts/footer.php";
        ?>
    </footer>

</body>

</html>