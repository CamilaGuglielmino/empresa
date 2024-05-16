<?php

$session = \Config\Services::session();


?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1>Historial </h1>
                <?php $tipo = $session->get('tipo_usuario');
                $editor = 'Editor';
                $publicador = 'Publicador';
                $ambos = 'Ambos';
                ?>

                <small></small>
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
                            $num = '0';
                            foreach ($registros as $registro):

                                if (strcasecmp($tipo, $editor) == 0) {
                                    $autor = $registro['nombre_usuario'];
                                    $usuario = $session->get('nombreUsuario');

                                    if (strcasecmp($autor, $usuario) == 0) {
                                        $num++;
                                        $id = $registro['id'];
                                        $titulo = $registro['titulo'];
                                        $descripcion = $registro['descripcion'];
                                        $fecha1 = $registro['fecha_creacion'];
                                        $fecha2 = $registro['fecha_correccion'];
                                        $fecha3 = $registro['fecha_publicacion'];
                                        $estado = $registro['estado'];
                                        $categoria = $registro['categoria'];
                                        $imagen = $registro['imagen'];
                                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $num ?></th>
                                            <td><?php echo $autor ?></td>
                                            <td><?php echo $titulo ?></td>
                                            <td><?php echo $descripcion ?></td>
                                            <td><?php echo $fecha1 ?></td>
                                            <td><?php echo $fecha2 ?></td>
                                            <td><?php echo $fecha3 ?></td>
                                            <td><?php echo $estado ?></td>
                                            <td><?php echo $categoria ?></td>
                                            <td><?php echo $imagen ?></td>

                                            <?php
                                            $borrador = 'Borrador';
                                            if (strcasecmp($estado, $borrador) == 0) { ?>
                                                <td>
                                                    <a href="<?php echo base_url('Noticias/editar?id=' . $id); ?>" role="button"
                                                        title="editar"><button><svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                height="35" fill="green" class="bi bi-pencil-square"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </button></a> </svg>
                                                    <br><br><br>
                                                </td>
                                                <td>
                                                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
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
                                                                    <button class="" data-bs-toggle="modal">No</button>
                                                                    <button class="" data-bs-toggle="modal">Sí</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="red"
                                                            class="bi bi-x-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                        </svg></button>
                                                </td>

                                            <?php } else {
                                                ?>
                                                <td>No se puede realizar acciones</td>
                                                <?php
                                            }


                                    }
                                } else {
                                    $num++;
                                    $autor = $registro['nombre_usuario'];
                                    $titulo = $registro['titulo'];
                                    $descripcion = $registro['descripcion'];
                                    $fecha1 = $registro['fecha_creacion'];
                                    $fecha2 = $registro['fecha_correccion'];
                                    $fecha3 = $registro['fecha_publicacion'];
                                    $estado = $registro['estado'];
                                    $categoria = $registro['categoria'];
                                    $imagen = $registro['imagen']; ?>
                                        </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $num ?></th>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $autor ?></td>
                                        <td><?php echo $titulo ?></td>
                                        <td><?php echo $descripcion ?></td>
                                        <td><?php echo $fecha1 ?></td>
                                        <td><?php echo $fecha2 ?></td>
                                        <td><?php echo $fecha3 ?></td>
                                        <td><?php echo $estado ?></td>
                                        <td><?php echo $categoria ?></td>
                                        <td><?php echo $imagen ?></td>
                                        <?php
                                        $publicado = 'Publicado';
                                        if (!strcasecmp($estado, $publicado) == 0) {

                                            if (strcasecmp($tipo, $publicador) == 0) { ?>
                                                <td>
                                                    <a href="" title="Validar" role="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                                                            class="bi bi-check-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                        </svg>
                                                    </a>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <a href="" title="Solicitar Correccion" role="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="blue"
                                                            class="bi bi-send" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                                        </svg>

                                                    </a>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <a href="" title="Anular" role="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black"
                                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                        </svg>
                                                    </a>
                                                </td>

                                                <?php
                                            } else { ?>
                                                <td>
                                                    <a href="" title="Validar" role="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                                                            class="bi bi-check-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                        </svg>
                                                    </a>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <a href="" title="Solicitar Correccion" role="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="blue"
                                                            class="bi bi-send" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                                        </svg>

                                                    </a>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <a href="" title="Anular" role="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black"
                                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                        </svg>
                                                    </a>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <a href="" role="button"
                                                        title="editar"><button><svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                height="35" fill="green" class="bi bi-pencil-square"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </button></a> </svg>
                                                    <br>
                                                    <br>
                                                    <br>                        
                                                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
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
                                                                    <button class="" data-bs-toggle="modal">No</button>
                                                                    <button class="" data-bs-toggle="modal">Sí</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="red"
                                                            class="bi bi-x-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                        </svg></button>
                                                </td>
                                                </td>

                                            <?php }
                                        }

                                        ?>

                                    <?php }

                            endforeach; ?>



                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</main>