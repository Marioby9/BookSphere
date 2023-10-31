<?php
    include_once './src/models/DB.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["filter"]) && !empty($_POST["keyword"])) {
        $filter = $_POST["filter"];
        $keyword = $_POST["keyword"]; 
        $books = DB::getBookByColumn($filter, $keyword);
    } else {
        $books = DB::getAllBooks();
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/catalogo.css">
    <form id="form" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=catalogo"; ?>" method="post">
        <div class="search">
            <p>Flitrar por:</p>
            <select name="filter" id="">
                <option value="title">Título</option>
                <option value="author">Autor</option>
                <option value="isbn">ISBN</option>
                <option value="publisher">Editorial</option>
                <option value="genre">Género</option>
            </select>
            <div class="field">
                <input type="text" name="keyword" id="password" placeholder="Introduce las palabras clave">
                <i class="fa-solid fa-magnifying-glass searchButton" onclick="submitForm()"></i>
            </div>
            <div class="avanzada">
                <p>Búsqueda avanzada</p>
                <i class="fa-solid fa-filter"></i>
            </div>
        </div>
    </form>
    <div class="booksCont">
        <div class="rowNames">
            <p>Título</p>
            <p>Autor</p>
            <p>Editorial</p>
            <p>Idioma</p>
            <p>Género</p>
            <p class="available">Disponible</p>
        </div>
        <hr>
        <div class="books">
            <?php foreach ($books as $book) {?>
                <div class="book">
                        <p><?php echo $book["title"]; ?></p>
                        <p><?php echo $book["author"]; ?></p>
                        <p><?php echo $book["publisher"]; ?></p>
                        <p><?php echo $book["language"]; ?></p>
                        <p><?php echo $book["genre"]; ?></p>
                        <p class="available"><?php echo $book["available"]; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
            function submitForm() {
                document.getElementById("form").submit();
            }
    </script>

</main>