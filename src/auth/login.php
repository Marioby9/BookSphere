<?php
    include_once "../models/DB.php";
    $rutaIndex = "../../index.php";
    session_start();
    if(isset($_SESSION["username"])){
        header("Location:".$rutaIndex);
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $anyEmptyField = empty($username) || empty($password);
        $errorCampo = false;
        $errorLogin = false;
        if(!$anyEmptyField){
            $user = DB::getUser($username, $password);
            if($user){
                session_start();
                $_SESSION["id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["username"] = $user["nickname"];
                $_SESSION["lastname1"] = $user["lastname1"];
                $_SESSION["lastname2"] = $user["lastname2"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["signup_date"] = $user["signup_date"];
                $_SESSION["rol"] = $user["rol"];
                header("Location:".$rutaIndex);
            }
            else{
                $errorLogin = true;
            }
        }
        else{
            $errorCampo = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../../public/img/logos/whiteIcono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/viewsCSS/auth.css">
    <title>BookSphere/login</title>
</head>
<body class="center">
    <img class="logo" src="../../public/img/logos/fullWhiteLogo.png" alt="logo">
    <main class="center" id="login">
        <header class="center">
            <h1>¡Bienvenido!</h1>
            <h3>Inicia sesión para empezar a usar BookSphere</h3><br>
            <?php if(isset($errorCampo) && $errorCampo) { ?>
                <h2 class="error">Error, campos incompletos</h2>
            <?php } ?>
            <?php if(isset($errorLogin) && $errorLogin) { ?>
                <h2 class="error">Error, usuario/contraseña incorrectos</h2>
            <?php } ?>
        </header>
        <form class="center" action="" method="post" id="form">
            <div class="field">
                <input type="text" name="username" placeholder="username" >
            </div>
            <div class="field">
                <input type="password" name="password" id="password" placeholder="contraseña" required>
                <i class="eye fa-solid fa-eye"></i>
            </div>
            <br>
            <input class="submit" type="submit" name="login"  value="login">
        </form>
        
        
        <p>¿Aún no tienes una cuenta? <a class="back" href="../auth/signup.php">Regístrate</a></p>

        <div class="socialMedia">
            <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                <i class="fa-brands fa-github"></i>
                <p>Ver Proyecto</p>
            </a>
        </div>
    </main>

    <img class="overlayImg" src="../../public/img/overlay.jpeg" alt="background">
    <div class="overlay"></div>

    <script type="module" src="../../public/js/login.js"></script>
</body>
</html>