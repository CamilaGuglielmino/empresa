<?php if (session()->has('error_message')): ?>
    <div class="alert alert-success">
        <?= session('error_message') ?>
    </div>
<?php endif; ?>
<main>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <form action="<?php echo base_url('Usuarios/iniciar_sesion')?>" method="post">
                <section>
                    <h3 class="titulo"> Iniciar Sesión</h4>
                </section>

                <div class="contenedor">

                    <div class="form-floating mb-3">
                        <input type="nombreUsuario" class="form-control" id="floatingInput" 
                            name="nombreUsuario" required>
                        <label for="floatingInput">Nombre de Usuario</label>
                    </div>
                </div>
                <div class="contenedor">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" 
                            name="contraseña" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                </div>
                <br>
                <br>
                <input class="submitBtn" type="submit" name="iniciar" value="Ingresar">
            </form>
            <br>
            <br>

        </div>
    </div>
</div>
</main>