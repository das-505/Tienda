<?php
require_once __DIR__ . "/server/popos/Users.php";

//inicializacion de la sesion (si no esta inicializada  la inicializamos)
if (session_start() === PHP_SESSION_NONE)
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
    
<!--llamamos a la navbar-->
    <header>
        <?php
        require_once "./server/parts/navbar.php";
        ?>
    </header>

    <!--inicializamos la variable loggedUser a null 
    y la almacenamos con el usuario logeado -->
    <?php
    $loggedUser = null;
    if (isset($_SESSION["logged_user"]))
    //deserealizamos la variable que almacena al usuario de la sesion
        $loggedUser = unserialize($_SESSION["logged_user"]);

        //si no hay usuario logeado redirigimos al usuario al index.
    if ($loggedUser == null) {
        header('Location: ../src/index.php');
        exit();
    }
    ?>

    <div class="container mx-auto mt-10 mb-10 rounded-lg p-5 ">
        <div class="flex flex-wrap">
            <!-- Left Sidebar -->
            <div class="w-full md:w-1/4 flex flex-col items-center p-5">
                <img class="rounded-full mt-5  w-24 h-25" src="https://avatars.githubusercontent.com/u/25511379?v=4" alt="Profile Picture">
                <h2 class="font-bold text-lg mt-4"><?php echo htmlspecialchars($loggedUser->getUsername()); ?></h2>
                <p class="text-gray-500"><?php echo htmlspecialchars($loggedUser->getEmail()); ?></p>
            </div>
            <!-- Profile Settings Form -->
            <div class="w-full md:w-2/4 ">
                <h4 class="text-xl font-semibold mb-5">Profile Settings</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border rounded-md" placeholder="First name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Surname</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border rounded-md" placeholder="Surname">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mt-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border rounded-md" placeholder="Enter phone number">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Postcode</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border rounded-md" placeholder="Enter postcode">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email ID</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border rounded-md" placeholder="Enter email ID" value="<?php echo htmlspecialchars($loggedUser->getEmail()); ?>">
                    </div>

                </div>
                <div class="text-center mt-10">
                    <button class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-2 px-8 rounded-full shadow-lg transition duration-500 hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700">
                        Save Profile
                    </button>

                </div>
            </div>
        </div>
    </div>

<!--llamamos al footer-->
    <footer>
        <?php
        require_once "./server/parts/footer.php";

        ?>
    </footer>
</body>

</html>