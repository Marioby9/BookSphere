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
            <h3>Inicia sesión para empezar a usar BookSphere</h3>
        </header>
        <form class="center" action="" method="post" id="form">
            <div class="field">
                <input type="text" name="" placeholder="username" required>
            </div>
            <div class="field">
                <input type="password" name="" id="password" placeholder="contraseña" required>
                <i class="eye fa-solid fa-eye"></i>
            </div>
            <br>
            <input class="submit" type="submit" value="LogIn">
        </form>
        
        
        <p>¿Aún no tienes una cuenta? <a class="back" href="../auth/signup.php">Regístrate</a></p>

        <div class="socialMedia">
            <a class="btnRed center" href="https://github.com/Marioby9/BookSphere" target="_blank">
                <i class="fa-brands fa-github"></i>
                <p>Ver Proyecto</p>
            </a>
        </div>
    </main>

    <?php include_once "../components/overlay.inc.php"; ?> 

    <script type="module" src="../../public/js/login.js"></script>
</body>
</html>