<?php

$session = \Config\Services::session();
$usuario = $session->get('nombreUsuario');

?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Publicaciones automaticas </h1>
                <h4>Las publicaciones que estan para validar por más de 5 días se publican automaticamente.</h4>
                <?php $tipo = $session->get('tipo_usuario');
                $publicador = 'Publicador';
                $ambos = 'Ambos';
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Fecha de Creacion</th>
                                <th scope="col">Fecha de Publicacion automatica</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">imagen</th>
                                <th scope="col">Acciones</th>

                            </tr>
                            <?php
                            $num = '0';
                            foreach ($registros as $registro):
                                $id = $registro['id'];
                                $autor = $registro['nombre_usuario'];
                                $titulo = $registro['titulo'];
                                $descripcion = $registro['descripcion'];
                                $estado=$registro['estado'];
                                $estado1=$registro['estado1'];
                                $fecha = $registro['fecha_creacion'];
                                $fecha1 = $registro['fecha_publicacion'];
                                $categoria = $registro['categoria'];
                                $imagen = $registro['imagen'];


                                $num++; ?>
                            <tbody>
                                <?php if(strcasecmp($estado1, 'automaticamente')==0){ ?>
                                <th scope="row"><?php echo $num ?></th>
                                <td><?php echo $autor ?></td>
                                <td><?php echo $titulo ?></td>
                                <td><?php echo $fecha ?></td>
                                <td><?php echo $fecha1 ?></td>
                                <td><?php echo $estado1 ?></td>
                                <td><?php echo $categoria ?></td>
                                <td><?php echo $imagen ?></td>
                                <td>
                                            <a class="btn btn-secondary" href="<?php echo base_url('Noticias/ver?id=' . $id); ?>"
                                                role="button">Ver</a>
                                        </td>
                            </tbody>
                            

                            <?php
                                }
                            endforeach; ?>

                    </table>

                </div>
            </div>
        </div>
    </div>


</main>