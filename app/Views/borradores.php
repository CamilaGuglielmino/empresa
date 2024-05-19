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
        <h2>Mis borradores</h2>
        <div class="row">

            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Fecha de Creacion</th>
                            <th scope="col">Fecha de Correccion</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">imagen</th>
                            <th colspan="2">Acciones</th>
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
                            $fecha2 = $registro['fecha_correccion'];
                            $estado = $registro['estado'];
                            $categoria = $registro['categoria'];
                            $imagen = $registro['imagen'];
                            $usuario = $session->get('nombreUsuario');

                            if (strcasecmp($autor, $usuario) == 0) {
                                $borrador = 'Borrador';
                                if (strcasecmp($estado, $borrador) == 0) {
                                    $num++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $num ?></th>
                                        <td><?php echo $registro['nombre_usuario']; ?></td>
                                        <td><?php echo $titulo ?></td>
                                        <td><?php echo $fecha1 ?></td>
                                        <td><?php echo $fecha2 ?></td>
                                        <td><?php echo $categoria ?></td>
                                        <td><?php echo $imagen ?></td>
                                        <td>
                                            <a class="btn btn-secondary" href="<?php echo base_url('Noticias/ver?id=' . $id); ?>"
                                                role="button">Ver</a>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($num == '0') {
                ?>
                <div class="card">
                    <h3>No hay noticias para validar</h3>
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