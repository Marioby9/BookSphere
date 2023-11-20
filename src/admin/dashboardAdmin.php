<?php 
    include_once './src/models/DB.php';
    $mostPopularBooks = DB::getMostPopularBooks();
    $mostActiveUsers = DB::getMostActiveUsers();
    $lastUsers = DB::getLastUsers();


?>
<main>
    <link rel="stylesheet" href="./public/css/adminCSS/dashboardAdmin.css">
    <section class="left">
        <div class="lastUsers">
            <p class="sectionTitle">Los últimos usuarios registrados</p>
            <div class="users">
            <?php foreach ($lastUsers as $user) {?>
                <a href="?ruta=singleBook&id=<?php echo $user["id"];?>">
                    <div class="user">
                        <i class="bookIcon fa-solid fa-user"></i>
                        <div class="data">
                            <p class="bookTitle"><?php echo $user["nickname"];?></p>
                            <div class="bottom">
                                <p class="loanAuthor"><?php echo $user["name"] ." ". $user["lastname1"] ." ". " " . $user["lastname2"]  ;?></p>
                                <p class="loanDate"><?php echo $user["signup_date"];?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <?php if(!$lastUsers){ ?>
                <div class="noLoans">
                    <h3>Vaya... Parece que aún no hay ningún usuario registrado</h3>
                    <img src="./public/img/books.png" alt="No image">
                    <a href="?ruta=catalogo">Ve directo al catálogo</a>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="mostActiveUsers">
            <p class="sectionTitle">Usuarios más activos</p>
            <div class="sliders">
                <?php for($i=0; $i<count($mostActiveUsers); $i++){ ?>
                    <div class="slide <?php echo ($i==0) ? "active" : ""; ?>">
                        <div class="activeUser">
                            <h3><?php echo $mostActiveUsers[$i]["name"] . " " . $mostActiveUsers[$i]["lastname1"]. " ". $mostActiveUsers[$i]["lastname2"] ; ?> </h3>
                            <div class="activeUserData">
                                <p><strong>Nombre Usuario:</strong> <?php echo $mostActiveUsers[$i]["nickname"]; ?> </p>
                                <p><strong>Email:</strong> <?php echo $mostActiveUsers[$i]["email"]; ?> </p>
                                <p><strong>Fecha registro:</strong> <?php echo $mostActiveUsers[$i]["signup_date"]; ?> </p>
                                <p><strong>Total libros leídos:</strong> <?php echo $mostActiveUsers[$i]["TOTAL_LIBROS"]; ?> </p>
                            </div>

                        </div>
                    </div>
                <?php } ?>
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