<?php

$session = \Config\Services::session();
?>


<div class="container mt-5">

<div class="row row-cols1 row-cols-sm-2 row-cols-md-3 g-3" id="card">
  <?php
  foreach ($registros as $registro):
    $id=$registro['id'];
    $autor=$registro['nombre_usuario'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $fecha1 = $registro['fecha_creacion'];
    $estado = $registro['estado'];
    $categoria = $registro['categoria'];
    $imagen = $registro['imagen'];

    $publicado = 'Publicado';
    if (strcasecmp($estado, $publicado) == 0) {
     
      
?>
      <div class="col">
        <div class="card shadow sm" id="card">
      
          
          <img src="<?php echo base_url('imagenes/'.$imagen)?>" class="card-img-top" alt="<?php echo $titulo?>">
          <div class="card-body">
          <a href="<?php echo base_url('Noticias/detalle?id='.$id);?>">
            <h5 class="card-title"><?php echo $titulo?></h5>
            </a>
            <p class="card-text"><?php echo $descripcion?></p>
          </div>
          <div class="card-footer">
            <h6><i>Autor:  <?php echo $autor?></i></h6>
            <h6><u>Categoria:</u> <?php echo $categoria?> </h6>
           
            <small class="text-body-secondary">Fecha de publicación: </small>  <!-- echo $fecha1; -->
          </div>
        </div>
      </div>
      
    <?php
  

    }
  endforeach;


  //<?php echo base64_encode($ID); 
  ?>
  </div>
  </div>
