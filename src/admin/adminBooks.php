<?php
    include_once './src/models/DB.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["filter"]) && !empty($_POST["keyword"])) {
        $filter = $_POST["filter"];
        $keyword = $_POST["keyword"]; 
        $books = DB::getBookByColumn($filter, $keyword);
    } else {
        $books = DB::getAdminBooks();
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
                <p>Añadir Libro</p>
                <i class="fa-solid fa-book"></i>
            </div>
        </div>
    </form>
    <div class="booksCont">
        <div class="rowNames">
            <p>Título</p>
            <p>Autor</p>
            <p>Género</p>
            <p>Idioma</p>
            <p>Veces Prestado</p>
            <p class="available">Disponible</p>
        </div>
        <hr>
        <div class="books">
            <?php foreach ($books as $book) {?>
                <a href="?ruta=singleBook&id=<?php echo $book["id"];?>" class="book">
                        <p><?php echo $book["title"]; ?></p>
                        <p><?php echo $book["author"]; ?></p>
                        <p><?php echo $book["genre"]; ?></p>
                        <p><?php echo $book["language"]; ?></p>
                        <p><?php echo $book["VECES_PRESTADO"]; ?></p>
                        <p class="available"><?php echo ($book["available"] ? "SI" : "NO"); ?></p>
                </a>
            <?php } ?>
        </div>
    </div>
    

    <script src="./public/js/adminUsers.js"></script>
</main>