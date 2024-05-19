<?php

$session = \Config\Services::session();

$tipo = $session->get('tipo_usuario');
$editor = 'Editor';
$publicador = 'Publicador';
$ambos = 'Ambos';
$num = '0';

?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12"></div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">imagen</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                    <?php
                    foreach ($registros as $registro):
                        $id = $registro['id'];
                        $autor = $registro['nombre_usuario'];
                        $titulo = $registro['titulo'];
                        $descripcion = $registro['descripcion'];
                        $fecha1 = $registro['fecha_creacion'];
                        $fecha2 = $registro['fecha_correccion'];
                        $fecha3 = $registro['fecha_publicacion'];
                        $estado = $registro['estado'];
                        $categoria = $registro['categoria'];
                        $imagen = $registro['imagen'];
                        $usuario = $session->get('nombreUsuario');
                        ?>
                    </thead>
                    <?php
                    $validar = 'Validar';
                    if (strcasecmp($estado, $validar) == 0) {
                        $num++;
                        ?>
                        <tbody>
                            <tr data-id="<?php echo $id ?>">
                                <th scope="row"><?php echo $num ?></th>
                                <td><?php echo $autor ?></td>
                                <td><?php echo $titulo ?></td>
                                <td><?php echo $fecha1 ?></td>
                                <td><?php echo $categoria ?></td>
                                <td><?php echo $imagen ?></td>
                                <td>
                                    <a class="btn btn-secondary" href="<?php echo base_url('Noticias/ver?id=' . $id); ?>"
                                        role="button">Ver</a>
                                </td>
                            </tr>
                        </tbody>
                    <?php }

                    endforeach; ?>

            </table>

            <?php if ($num == '0') {
                ?>
                <div class="card">
                    <h2>No hay noticias para validar</h2>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            <?php } ?>
        </div>
    </div>
</main>