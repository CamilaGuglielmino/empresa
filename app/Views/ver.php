<?php
foreach ($dato as $dat):
    $id = $dat['id'];
    $autor = $dat['nombre_usuario'];
    $titulo = $dat['titulo'];
    $descripcion = $dat['descripcion'];
    $categoria = $dat['categoria'];
    $imagen = $dat['imagen'];
    $fecha1 = $dat['fecha_publicacion'];
    $fechaInvertida = date("d-m-Y", strtotime($fecha1));
    $validar = 'validar';
    $estado = $dat['estado'];


endforeach;
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo $titulo ?></h1>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $categoria ?></a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo base_url('imagenes/' . $imagen) ?>"
                        alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <?php echo $descripcion ?>
                </section>
            </article>

        </div>
        <div class="col-lg-4">

            <!-- Categories widget-->
            <div class="card mb-4">
                <?php
                if (strcasecmp($estado, $validar) == 0) { ?>
                    <a class="btn btn-success" href="<?php echo base_url('Noticias/validar?id=' . $id); ?>"
                        role="button">Publicar</a>

                    <a class="btn btn-info"" href=" <?php echo base_url('Noticias/borrador?id=' . $id); ?>"
                        role="button">Solitar corrección</a>

                    <a class="btn btn-warning"" href=" <?php echo base_url('Noticias/anular?id=' . $id); ?>"
                        role="button">Descartar noticia</a>
                    <a class="btn btn-secondary" roll="button" href="<?php echo base_url('/validar'); ?>">Volver a
                        Validar</a>
                <?php } else {
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url('Noticias/editar?id=' . $id); ?>"
                        role="button">Editar</a>
                    <a class="btn btn-info" href="<?php echo base_url('Noticias/descartar?id=' . $id); ?>"
                        role="button">Descartar</a>
                    <a class="btn btn-secondary" roll="button" href="<?php echo base_url('/borradores'); ?>">Volver a
                        Borradores</a>
                <?php } ?>
            </div>

        </div>
    </div>
</div>