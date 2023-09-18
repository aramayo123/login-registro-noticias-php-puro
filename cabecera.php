<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto nuevo Ejemplo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:red;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" style="color:white;" href="index.php">Inicio</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if(isset($_SESSION['usuario']) == "admin"){ ?>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" aria-current="page" href="portafolio.php">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="cerrar.php">Cerrar</a>
                </li>
                <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="login.php">Iniciar Sesion</a>
                    </li>
                <?php }?>
                <!--
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
                !-->
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        