<?php
    include_once './src/models/DB.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["filter"]) && !empty($_POST["keyword"])) {
        $filter = $_POST["filter"];
        $keyword = $_POST["keyword"]; 
        $books = DB::getAdminBooksByColumn($filter, $keyword);
    } else {
        $books = DB::getAdminBooks();
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/adminCSS/adminBooks.css">
    <form id="simpleForm" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=adminBooks"; ?>" method="post">
        <div class="search">
            <p>Flitrar por:</p>
            <select name="filter" id="">
                <option value="title">Título</option>
                <option value="author">Autor</option>
                <option value="genre">Género</option>
                <option value="language">Idioma</option>
                <option value="VECES_PRESTADO">Nº Préstamos</option>
            </select>
            <div class="field">
                <input type="text" name="keyword" id="password" placeholder="Introduce las palabras clave">
                <i class="fa-solid fa-magnifying-glass searchButton" id="bSimpleSearch""></i>
            </div>
            <a href="?ruta=adminAddBook" class="avanzada" id="bAdvSearch">
                <p>Añadir Libro</p>
                <i class="fa-solid fa-book"></i>
            </a>
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
                <a href="?ruta=adminSingleBook&id=<?php echo $book["id"];?>" class="book">
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