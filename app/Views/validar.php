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
                        $fecha3 = $registro['fecha_publicacion'];
                        $estado = $registro['estado'];
                        $categoria = $registro['categoria'];
                        $imagen = $registro['imagen'];
                        $usuario = $session->get('nombreUsuario');
                        $num++;
                        ?>
                    </thead>
                    <?php
                    $validar = 'Validar';
                    if (strcasecmp($estado, $validar) == 0) { ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $num ?></th>
                                <td><?php echo $autor ?></td>
                                <td><?php echo $titulo ?></td>
                                <td><?php echo $fecha1 ?></td>
                                <td><?php echo $categoria ?></td>
                                <td><?php echo $imagen ?></td>
                                <td>
                                    <!--boton validar-->
                                    <div class="modal fade" id="exampleModalToggle1" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">¿Esta
                                                        seguro que desea publicar esta noticia?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary"
                                                        href="<?php echo base_url('Noticias/validar?id=' . $id); ?>"
                                                        role="button">SI</a>
                                                    <a class="btn btn-secondary" data-bs-toggle="modal"
                                                        href="<?php echo base_url('/') ?>" role="button">NO</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                                            class="bi bi-check-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                        </svg>
                                    </button>
                                </td>
                                <td>
                                    <!--Corregir-->
                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">¿Esta
                                                        seguro que desea enviar a corregir esta noticia?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary"
                                                        href="<?php echo base_url('Noticias/borrador?id=' . $id); ?>"
                                                        role="button">SI</a>
                                                    <a class="btn btn-secondary" data-bs-toggle="modal"
                                                        href="<?php echo base_url('/') ?>" role="button">NO</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="blue"
                                            class="bi bi-send" viewBox="0 0 16 16">
                                            <path
                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                        </svg>
                                    </button>
                                </td>
                                <td>
                                <!--Anular-->
                                <div class="modal fade" id="exampleModalToggle3" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">¿Esta
                                                    seguro que desea anular esta noticia?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-footer">
                                                <a class="btn btn-secondary"
                                                    href="<?php echo base_url('Noticias/anular?id=' . $id); ?>"
                                                    role="button">SI</a>
                                                <a class="btn btn-secondary" data-bs-toggle="modal"
                                                    href="<?php echo base_url('/') ?>" role="button">NO</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black"
                                        class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>

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