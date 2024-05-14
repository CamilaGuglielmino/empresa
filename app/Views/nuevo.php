<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">

                <form action="<?php echo base_url('Noticias/iniciar_sesion') ?>" method="post">
                    <section>
                        <h3 class="titulo"> Nueva Publicación</h4>
                    </section>

                    <div class="contenedor">
                        <div class="form-floating mb-3">
                            <input type="titulo" class="form-control" id="floatingInput" name="titulo" required>
                            <label for="floatingInput">Título</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="descripcion" class="form-control" id="floatingInput" name="descripcion"
                                required>
                            <label for="floatingInput">Contenido</label>
                        </div>
                        <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccionar una categoria</option>
                            <option value="1">Innovaciones y Lanzamientos</option>
                            <option value="2">Tendencias del Sector</option>
                            <option value="3">Casos de Éxito</option>
                            <option value="4">Eventos y Conferencias</option>
                        </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="imagen" class="form-control" id="floatingInput" required>
                            <label for="floatingInput">Imagen</label>
                        </div>



                    </div>
                    <div class="contenedor">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="contraseña"
                                required>
                            <label for="floatingPassword">Contraseña</label>
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