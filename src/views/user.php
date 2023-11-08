<main>
    <link rel="stylesheet" href="./public/css/viewsCSS/user.css">
    <p class="pageTitle">Bienvenido, Marioby9</p>
    <div class="statsAndData">
        <div class="container stats">
            <p class="sectionTitle">Tus estadísticas</p>
            <div class="data">
                <p>Total libros leídos: 200</p>
                <p>Libros leídos en el último mes: 20</p>
                <p>Género más leído: Terror</p>
                <p>Fecha inicio registro: 20/10/2023</p>
                <p>Tipo cuenta: Usuario</p>
            </div>
        </div>
        <div class="container personalData">
            <p class="sectionTitle">Datos personales</p>
            <div class="data">
                <p>Nombre: Mario</p>
                <p>Apellidos: Martín Godoy</p>
                <p>Edad: 21</p>
                <p>Correo: mmartin.mrmg@gmail.com</p>
                <p>Tipo cuenta: Usuario</p>
            </div>
        </div>
    </div>
    <div class="container config">
        <p class="sectionTitle">Configuración</p>
        <div class="configData">
            <div class="editParam">
                <p>Modificar username: </p>
                <p>Marioby9</p>
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <div class="editParam">
                <p>Modificar email: </p>
                <p>mmartin.mrmg@gmail.com</p>
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
                    <button class="dangerButton">Delete Account</button>
                </div>
            </div>
        </div>

    </div>
</main>