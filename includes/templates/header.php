<?php

if(!isset($_SESSION)){
    session_start();
}

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo_Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="/navegacion">
                        <a href="/nosotros" class="selected">Nosotros</a>
                        <a href="/propiedades " class="selected">Anuncios</a>
                        <a href="/blog" class="selected">Blog</a>
                        <a href="/contacto" class="selected"> Contacto</a>
                        <?php if ($auth): ?>
                            <a href="/logout"  class="selected"> Cerrar Sesión</a>
                        <?php endif; ?>
                        <?php if ($auth) { ?>
                        <a href="/admin" class="centrado">Admin</a>
                        <?php } ?>
                    </nav>
                </div>

                
            </div> <!--.barra-->

        <?php echo $inicio ? '<h1>Venta de Casas y Departamentos de Lujo</h1>' : ''; ?>;

        </div>

    </header>