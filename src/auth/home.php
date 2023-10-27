<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../../public/img/logos/whiteIcono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/viewsCSS/home.css">
    <title>BookSphere</title>
</head>
<body class="center">
    <main class="center">
        <header class="center">
            <img src="../../public/img/logos/fullWhiteLogo.png" alt="logo">
            <p>Descubre BookSphere. Infinidad de libros a un sólo click de distancia</p>
        </header>
        <hr>
        <div class="buttons center">
            <a class="btnLogin" href="../auth/login.php" rel="noopener noreferrer">Iniciar Sesión</a>
            <p class="btnSignUp"> ¿Aún no tienes una cuenta?. <a href="../auth/signup.php" rel="noopener noreferrer">Regístrate</a> </p>
        </div>
        
    </main>

    <div class="socialMedia">
        <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
            <i class="fa-brands fa-github"></i>
            <p>Ver Proyecto</p>
        </a>
    </div>
    <?php include_once "../components/overlay.inc.php"; ?> 
</body>
</html>