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

    <?php
    require_once("server/parts/navbar.php");
    $loggedUser = null;
    if (isset($_SESSION["logged_user"]))
        $loggedUser = $_SESSION["logged_user"];

    if ($loggedUser == null) {
        header('Location: index.php');
        exit();
    }
    ?>

    hola
</body>
<!--estoy probando cosas nada importante-->
</html>
