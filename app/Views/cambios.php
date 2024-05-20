<?php
$session = \Config\Services::session();
$usuario = $session->get('nombreUsuario');
?>
<main>
    <?php
    $num = 0;
    $num1 = 0;

    foreach ($registros as $registro):
        $id = $registro['id'];
        $autor = $registro['nombre_usuario'];
        $titulo = $registro['titulo'];
        $descripcion = $registro['descripcion'];
        $fecha1 = $registro['fecha_creacion'];
        $estado = $registro['estado'];
        $categoria = $registro['categoria'];
        $imagen = $registro['imagen'];
        $fecha2 = $registro['fecha_publicacion'];
        $nombrePublicador = $registro['nombrePublicador'];
    endforeach;
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Historial de la noticia <?php echo $id; ?></h1>
                <?php $tipo = $session->get('tipo_usuario');
                $editor = 'Editor';
                $publicador = 'Publicador';
                $ambos = 'Ambos';
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Fecha de Creacion</th>
                                <th scope="col">Ver detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($registros as $registro):
                                $id = $registro['id'];
                                $autor = $registro['nombre_usuario'];
                                $titulo = $registro['titulo'];
                                $descripcion = $registro['descripcion'];
                                $fecha1 = $registro['fecha_creacion'];
                                $estado = $registro['estado'];
                                $categoria = $registro['categoria'];
                                $imagen = $registro['imagen'];
                                $fecha2 = $registro['fecha_publicacion'];
                                $nombrePublicador = $registro['nombrePublicador'];
                                $num++;
                                ?>

                                <tr>
                                    <th scope="row"><?php echo $num ?></th>
                                    <td><?php echo $titulo ?></td>
                                    <td><?php echo $categoria ?></td>
                                    <td><?php echo $fecha1 ?></td>
                                    <td><a class="btn btn-secondary" href="<?php echo base_url('Noticias/ver?id=' . $id); ?>" type="button">Ver
                                            publicación</a></td>
                                </tr>
                                <?php

                            endforeach; ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha de Correccion</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Ver detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($correcciones as $corregir):
                                $id1 = $corregir['id_noticia'];
                                $titulo1 = $corregir['titulo'];
                                $descripcion1 = $corregir['descripcion'];
                                $fecha2 = $corregir['fecha_correccion'];
                                $estado1 = $corregir['estado'];
                                $categoria1 = $corregir['categoria'];
                                $imagen1 = $corregir['imagen'];
                                $num1++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $num ?></th>
                                    <td><?php echo $titulo1 ?></td>
                                    <td><?php echo $descripcion1 ?></td>
                                    <td><?php echo $fecha2 ?></td>
                                    <td><?php echo $categoria1 ?></td>
                                    <td><img src="<?php echo base_url('imagenes/'.$imagen)?>" class="card-img-top" alt="<?php echo $titulo?>"></td>
                                    <td><a class="btn btn-secondary" href="<?php echo base_url('Noticias/ver?id=' . $id); ?>" type="button">Elegir para validar</a></td>
                                </tr>
                                <?php

                            endforeach; ?>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        td,
        th {
            border: 1px solid #dddddd !important;
            text-align: left !important;
            padding: 8px !important;
        }
    </style>
</main>