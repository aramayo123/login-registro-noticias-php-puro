<?php
    session_start();
    /* SI YA INICIO SESION, LO MANDAMOS AL INDEX */
    if(isset($_SESSION['usuario']) == "admin") header("location:index.php");

    if($_POST){
        if($_POST['usuario']=="admin" && $_POST['password'] == "admin"){
            /* ESTA ES LA PARTE DE ADMINISTRADOR, SI LA CONTRA Y PASS COINCIDEN INICIO SESION COMO ADMIN */
            $_SESSION['usuario'] = "admin";
            $_SESSION['password'] = "admin";
            header("location:index.php");
        }else{
            echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                </br>
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesion
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            </br>
                            <h6> Usuario: </h6><input class="form-control" type="text" name="usuario" id="">
                            <h6> Contraseña: </h6><input class="form-control" type="password" name="password" id="">
                            </br>
                            <button class="btn btn-success" type="submit">Enviar informacion</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Pie de pagina
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div> 
    </div>
</body>
</html>