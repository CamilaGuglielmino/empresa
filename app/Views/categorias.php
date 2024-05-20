<?php

$session = \Config\Services::session();
?>
<div class="container mt-5">


  <div class="row row-cols1 row-cols-sm-2 row-cols-md-3 g-3" id="card">
    <?php
    $estado1 = 'publicado';
    $num = 0;
    foreach ($registros as $registro):
      $id=$registro['id'];
      $autor = $registro['nombre_usuario'];
      $titulo = $registro['titulo'];
      $descripcion = $registro['descripcion'];
      $fecha1 = $registro['fecha_publicacion'];
      $estado = $registro['estado'];
      $categoria = $registro['categoria'];
      $imagen = $registro['imagen'];
      $fechaInvertida = date("d-m-Y", strtotime($fecha1));
      if (strcasecmp($estado, $estado1) == 0) {
        if(!empty($imagen)){
        $num++;

        ?>

        <div class="col">
          <div class="card shadow sm" id="card">
            <img src="<?php echo base_url('imagenes/' . $imagen) ?>" class="card-img-top" alt="<?php echo $titulo ?>">
            <div class="card-body">
              <a href="<?php echo base_url('detalle?id='.$id) ?>">
                <h5 class="card-title"><?php echo $titulo ?></h5>
              </a>
              <p class="card-text"><?php echo $descripcion ?></p>
            </div>
            <div class="card-footer">
              <h6><i>Autor: <?php echo $autor ?></i></h6>
              <h6><u>Categoria:</u> <?php echo $categoria ?> </h6>
              <small class="text-body-secondary">Fecha de publicación: <?php echo $fechaInvertida ?></small>
            </div>
          </div>
        </div>
        <?php
      }else{ ?>
        <div class="col">
          <div class="card shadow sm" id="card">
            
            <div class="card-body">
              <a href="<?php echo base_url('detalle?id='.$id) ?>">
                <h5 class="card-title"><?php echo $titulo ?></h5>
              </a>
              <p class="card-text"><?php echo $descripcion ?></p>
            </div>
            <div class="card-footer">
              <h6><i>Autor: <?php echo $autor ?></i></h6>
              <h6><u>Categoria:</u> <?php echo $categoria ?> </h6>
              <small class="text-body-secondary">Fecha de publicación: <?php echo $fechaInvertida ?></small>
            </div>
          </div>
        </div>
<?php
      }
    }
    endforeach;
    //<?php echo base64_encode($ID); 
    ?>
  </div>
</div>
<?php if ($num == '0') {
      ?>
      <div class="card">
        <div class="container mt-5">
         <h2>No hay publicaciones en esta categoria!</h2>
        </div>
        <div class="container mt-5">
          <blockquote class="blockquote mb-0">
            <?php
            $var1 = 'Innovaciones y Lanzamientos';
            $var2 = 'Tendencias del Sector';
            $var3 = 'Casos de Éxito';
            $var4 = 'Eventos y Conferencias';

            ?>
            <li><a href="<?php echo base_url('Noticias/categoria?var=' . $var1); ?>">Innovaciones y
                Lanzamientos</a></li>
            <li><a class=" " href="<?php echo base_url('Noticias/categoria?var=' . $var2); ?>">Tendencias del
                Sector</a></li>
            <li><a class="" href="<?php echo base_url('Noticias/categoria?var=' . $var3); ?>">Casos
                de Éxito</a></li>
            <li><a class="" href="<?php echo base_url('Noticias/categoria?var=' . $var4); ?>">Eventos
                y Conferencias</a></li>

          </blockquote>

          <br>
          <br>
        </div>
      </div>
      <?php } ?>