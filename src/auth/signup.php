<?php
include_once "../models/DB.php";

if (isset($_POST["signup"])) {
    $name = $_POST["name"]; 
    $ape1 = $_POST["ape1"]; 
    $ape2 = $_POST["ape2"]; 
    $username = $_POST["username"]; 
    $email = $_POST["email"];
    $password = $_POST["pass"];

    DB::connect();
    $inserted = DB::insertUser($name, $ape1, $ape2, $username, $email, $password);   
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
    <title>BookSphere/signup</title>
</head>
<body class="center">
    <main class="center">
        <header class="center">
            <h1>¡Bienvenido!</h1>
            <h3>Regístrate para empezar a usar BookSphere</h3>
        </header>
        <form class="center" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="form">
            <div class="field">
                <input type="text" name="name" placeholder="nombre" required>
            </div>
            <div class="field">
                <input type="text" name="ape1" placeholder="apellido 1" required>
            </div>
            <div class="field">
                <input type="text" name="ape2" placeholder="apellido 2" required>
            </div>
            
            <div class="field">
                <input type="text" name="username" placeholder="username" required>
            </div>
            <div class="field">
                <input type="email" name="email" placeholder="email" required>
            </div>
            <div class="field">
                <input type="password" name="pass" id="password" placeholder="contraseña" required>
                <i class="eye fa-solid fa-eye"></i>
            </div>
            <div class="field">
                <input type="password" name="confPass" id="confPassword" placeholder="confirmar contraseña" required>
            </div>
            <br>
            <input class="submit" type="submit" name="signup" value="SignUp">
        </form>

        
        <p>¿Ya tienes una cuenta? <a class="back" href="../auth/login.php">Inicia Sesión</a></p>
        <div class="socialMedia">
            <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                <i class="fa-brands fa-github"></i>
                <p>Ver Proyecto</p>
            </a>
        </div>
    </main>
    <img class="logo" src="../../public/img/logos/fullWhiteLogo.png" alt="logo">

    <?php include_once "../components/overlay.inc.php"; ?> 

    <script type="module" src="../../public/js/signup.js"></script>
</body>
</html>