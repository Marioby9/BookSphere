<?php
    include_once './src/models/DB.php';

    $favoriteBooks = DB::getFavoriteBooks($_SESSION["id"]);
    $currentlyReading = DB::getCurrentlyReading($_SESSION["id"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["filter"]) && !empty($_POST["keyword"])) {
        $filter = $_POST["filter"];
        $keyword = $_POST["keyword"]; 
        $books = DB::getBookByColumn($filter, $keyword);
    } else {
        $books = DB::getAllMyBooks($_SESSION["id"]);
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/userBooks.css">
    <div class="topPage">
        <div class="readingCont">
            <p class="sectionTitle">Leyendo actualmente:  <?php echo count($currentlyReading);?> </p>
            <?php if($currentlyReading){ ?>
                <div class="currentBooks">
                    <?php foreach ($currentlyReading as $currentBook) {?>
                        <a href="?ruta=singleBook&id=<?php echo $currentBook["id_book"];?>">
                            <div class="currentBook">
                                <i class="currentBookIcon fa-solid fa-book"></i>
                                <div class="currentBookData">
                                    <p class="currentBookTitle"><?php echo $currentBook["title"];?></p>
                                    <div class="currentBookBottom">
                                        <p class="currentBookAuthor"><?php echo $currentBook["author"];?></p>
                                        <p class="currentBookAuthor"><?php echo $currentBook["genre"];?></p>
                                        <p class="currentBookLoanDate"><?php echo $currentBook["start_loan"];?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php }else{ ?>
                <div class="noBooks">
                    <h3>Actualmente no estás leyendo ningún libro</h3>
                    <img src="./public/img/books.png" alt="No image">
                    <a href="?ruta=catalogo">Ve directo al catálogo</a>
                </div>
            <?php } ?>
        </div>
        <div class="favoritesCont">
            <p class="sectionTitle">Tus favoritos</p>
            <div class="favorites">
                <?php if($favoriteBooks){ ?>
                    <?php for($i=0; $i<count($favoriteBooks); $i++) {?>
                        <a class="card <?php if($i == 0){echo "one";}elseif($i == 1){echo "two";}else{echo "three";} ?>" href="?ruta=singleBook&id=<?php echo $favoriteBooks[$i]["id"]; ?>">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($favoriteBooks[$i]["cover"]) ?>" alt="NO HAY IMAGEN">
                            <div class="cardDetails">
                                <div class="cardDetailsHaeder"><?php echo $favoriteBooks[$i]["title"] ?></div>
                                <p>Veces leído: <?php echo $favoriteBooks[$i]["veces_leido"] ?> </p>
                                <div class="cardDetailsButton">Ver Libro</div>
                            </div>
                        </a>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="noBooks">
                        <h3>No tienes ningún favorito</h3>
                        <a href="?ruta=catalogo">Ve directo al catálogo</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="allMyBooks">
        <p class="allBooksTitle">Todos tus libros</p>
        <form id="simpleForm" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=userBooks"; ?>" method="post">
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
            </div>
        </form>
        <div class="booksCont">
            <div class="rowNames">
                <p>Título</p>
                <p>Autor</p>
                <p>Género</p>
                <p>Fecha Inicio</p>
                <p>Fecha Final</p>
                <p>Devolver</p>
                
            </div>
            <hr>
            <div class="books">
                <?php foreach ($books as $book) {?>
                    <div class="bookWithButton">
                        <a href="?ruta=singleBook&id=<?php echo $book["id_book"];?>" class="book">
                                <p><?php echo $book["title"]; ?></p>
                                <p><?php echo $book["author"]; ?></p>
                                <p><?php echo $book["genre"]; ?></p>
                                <p><?php echo $book["start_loan"]; ?></p>
                                <p><?php echo ($book["end_loan"] ? $book["end_loan"] : "En curso"); ?></p>
                        </a>
                            <?php if($book["end_loan"]){ ?>
                                <button class="return" name="reloan">realquilar</button>
                            <?php }else{ ?>
                                <button class="return" name="return">devolver</button>
                            <?php } ?>
                    </div>
                    
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="./public/js/userBooks.js"></script>
</main>