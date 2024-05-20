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
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Fecha de publicación el <?php echo $fechaInvertida; ?> , Autor: <?php echo $autor; ?>
                    </div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $categoria ?></a>


                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded"
                src="<?php echo base_url('imagenes/'.$imagen)?>" alt="..." /></figure>
                        
                <!-- Post content-->
                <section class="mb-5">
                    <?php echo $descripcion?>
                </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
                
            </section>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">

            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categorias</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-unstyled mb-0">
                                <?php
                                $var1 = 'Innovaciones y Lanzamientos';
                                $var2 = 'Tendencias del Sector';
                                $var3 = 'Casos de Éxito';
                                $var4 = 'Eventos y Conferencias';

                                ?>
                                <li><a class="btn btn-info"
                                    href="<?php echo base_url('Noticias/categoria?var=' . $var1); ?>">Innovaciones y
                                    Lanzamientos</a></li>
                                    <br>
                                <li><a class="btn btn-info"
                                    href="<?php echo base_url('Noticias/categoria?var=' . $var2); ?>">Tendencias del
                                    Sector</a></li>
                                    <br>

                                <li><a class="btn btn-info"
                                    href="<?php echo base_url('Noticias/categoria?var=' . $var3); ?>">Casos
                                    de Éxito</a></li>
                                    <br>

                                <li><a class="btn btn-info"
                                    href="<?php echo base_url('Noticias/categoria?var=' . $var4); ?>">Eventos
                                    y Conferencias</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>