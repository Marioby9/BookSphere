<?php 
    $book = DB::getSingleBook($_GET["id"]);
    if(!$book){
        header("Location:".$_SERVER["PHP_SELF"]."?ruta=error404");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["loan"])){
            $inserted = DB::insertLoan($_SESSION["id"], $book["id"]);
            header("Refresh: 1.5");
        }
        else if(isset($_POST["return"])){
            $returned = DB::finishLoan($_SESSION["id"], $book["id"]);
            header("Refresh: 1.5");
        }
    }

    if(!$book["available"]){
        $isMyBook = DB::isMyBook($_SESSION["id"], $book["id"]);
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/singleBook.css">
    <?php if(isset($inserted)){
            if($inserted){
                echo Cards::correctCard("Libro alquilado correctamente.");
            }
            else{
                echo Cards::errorCard("No se ha conseguido alquilar el libro.");
            }
    } 
    else if(isset($returned)){
        if($returned){
            echo Cards::correctCard("Libro devuelto correctamente.");
        }
        else{
            echo Cards::errorCard("No se ha conseguido devolver el libro.");
        }
    }?>
    <div class="container">
        <div class="titles">
                <h1 class="title"> <?php echo $book["title"]; ?> </h1>
                <h3 class="author"> <?php echo $book["author"]; ?> </h3>
        </div>
        
        <div class="data">
            <div class="cover">
                <img src="data:image/jpg;base64,<?php echo base64_encode($book["cover"]) ?>" alt="NO HAY IMAGEN">
            </div>
            <div class="bottomRight">
                <div class="otherData">
                    <p>Editorial: <span> <?php echo $book["publisher"]; ?> </span></p>
                    <p>ISBN: <span> <?php echo $book["isbn"]; ?> </span></p>
                    <p>Año Publicación: <span> <?php echo $book["year"]; ?> </span></p>
                    
                    <div>
                        <p>Sinopsis:</p>
                        <p class="resumen"> <?php echo $book["synopsis"]; ?> </p>
                    </div>
                    </div>
                <div class="buttons">
                    <form id="formLoanBook" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=singleBook&id=".$book["id"];?>" method="post">
                    <?php if($book["available"]){ ?>
                        <button id="btnLoanBook" class="alquilar" name="loan">Alquilar</button>
                    <?php } else { 
                                if($isMyBook){ ?>
                                    <button id="btnReturnBook" class="devolver" name="return">Devolver</button>
                            <?php } else{ ?>
                                    <p>No disponible</p>
                            <?php } } ?>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    
    <script src="./public/js/singleBook.js"></script>
</main>
