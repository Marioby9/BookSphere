<header>
    <link rel="stylesheet" href="./public/css/componentsCSS/header.css">
    <img class="logo" src="./public/img/logos/fullWhiteLogo.png" alt="logo">
    <nav class="menu">
        <ul>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "dashboardUser" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=dashboardUser">Página Principal
                </a>
            </li>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "catalogo" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=catalogo">Catálogo
                </a>
            </li>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "userBooks" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=userBooks">Mis Libros
                </a>
            </li>
            <li>
                <a 
                    style="<?php echo ($_GET["ruta"] == "user" ? "border-top: 3px solid #1db954; border-bottom: 3px solid #1db954;" : ""); ?>"
                    href="?ruta=user">Perfil
                </a>
            </li>
        </ul>
    </nav>
</header>