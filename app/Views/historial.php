<?php

$session = \Config\Services::session();


?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Historial de <?php echo $session->get('nombreUsuario'); ?></h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha de Creacion</th>
                                <th scope="col">Fecha de Correccion</th>
                                <th scope="col">Fecha de Publicacion</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">imagen</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        <?php 
                                $num='0'; 
                                foreach ($registros as $registro): 
                                    $num++; 
                                    
                                    $autor=$registro['nombre_usuario']; 
                                    $titulo=$registro['titulo'];
                                    $descripcion=$registro['descripcion'];
                                    $fecha1=$registro['fecha_creacion'];
                                    $fecha2=$registro['fecha_correccion'];
                                    $fecha3=$registro['fecha_publicacion'];
                                    $estado=$registro['estado'];
                                    $categoria=$registro['categoria'];
                                    $imagen=$registro['imagen'];
                                    ?>
                            
                        </thead>
                        <tbody>
                            <tr>
                               
                                    
                                <th scope="row"><?php echo $num?></th>
                                <td><?php echo $autor?></td>
                                <td><?php echo $titulo?></td>
                                <td><?php echo $descripcion?></td>
                                <td><?php echo $fecha1?></td>
                                <td><?php echo $fecha2?></td>
                                <td><?php echo $fecha3?></td>
                                <td><?php echo $estado?></td>
                                <td><?php echo $categoria?></td>
                                <td><?php echo $imagen?></td>
                                <td>Algun boton</td>

                                <?php endforeach; ?>



                            </tr>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</main>