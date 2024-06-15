<?php

$session = \Config\Services::session();

$tipo = $session->get('tipo_usuario');
$num = '0';

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <h2>Mis borradores activos</h2>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Categoria</th>
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

                                    <td><?php echo $titulo ?></td>
                                    <td><?php echo $fecha1 ?></td>

                                    <td><?php echo $categoria ?></td>

                                    <td>
                                        <a class="btn btn-secondary" href="<?php echo base_url('Noticias/cambios?id=' . $id); ?>"
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
                <h3>No hay borradores activos</h3>
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

<style>
    td,
    th {
        border: 1px solid #dddddd !important;
        text-align: left !important;
        padding: 8px !important;
    }
</style>
</main>