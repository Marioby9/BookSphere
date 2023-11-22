<?php 
    $user = DB::getSingleUser($_GET["id"]);

    if(!$user){
        header("Location:".$_SERVER["PHP_SELF"]."?ruta=error404");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["deleteUser"])){
            $deleted = DB::deleteAccount($_GET["id"]);
            header("Refresh:1.5");
        }
        else if (isset($_POST["restoreUser"])){
            $restored = DB::restoreUser($_GET["id"]);
            header("Refresh:1.5");
        }
    }
?>

<main>
    <link rel="stylesheet" href="./public/css/adminCSS/adminSingleUser.css">
    <?php if(isset($deleted)){
            if($deleted){
                echo Cards::correctCard("Usuario eliminado correctamente");
            }
            else{
                echo Cards::errorCard("No se ha conseguido eliminar el usuario");
            }
    } ?>
    <?php if(isset($restored)){
            if($restored){
                echo Cards::correctCard("Usuario restaurado correctamente");
            }
            else{
                echo Cards::errorCard("No se ha conseguido restaurar el usuario");
            }
    } ?>
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
                        <?php if($user["unsubscribe_date"]){ ?>
                            <button id="btnRestoreUser" name="restoreUser">Restaurar</button>
                        <?php }else{ ?>
                            <button id="btnDeleteUser" name="deleteUser">Eliminar</button>
                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div> 
    
</main>
