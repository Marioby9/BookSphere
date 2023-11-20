<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/user.css">
    <p class="pageTitle">Bienvenido, <?php echo $_SESSION["username"]; ?> </p>
    <div class="statsAndData">
        <div class="container stats">
            <p class="sectionTitle">Objetivo de esta cuenta</p>
            <div class="data">
                <p>Gestionar la actividad de los usuarios. Borrar y modificar</p>
                <p>Posibilidad de añadir, borrar y modificar libros de la biblioteca</p>
                <p>Llevar un control de las sesiones de los usuarios. Fecha de inicio y de eliminación</p>
                <p>Fecha inicio registro: <?php echo $_SESSION["signup_date"];?></p>
            </div>
        </div>
        <div class="container personalData">
            <p class="sectionTitle">Datos personales</p>
            <div class="data">
                <p>Nombre: <?php echo $_SESSION["name"]; ?></p>
                <p>Apellidos: <?php echo $_SESSION["lastname1"] . " " .$_SESSION["lastname2"]; ?></p>
                <p>Correo: <?php echo $_SESSION["email"]; ?></p>
                <p>Tipo cuenta: <?php echo $_SESSION["rol"]; ?></p>
            </div>
        </div>
    </div>
    <div class="container config">
        <p class="sectionTitle">Configuración</p>
        <div class="configData">
            <div class="editParam">
                <p>Modificar username: </p>
                <p><?php echo $_SESSION["username"]; ?></p>
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <div class="editParam">
                <p>Modificar email: </p>
                <p><?php echo $_SESSION["email"]; ?></p>
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <div class="editParam">
                <p>Modificar contraseña: </p>
                <i class="fa-solid fa-pen-to-square"></i>
            </div>

        </div>
    </div>
    <div class="dangerZone center">
        <div class="container">
            <p class="sectionTitle">Zona Peligrosa</p>
            <div class="options">
                <div class="option">
                    <p>Cerrar Sesión: Finalizará la sesión actual sin perder datos</p>
                    <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=logout"; ?>" class="dangerButton">Cerrar Sesión</a>
                </div>
                <div class="option">
                    <p>Eliminar Cuenta: Eliminará la cuenta actual y borrará sus datos</p>
                    <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=deleteAccount"; ?>" class="dangerButton">Borrar Cuenta</a>
                </div>
            </div>
        </div>

    </div>
</main>