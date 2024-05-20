<?php

$session = \Config\Services::session();
$usuario = $session->get('nombreUsuario');

?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h2>Historial de noticias publicadas por <?php echo $usuario ?></h2>
                <?php $tipo = $session->get('tipo_usuario');
                $publicador = 'Publicador';
                $ambos = 'Ambos';

                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Autor </th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Fecha de Publicacion</th>
                                
                               
                                <th scope="col">Categoria</th>
                                <th scope="col">imagen</th>
                                <th scope="col">Ver detalles</th>

                            </tr>
                            <?php
                            $num = 0;
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

                                if (strcasecmp($tipo, $publicador) == 0) {
                                    if (strcasecmp($usuario, $nombrePublicador) == 0) {
                                        if (strcasecmp($estado, 'publicado') == 0) {
                                            $num++; ?>
                                        <tbody>
                                            <th scope="row"><?php echo $num ?></th>
                                            <td><?php echo $autor ?></td>
                                            <td><?php echo $titulo ?></td>
                                            <td><?php echo $fecha2 ?></td>
                                            <td><?php echo $categoria ?></td>
                                            <td><img src="<?php echo base_url('imagenes/' . $imagen) ?>" class="card-img-top"
                                                    alt="<?php echo $titulo ?>"></td>
                                            <td><a class="btn btn-secondary"
                                                    href="<?php echo base_url('Noticias/detalle?id=' . $id) ?>">Ver publicacion</a></td>
                                        </tbody>
                                    <?php }
                                    }
                                } elseif (strcasecmp($tipo, $ambos) == 0) {
                                    if (strcasecmp($usuario, $nombrePublicador) == 0) {
                                        if (strcasecmp($estado, 'publicado') == 0) {
                                            $num++;
                                            ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $num ?></th>
                                                <td><?php echo $autor ?></td>
                                                <td><?php echo $titulo ?></td>
                                                <td><?php echo $fecha2 ?></td>
                                               
                                                <td><?php echo $categoria ?></td>
                                                <td><img src="<?php echo base_url('imagenes/' . $imagen) ?>" class="card-img-top"
                                                        alt="<?php echo $titulo ?>"></td>
                                                <td><a class="btn btn-secondary"
                                                        href="<?php echo base_url('Noticias/detalle?id=' . $id) ?>">Ver publicacion</a>
                                                </td>
                                            </tr>
                                        </tbody>

                                    <?php }
                                    }
                                }
                            endforeach; ?>

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