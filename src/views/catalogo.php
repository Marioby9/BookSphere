<?php

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
    <form id="simpleForm" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=catalogo"; ?>" method="post">
        <div class="search">
            <p>Flitrar por:</p>
            <select name="filter" id="">
                <option value="title">Título</option>
                <option value="author">Autor</option>
                <option value="isbn">ISBN</option>
                <option value="publisher">Editorial</option>
                <option value="genre">Género</option>
                <option value="language">Idioma</option>
            </select>
            <div class="field">
                <input type="text" name="keyword" id="password" placeholder="Introduce las palabras clave">
                <i class="fa-solid fa-magnifying-glass searchButton" id="bSimpleSearch""></i>
            </div>
            <div class="avanzada" id="bAdvSearch">
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
                <a href="?ruta=singleBook&id=<?php echo $book["id"];?>" class="book">
                        <p><?php echo $book["title"]; ?></p>
                        <p><?php echo $book["author"]; ?></p>
                        <p><?php echo $book["publisher"]; ?></p>
                        <p><?php echo $book["language"]; ?></p>
                        <p><?php echo $book["genre"]; ?></p>
                        <p class="available"><?php echo ($book["available"] ? "SI" : "NO"); ?></p>
                </a>
            <?php } ?>
        </div>
    </div>
    
    <div class="modal">
        <div class="outside"></div>
        <div class="advSearchCont">
                <h3>Búsqueda avanzada</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"]."?ruta=catalogo"; ?>" method="post" id="advForm">
                    <div class="advColumn">
                        <div class="field advField">
                            <i class="fa-solid fa-hashtag icon"></i>
                            <input type="text" placeholder="ISBN">
                        </div>
                        <div class="field advField">
                            <i class="fa-solid fa-user icon"></i>
                            <input type="text" placeholder="Autor">
                        </div>
                        <div class="field advField">
                            <i class="fa-solid fa-feather icon"></i>
                            <input type="text" placeholder="Editorial">
                        </div>
                    </div>
                    <div class="advColumn">
                        <div class="field advField">
                            <i class="fa-solid fa-book icon"></i>
                            <input type="text" placeholder="Título">
                        </div>
                        <div class="field advField">
                            <i class="fa-solid fa-masks-theater icon"></i>
                            <input type="text" placeholder="Género">
                        </div>
                        <div class="field advField">
                            <i class="fa-solid fa-calendar-days icon"></i>
                            <input type="text" placeholder="Año Publicación">
                        </div>
                    </div>
                </form>
                <button>Enviar Búsqueda</button>
        </div>
    </div>

    <script src="./public/js/catalogo.js"></script>
</main>