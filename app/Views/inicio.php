<?php

$session = \Config\Services::session();
?>

<div class="row row-cols1 row-cols-sm-2 row-cols-md-3 g-3" id="card">
  <?php
  foreach ($registros as $registro):
    $autor=$registro['nombre_usuario'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $fecha1 = $registro['fecha_creacion'];
    $fecha2 = $registro['fecha_correccion'];
    $fecha3 = $registro['fecha_publicacion'];
    $estado = $registro['estado'];
    $categoria = $registro['categoria'];
    $imagen = $registro['imagen'];

    $publicado = 'Publicado';
    if (strcasecmp($estado, $publicado) == 0) {
      ?>
      <a href="http://www.instagram.com">
      <div class="col">
        <div class="card shadow sm" id="card">
          <img src="..\public\imagenes\logo.png" class="card-img-top" alt="<?php echo $titulo?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $titulo?></h5>
            <p class="card-text"><?php echo $descripcion?></p>
          </div>
          <div class="card-footer">
            <h6><i>Autor:  <?php echo $autor?></i></h6>
            <h6><u>Categoria:</u> <?php echo $categoria?> </h6>
            <small class="text-body-secondary">Fecha de publicación: <?php echo $fecha1?></small>
          </div>
        </div>
      </div>
      </a>
    <?php
    }
  endforeach;
  //<?php echo base64_encode($ID); 
  ?>
  </div>
