<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../../public/img/logos/whiteIcono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/viewsCSS/user.css">
    <title>BookSphere/Perfil</title>
</head>

<body class="center">
    <section class="page">
        <?php include_once "../components/header.inc.php"; ?>
        <main>
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
                    </div>
                    
                </div>
            </div>

            <?php include_once "../components/footer.inc.php"; ?>  
        </main>
    </section>
    <?php include_once "../components/overlay.inc.php"; ?> 
</body>
</html>