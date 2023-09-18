<?php include ("cabecera.php"); ?>
<?php include ("conexion.php"); ?>
<?php 

    if(isset($_SESSION['usuario']) != "admin"){
        /* SI NO INICIO SESION, LO MANDAMOS A QUE INICIE */
        header("location:login.php");
    }

    /* INSERTAR / ACTUALIZAR */
    if($_POST){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $archivo = $_FILES['archivo']['name'];
        if($nombre != "" && $descripcion != "" && $archivo != ""){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            /******subir archivos*********/
            $fecha = new DateTime(); // con esto evitamos que se sobreescriban archivos con el mismo nombre
            /* nombre del archivo con su extension */
            $nombre_imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];
            // con esta concatenacion cada imagen va a tener el tiempo de subida entonces nunca se va a repetir
            $imagen_temporal = $_FILES['archivo']['tmp_name'];
            move_uploaded_file($imagen_temporal,"imagenes/".$nombre_imagen);
            /*****************************/
            $conexion = new conexion(); /* creamos e instanciamos un objeto conexion */
            $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$nombre_imagen', '$descripcion');";
            $conexion->ejecutar($sql);
            header("location:portafolio.php");
        }else{
            echo "<script> alert('Debes llenar todos los campos'); </script>";
        }
    }
    /* ELIMINAR / DELETE */
    if($_GET){
        // DELETE FROM `proyectos` WHERE `proyectos`.`id` = 2
        $conexion = new conexion(); /* creamos e instanciamos un objeto conexion */
        $imagen = $conexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$_GET['borrar']);
        /* CON ESTA SENTENCIA BORRAMOS EL ARCHIVO EXTRAIDO DE LA BASE DE DATOS DE NUESTRA CARPETA DE IMAGENES*/
        unlink("imagenes/".$imagen[0]['imagen']);
        /* aca lo borramos de la base de datos */
        $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$_GET['borrar'];
        $conexion->ejecutar($sql);        
        /* esto es para que no quede el id impreso en la url */
        header("location:portafolio.php");
    }

    /* SELECCIONAR PARA MOSTRAR O LO QUE SEA */
    /* RECOGER DATOS */
    $conexion = new conexion(); /* creamos e instanciamos un objeto conexion */
    $resultado = $conexion->consultar("SELECT * FROM `proyectos`"); /* seleccionamos todo de la tabla proyectos */

?>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            </br>
            <div class="card">
                <div class="card-header">
                        Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data" >
                        <h4>Nombre del proyecto: </h4>
                        <input required type="text" class="form-control" name="nombre" id="">
                        <h4>Imagen del proyecto: </h4>
                        <input required type="file" class="form-control" name="archivo" id="">
                        <h4>Descripcion del proyecto: </h4>
                        <textarea required class="form-control" type="text" name="descripcion" id="" rows="3"></textarea>
                        </br>
                        <input type="submit" class="btn btn-success" value="Enviar Proyecto">
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultado as $i) {?>
                    <tr>
                        <td><?php echo $i['id'];?></td>
                        <td><?php echo $i['nombre'];?></td>
                        <td>
                            <img src="imagenes/<?php echo $i['imagen'];?>" width="100">
                        </td>
                        <td><?php echo $i['descripcion'];?></td>
                        <td><a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $i['id'];?>">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?php include ("pie.php"); ?>
