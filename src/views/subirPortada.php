<?php 
    include_once './src/models/DB.php';
    if(isset($_POST["ACEPTAR"])){
        $id = $_POST["id"];
        $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

        $updated = DB::addCoverBook($id, $imagen);
        if($updated){
            echo "INSERTADA";
        }
        else{
            echo "no insertada";
        }
    }
?>
<main>
    <form action="<?php echo $_SERVER["PHP_SELF"] ."?ruta=subirPortada";?>" method="POST" enctype="multipart/form-data">
        <input type="number" name="id" placeholder="id" required><br><br>
        <input type="file" name="imagen" required><br><br>
        <input type="submit" name="ACEPTAR" value="ACEPTAR">
    </form>
</main>