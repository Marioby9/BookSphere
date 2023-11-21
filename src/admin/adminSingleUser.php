<?php 
    include_once './src/models/DB.php';
    $user = DB::getSingleUser($_GET["id"]);

    if(!$user){
        header("Location:".$_SERVER["PHP_SELF"]."?ruta=error404");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/adminCSS/adminSingleUser.css">
    <div class="container">
        <div class="titles">
                <h1 class="title"> <?php echo $user["nickname"]; ?> </h1>
        </div>
        
        <div class="data">
            <div class="cover">
                <i class="fa-solid fa-user iconUser"></i>
            </div>
            <div class="bottomRight">
                <div class="otherData">
                    <p>Nombre: <span> <?php echo $user["name"]; ?> </span></p>
                    <p>Apellido 1: <span> <?php echo $user["lastname1"]; ?> </span></p>
                    <p>Apellido 2: <span> <?php echo $user["lastname2"]; ?> </span></p>
                    <p>Email: <span> <?php echo $user["email"]; ?> </span></p>
                    <p>Fecha Registro: <span> <?php echo $user["signup_date"]; ?> </span></p>
                    <p>Rol: <span> <?php echo $user["rol"]; ?> </span></p>
                    
                </div>
                <div class="buttons">
                    <form id="formLoanBook" action="<?php echo $_SERVER["PHP_SELF"]."?ruta=adminSingleUser&id=".$user["id"];?>" method="post">
                        <button id="btnDeleteBook" name="deleteUser">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    
</main>
