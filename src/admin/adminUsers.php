<?php
    include_once './src/models/DB.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["filter"]) && !empty($_POST["keyword"])) {
        $filter = $_POST["filter"];
        $keyword = $_POST["keyword"]; 
        $users = DB::getUsersByColumn($filter, $keyword);
    } else {
        $users = DB::getAllUsers();
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/adminCSS/adminUsers.css">
    <form id="simpleForm" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=adminUsers"; ?>" method="post">
        <div class="search">
            <p>Flitrar por:</p>
            <select name="filter" id="">
                <option value="nickname">Username</option>
                <option value="name">Nombre</option>
                <option value="lastname1">Apellido</option>
                <option value="email">Email</option>
                <option value="rol">Rol</option>
                <option value="activo">Activo</option>
            </select>
            <div class="field">
                <input type="text" name="keyword" id="password" placeholder="Introduce las palabras clave">
                <i class="fa-solid fa-magnifying-glass searchButton" id="bSimpleSearch""></i>
            </div>
            <div class="avanzada" id="bAdvSearch">
                <p>Añadir Usuario</p>
                <i class="fa-solid fa-user-plus"></i>
            </div>
        </div>
    </form>
    <div class="booksCont">
        <div class="rowNames">
            <p>Username</p>
            <p>Nombre</p>
            <p>Email</p>
            <p>Fecha Registro</p>
            <p>Rol</p>
            <p class="available">Activada</p>
        </div>
        <hr>
        <div class="books">
            <?php foreach ($users as $user) {?>
                <a href="?ruta=singleBook&id=<?php echo $user["id"];?>" class="book">
                        <p><?php echo $user["nickname"]; ?></p>
                        <p><?php echo $user["name"]; ?></p>
                        <p><?php echo $user["email"]; ?></p>
                        <p><?php echo $user["signup_date"]; ?></p>
                        <p><?php echo $user["rol"]; ?></p>
                        <p class="available"><?php echo ($user["unsubscribe_date"] ? "NO" : "SI"); ?></p>
                </a>
            <?php } ?>
        </div>
    </div>
    

    <script src="./public/js/adminUsers.js"></script>
</main>