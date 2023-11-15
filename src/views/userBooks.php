<?php
    include_once './src/models/DB.php';

    $favoriteBooks = DB::getFavoriteBooks($_SESSION["id"]);


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
            <p class="sectionTitle">Leyendo actualmente</p>
        </div>
        <div class="favoritesCont">
            <p class="sectionTitle">Tus favoritos</p>
            <div class="favorites">
                <div class="card one">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($favoriteBooks[0]["cover"]) ?>" alt="NO HAY IMAGEN">
                    <div class="cardDetails">
                        <div class="cardDetailsHaeder"><?php echo $favoriteBooks[0]["title"] ?></div>
                        <div class="cardDetailsButton">Ver Libro</div>
                    </div>
                </div>
                <div class="card two">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($favoriteBooks[1]["cover"]) ?>" alt="NO HAY IMAGEN">
                    <div class="cardDetails">
                        <div class="cardDetailsHaeder"><?php echo $favoriteBooks[1]["title"] ?></div>
                        <div class="cardDetailsButton">Ver Libro</div>
                    </div>
                </div>
                <div class="card three">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($favoriteBooks[2]["cover"]) ?>" alt="NO HAY IMAGEN">   
                    <div class="cardDetails">
                        <div class="cardDetailsHaeder"><?php echo $favoriteBooks[2]["title"] ?></div>
                        <div class="cardDetailsButton">Ver Libro</div>
                    </div>
                </div>
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
                        <button class="return">devolver</button>
                    </div>
                    
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="./public/js/userBooks.js"></script>
</main>