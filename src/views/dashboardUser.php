<?php 
    include_once './src/models/DB.php';
    $lastBooks = DB::getLastBooks();
    $mostPopularBooks = DB::getMostPopularBooks();
    $myLastLoans = DB::getMyLastLoans($_SESSION["id"]);
?>
<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/dashboardUser.css">
    <section class="left">
        <div class="lastLoans">
            <p class="sectionTitle">Tus últimos libros alquilados</p>
            <div class="books">
            <?php foreach ($myLastLoans as $book) {?>
                <a href="?ruta=singleBook&id=<?php echo $book["id"];?>">
                    <div class="book">
                        <i class="bookIcon fa-solid fa-book"></i>
                        <div class="data">
                            <p class="bookTitle"><?php echo $book["title"];?></p>
                            <div class="bottom">
                                <p class="loanAuthor"><?php echo $book["author"];?></p>
                                <p class="loanDate"><?php echo $book["start_loan"];?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <?php if(!$myLastLoans){ ?>
                <div class="noLoans">
                    <h3>Vaya... Parece que aún no has alquilado ningún libro</h3>
                    <img src="./public/img/books.png" alt="No image">
                    <a href="?ruta=catalogo">Ve directo al catálogo</a>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="lastNews">
            <p class="sectionTitle">Últimas Novedades</p>
            <div class="sliders">
                <div class="slide active">
                    <div class="new">
                        <img class="cover" src="data:image/jpg;base64,<?php echo base64_encode($lastBooks[0]["cover"]) ?>" alt="NO HAY IMAGEN">
                        <div class="newContent center">
                            <h3><?php echo $lastBooks[0]["title"]; ?> </h3>
                            <p> <?php echo $lastBooks[0]["synopsis"]; ?> </p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="new">
                        <img class="cover" src="data:image/jpg;base64,<?php echo base64_encode($lastBooks[1]["cover"]) ?>" alt="NO HAY IMAGEN">
                        <div class="newContent center">
                            <h3><?php echo $lastBooks[1]["title"]; ?> </h3>
                            <p> <?php echo $lastBooks[1]["synopsis"]; ?> </p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="new">
                        <img class="cover" src="data:image/jpg;base64,<?php echo base64_encode($lastBooks[2]["cover"]) ?>" alt="NO HAY IMAGEN">
                        <div class="newContent center">
                            <h3><?php echo $lastBooks[2]["title"]; ?> </h3>
                            <p> <?php echo $lastBooks[2]["synopsis"]; ?> </p>
                        </div>
                    </div>
                </div>
                <i class="bSlide bPrev fa-solid fa-circle-chevron-left"></i>
                <i class="bSlide bNext fa-solid fa-circle-chevron-right"></i>
            </div>
        </div>
    </section>
    <section class="right">
        <aside class="aside">
            <p class="sectionTitle">Los libros con más éxito</p>
            <a href="?ruta=singleBook&id=<?php echo $mostPopularBooks[0]["id"];?>">
                <div class="topBookCard">
                    <img class="topBookCover" src="data:image/jpg;base64,<?php echo base64_encode($mostPopularBooks[0]["cover"]) ?>" alt="NO HAY IMAGEN">
                    <div class="topBookContent center">
                        <h2>#TOP 1</h2>
                        <h3><?php echo $mostPopularBooks[0]["title"]; ?></h3>
                    </div>
                </div>
            </a>
            <a href="?ruta=singleBook&id=<?php echo $mostPopularBooks[1]["id"];?>">
                <div class="topBookCard">
                    <img class="topBookCover" src="data:image/jpg;base64,<?php echo base64_encode($mostPopularBooks[1]["cover"]) ?>" alt="NO HAY IMAGEN">
                    <div class="topBookContent center">
                        <h2>#TOP 2</h2>
                        <h3><?php echo $mostPopularBooks[1]["title"]; ?></h3>
                    </div>
                </div>
            </a>
            <a href="?ruta=singleBook&id=<?php echo $mostPopularBooks[2]["id"];?>">
                <div class="topBookCard">
                    <img class="topBookCover" src="data:image/jpg;base64,<?php echo base64_encode($mostPopularBooks[2]["cover"]) ?>" alt="NO HAY IMAGEN">
                    <div class="topBookContent center">
                        <h2>#TOP 3</h2>
                        <h3><?php echo $mostPopularBooks[2]["title"]; ?></h3>
                    </div>
                </div>
            </a>
        </aside>
        <div class="colaborations center">
            <p class="sectionTitle">Colabora con nosotros</p>
            <div class="options">
                <div class="row">
                    <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        <p>Proyecto</p>
                    </a>
                    <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                        <i class="fa-solid fa-briefcase"></i>
                        <p>Puestos</p>
                    </a>
                </div>
                <div class="row">
                    <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                        <i class="fa-solid fa-book-open"></i>
                        <p>Donaciones</p>
                    </a>
                    <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                        <i class="fa-brands fa-paypal"></i>
                        <p>PayPal</p>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <script src="./public/js/dashboardUser.js"></script>
</main>