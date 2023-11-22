<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["cancel"])){
            header("Location: ?ruta=adminBooks");
        }
        else{
            if(isset($_POST["addBook"])){                
                    $camposRellenos = $_FILES["cover"]["error"] === 0 && !empty($_POST["isbn"]) && !empty($_POST["title"]) && !empty($_POST["author"]) && !empty($_POST["publisher"]) && !empty($_POST["language"]) && !empty($_POST["genre"]) && !empty($_POST["year"]) && !empty($_POST["synopsis"]);
                    if($camposRellenos){
                        $cover = file_get_contents($_FILES["cover"]["tmp_name"]);
                        $isbn = $_POST["isbn"];
                        $title = $_POST["title"];
                        $author = $_POST["author"];
                        $publisher = $_POST["publisher"];
                        $language = $_POST["language"];
                        $genre = $_POST["genre"];
                        $year = $_POST["year"];
                        $synopsis = $_POST["synopsis"];

                        $inserted = DB::insertBook($isbn, $title, $author, $publisher, $language, $genre, $year, $synopsis, $cover);
                        echo $inserted ? "Insertado" : "No insertado";
                    }
                    else{
                        echo "campos no rellenos";
                    }
                
            }
        }

    }

?>

<main>
    <link rel="stylesheet" href="./public/css/adminCSS/adminAddBook.css">
    <form class="container" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=adminAddBook";?>" method="post" enctype="multipart/form-data">
        <div class="titles">
                <h1 class="title"> Añadir Libro</h1>
        </div>
        
        <div class="data">
            <div class="cover">
                <label for="inptCover">
                    <i class="fa-solid fa-cloud-arrow-up icon"></i>
                    <p>Click para subir la portada o arrástrala aquí</p>
                    <p>SVG, PNG o JPEG</p>
                    <input id="inptCover" type="file" name="cover" class="inptCover">
                </label>
            </div>
            <div class="bottomRight">
                <div class="otherData">
                    <div class="campoDato">
                        <p>ISBN</p>
                        <input type="text" name="isbn" id="" placeholder="ISBN" >
                    </div>
                    <div class="campoDato">
                        <p>Título</p>
                        <input type="text" name="title" id="" placeholder="Titulo" >
                    </div>
                    <div class="campoDato">
                        <p>Autor</p>
                        <input type="text" name="author" id="" placeholder="Autor" >
                    </div>
                    <div class="campoDato">
                        <p>Editorial</p>
                        <input type="text" name="publisher" id="" placeholder="Editorial" >
                    </div>
                    <div class="campoDato">
                        <p>Idioma</p>
                        <input type="text" name="language" id="" placeholder="Idioma" >
                    </div>
                    <div class="campoDato">
                        <p>Género</p>
                        <input type="text" name="genre" id="" placeholder="Género" >
                    </div>
                    <div class="campoDato">
                        <p>Año Publicación</p>
                        <input type="text" name="year" id="" placeholder="Año">
                    </div>
                    <div class="campoDato">
                        <p>Sinopsis</p>
                        <textarea name="synopsis" id="" cols="30" rows="10" placeholder="Sinopsis" ></textarea>
                    </div>

                    </div>
                <div class="buttons">
                    <button id="btnEditBook" name="addBook">Añadir</button>
                    <button id="btnDeleteBook" name="cancel">Cancelar</button>
                </div>
            </div>
        </div>
    </form> 
    
</main>
