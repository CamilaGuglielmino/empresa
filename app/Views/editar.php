<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">

                <form action="<?php echo base_url('Noticias/actualizar') ?>" method="post" enctype="multipart/form-data" >
                    <section>
                        <h3 class="titulo"> Editar Noticia</h4>
                    </section>
                   <?php
                     //  $id = $dato['dato']; 
                    
                    foreach ($dato as $dat):
                        $id=$dat['id'];
                        $titulo=$dat['titulo'];
                        $descripcion=$dat['descripcion'];
                        $categoria=$dat['categoria'];
                        $imagen=$dat['imagen'];

                       
                    endforeach;
                   ?>


                    <div class="contenedor">
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="titulo" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                            <textarea type="descripcion" class="form-control" id="descripcion" rows="3" name="descripcion"  required> <?php echo $descripcion?></textarea>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="categoria" required>
                            <option <?php if ($categoria == 'Innovaciones y Lanzamientos') echo 'selected'; ?> value="1">Innovaciones y Lanzamientos</option>
                            <option <?php if ($categoria == 'Tendencias del Sector') echo 'selected'; ?> value="2">Tendencias del Sector</option>
                            <option <?php if ($categoria == 'Casos de Éxito') echo 'selected'; ?> value="3">Casos de Éxito</option>
                            <option <?php if ($categoria == 'Eventos y Conferencias') echo 'selected'; ?> value="4">Eventos y Conferencias</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="formFile">Imagen</label>
                            <input type="file" name="imagen" class="form-control" id="formFile" accept="image/png" required>
                            <small>*Subir imagen en formato png</small>
                        </div>

                    </div>
                        <br>
                        <br>

                        <input class="submitBtn" type="submit" name="crear" value="Crear">


                </form>
                <br>
                <br>


            </div>
        </div>
    </div>

</main>