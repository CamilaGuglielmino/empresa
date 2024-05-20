<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">

                <form action="<?php echo base_url('Noticias/new') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <section>
                        <h3 class="titulo"> Nueva noticia</h4>
                    </section>

                    <div class="contenedor">
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="titulo" class="form-control" id="titulo" name="titulo" required>

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                            <textarea type="descripcion" class="form-control" id="descripcion" rows="3"
                                name="descripcion" required></textarea>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="categoria" required>
                                <option selected>Seleccionar una categoria</option>
                                <option value="Innovaciones y Lanzamientos">Innovaciones y Lanzamientos</option>
                                <option value="Tendencias del Sector">Tendencias del Sector</option>
                                <option value="Casos de Éxito">Casos de Éxito</option>
                                <option value="Eventos y Conferencias">Eventos y Conferencias</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="formFile">Imagen</label>
                            <input type="file" name="imagen" class="form-control" id="formFile"
                                required>
                            
                        </div>

                    </div>
                        <br>
                        <br>

                        <input class="submitBtn" type="submit" name="estado" value="Borrador">
                        <input class="submitBtn" type="submit" name="estado" value="Validar">



                </form>
                <br>
                <br>


            </div>
        </div>
    </div>
</main>