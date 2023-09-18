<?php include ("cabecera.php"); ?>
<?php include ("conexion.php"); ?>

<?php
    /* SELECCIONAR PARA MOSTRAR O LO QUE SEA */
    /* RECOGER DATOS */
    $conexion = new conexion(); /* creamos e instanciamos un objeto conexion */
    $resultado = $conexion->consultar("SELECT * FROM `proyectos`"); /* seleccionamos todo de la tabla proyectos */
?>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-4" >Bienvenid@s</h1>
            <p class="lead">Este es un portafolio privado</p>
            <hr class="my-2">
        </div>
    </div>
    <!-- INICIO DE PUBLICACIONES EN INICIO !-->
    <div class="row row-cols-1 row-cols-md-1 g-4">
    <?php foreach($resultado as $i) {?>
    <div class="col">
        <div class="card">
        <img src="imagenes/<?php echo $i['imagen'];?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $i['nombre'];?></h5>
            <p class="card-text"><?php echo $i['descripcion'];?></p>
        </div>
        </div>
    </div>
    <?php } ?>
    </div>
    </br>
<?php include ("pie.php"); ?>
