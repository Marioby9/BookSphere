<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ./src/auth/login.php"); 
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/viewsCSS/index.css">
    <link rel="icon" href="./public/img/logos/whiteIcono.ico" type="image/x-icon">
    <title>BookSphere</title>
</head>
<body class="center">
    <section class="page">

        <?php
            if($_SESSION["rol"] == "user"){
                include_once "./src/components/header.inc.php"; 
                if(isset($_GET["ruta"])){
                    if($_GET["ruta"] == "dashboardUser"){
                        include_once "./src/views/dashboardUser.php";
                    }
                    else if($_GET["ruta"] == "catalogo"){
                        include_once "./src/views/catalogo.php";
                    }
                    else if($_GET["ruta"] == "userBooks"){
                        include_once "./src/views/userBooks.php";
                    }
                    else if($_GET["ruta"] == "user"){
                        include_once "./src/views/user.php";
                    }
                    else if($_GET["ruta"] == "logout"){
                        include_once "./src/models/logout.php";
                    }
                    else if($_GET["ruta"] == "deleteAccount"){
                        include_once "./src/models/deleteAccount.php";
                    }
                    else if($_GET["ruta"] == "singleBook" && isset($_GET["id"])){
                        include_once "./src/views/singleBook.php";
                    }
                    else if($_GET["ruta"] == "error404"){
                        include_once "./src/errors/404.php";
                    }
                    else{
                        header("Location:".$_SERVER["PHP_SELF"]."?ruta=error404");
                    }
                }
                else{
                    header("Location:".$_SERVER["PHP_SELF"]."?ruta=dashboardUser");
                }
            }else if($_SESSION["rol"] == "admin"){
                include_once "./src/components/adminHeader.inc.php"; 
                if(isset($_GET["ruta"])){
                    if($_GET["ruta"] == "dashboardAdmin"){
                        include_once "./src/admin/dashboardAdmin.php";
                    }
                    else if($_GET["ruta"] == "adminUsers"){
                        include_once "./src/admin/adminUsers.php";
                    }
                    else if($_GET["ruta"] == "adminBooks"){
                        include_once "./src/admin/adminBooks.php";
                    }
                    else if($_GET["ruta"] == "adminProfile"){
                        include_once "./src/admin/adminProfile.php";
                    }
                    else if($_GET["ruta"] == "logout"){
                        include_once "./src/models/logout.php";
                    }
                    else if($_GET["ruta"] == "deleteAccount"){
                        include_once "./src/models/deleteAccount.php";
                    }
                    else if($_GET["ruta"] == "error404"){
                        include_once "./src/errors/404.php";
                    }
                    else{
                        header("Location:".$_SERVER["PHP_SELF"]."?ruta=error404");
                    }
                    
                }
                else{
                    header("Location:".$_SERVER["PHP_SELF"]."?ruta=dashboardAdmin");
                }
            }
        ?> 
        <?php include_once "./src/components/footer.inc.php"; ?> 
    </section>
    <?php include_once "./src/components/overlay.inc.php"; ?> 

</body>
</html>