<header>
    <link rel="stylesheet" href="./public/css/componentsCSS/header.css">
    <img class="logo" src="./public/img/logos/fullWhiteLogo.png" alt="logo">
    <nav class="menu">
        <ul>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "dashboardAdmin" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=dashboardAdmin">Página Principal
                </a>
            </li>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "adminUsers" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=adminUsers">Gestión Usuarios
                </a>
            </li>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "adminBooks" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=adminBooks">Gestión Libros
                </a>
            </li>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "adminProfile" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=adminProfile">Perfil
                </a>
            </li>
        </ul>
    </nav>
</header>