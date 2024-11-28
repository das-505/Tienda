<?php
require_once __DIR__ . "/server/actions/ActionGetProduct.php";
require_once __DIR__ . "/server/actions/ActionDeleteProduct.php";


$getUser = new ActionGetProduct();
$getUsers = $getUser->getUsers();
?>
<link rel="stylesheet" href="./public/css/output.css">

<header class="bg-gray-800 text-white py-4">
    <?php require_once "./server/parts/navbar.php"; ?>
</header>

<h1 class="text-2xl font-bold text-center text-amber-800 mb-6">Usuarios registrados</h1>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Mobile</th>
            <th scope="col" class="px-6 py-3">email</th>
            <th scope="col" class="px-6 py-3">Is_admin</th>
            <th scope="col" class="px-6 py-3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($getUsers as $users): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4"><?php echo htmlspecialchars($users['id']); ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($users['name']); ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($users['mobilenumber']); ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($users['email']); ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($users['is_admin']); ?></td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="server/controllers/controller.php" method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="deleteUser">
                        <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
                        <button
                            type="submit"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="adminPanel.php">
        <button type="submit"
            class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
            Admin User
        </button>
    </a>

<footer class="bg-gray-800 text-white text-center py-4">
    <?php require_once "./server/parts/footer.php"; ?>
</footer>