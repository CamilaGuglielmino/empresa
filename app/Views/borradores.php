<?php

$session = \Config\Services::session();

$tipo = $session->get('tipo_usuario');
$editor = 'Editor';
$publicador = 'Publicador';
$ambos = 'Ambos';
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
                        <th scope="col">Fecha de Correccion</th>

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
                        $fecha1 = $registro['fecha_creacion'];
                        $fecha2 = $registro['fecha_correccion'];

                        $estado = $registro['estado'];
                        $categoria = $registro['categoria'];
                        $imagen = $registro['imagen'];


                        $usuario = $session->get('nombreUsuario');

                        if (strcasecmp($autor, $usuario) == 0) {
                            $num++;

                            ?>
                        </thead>
                        <?php
                        $borrador = 'Borrador';
                        if (strcasecmp($estado, $borrador) == 0) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $num ?></th>
                                    <td><?php echo $autor ?></td>
                                    <td><?php echo $titulo ?></td>
                                    <td><?php echo $fecha1 ?></td>
                                    <td><?php echo $fecha2 ?></td>
                                    <td><?php echo $categoria ?></td>
                                    <td><?php echo $imagen ?></td>

                                    <td>
                                        <div class="modal fade" id="exampleModalToggle1" aria-hidden="true"
                                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">¿Esta
                                                            seguro que desea editar esta noticia?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary"
                                                            href="<?php echo base_url('Noticias/editar?id=' . $id); ?>"
                                                            role="button">SI</a>
                                                        <a class="btn btn-secondary" data-bs-toggle="modal"
                                                            href="<?php echo base_url('/') ?>" role="button">NO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg></button>
                                    </td>
                                    <td>
                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">¿Esta
                                                        seguro que desea eliminar?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    La publicación quedara anulada y no podrá volver a corregirla.
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary"
                                                        href="<?php echo base_url('Noticias/descartar?id=' . $id); ?>"
                                                        role="button">SI</a>
                                                    <a class="btn btn-secondary" data-bs-toggle="modal"
                                                        href="<?php echo base_url('/') ?>" role="button">NO</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="red"
                                            class="bi bi-x-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg></button>

                                    </td>
                                </tr>
                            </tbody>
                        <?php }
                        }

                    endforeach; ?>

            </table>
        </div>
    </div>
</main>