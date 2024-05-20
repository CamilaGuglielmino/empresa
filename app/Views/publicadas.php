<?php
$session = \Config\Services::session();
$usuario = $session->get('nombreUsuario');
?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Mis noticias publicadas</h1>
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
                                <th scope="col">Fecha de Publicacion</th>
                                <th scope="col">Ver detalles</th>
                            </tr>
                        </thead>

                        <?php
                        $num = '0';
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

                            if (strcasecmp($tipo, $editor) == 0) {
                                if (strcasecmp($autor, $usuario) == 0) {
                                    if (strcasecmp($estado, 'publicado')) {
                                        $num++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $num ?></th>

                                                <td><?php echo $titulo ?></td>
                                                <td><?php echo $categoria ?></td>
                                                <td><?php echo $fecha1 ?></td>
                                                <td><?php echo $fecha2 ?></td>
                                                <td><a href="<?php echo base_url('Noticias/detalle?id=' . $id); ?>" type="button">Ver
                                                        publicación</a></td>

                                            </tr>
                                        </tbody>

                                        <?php
                                    }
                                }
                            } elseif (strcasecmp($tipo, $publicador) == 0) {

                                if (strcasecmp($usuario, $nombrePublicador) == 0) {
                                    if (strcasecmp($estado, 'publicado')) {
                                        $num++;
                                        ?>

                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $num ?></th>

                                                <td><?php echo $titulo ?></td>
                                                <td><?php echo $categoria ?></td>
                                                <td><?php echo $fecha1 ?></td>
                                                <td><?php echo $fecha2 ?></td>
                                                <td><a href="<?php echo base_url('Noticias/detalle?id=' . $id); ?>" type="button">Ver
                                                        publicación</a></td>

                                            </tr>
                                        </tbody> <?php
                                    }
                                }
                            } else {
                                if (strcasecmp($estado, 'publicado')) {
                                    $num++;
                                    ?>

                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $num ?></th>

                                            <td><?php echo $titulo ?></td>
                                            <td><?php echo $categoria ?></td>
                                            <td><?php echo $fecha1 ?></td>
                                            <td><?php echo $fecha2 ?></td>
                                            <td><a href="<?php echo base_url('Noticias/detalle?id=' . $id); ?>" type="button">Ver
                                                    publicación</a></td>

                                        </tr>
                                    </tbody>

                                <?php }
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