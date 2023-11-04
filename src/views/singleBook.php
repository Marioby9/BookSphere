<?php 
    include_once './src/models/DB.php';
    $book = DB::getSingleBook($_GET["id"]);
    if(!$book){
        header("Location:".$_SERVER["PHP_SELF"]."?ruta=error");
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/singleBook.css">
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
                    <button>Alquilar</button>
                </div>
            </div>
        </div>
    </div>    
</main>
