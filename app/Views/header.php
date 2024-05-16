<?php

$session = \Config\Services::session();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Noticias</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('/'); ?>">
                <img id="logo" src="..\public\imagenes\logo.png" height="120">
            </a>

            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                        aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                            class="fas fa-search"></i></button>
                </div>
            </form> -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!--CATEGORIAS-->
                    <li class="nav-item">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo base_url('categoria'); ?>">Innovaciones y Lanzamientos</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('categoria'); ?>">Tendencias del Sector</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('categoria'); ?>">Casos de Éxito</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('categoria'); ?>">Eventos y Conferencias</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <?php if($session->has('nombreUsuario')){
                        
                        $tipo=$session->get('tipo_usuario');
                        $editar='Editor';
                        $publicador='Publicador';
                        $ambos='Ambos';
                        ?>                                        
                    <li class="nav-item">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <!-- icono con session -->
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                <?php echo 'Bienvenido '; echo $session->get('nombreUsuario');?>
                                </a>
                                <?php if (strcasecmp($tipo, $editar)==0) { ?>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    <li><a class="dropdown-item" href="<?php echo base_url('nuevo') ?>">Nuevo</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('historial') ?>">Historial</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Noticias/logout') ?>">Salir</a></li>
                                </ul>
                              <?php  } elseif (strcasecmp($tipo, $publicador)==0) {?>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    <li><a class="dropdown-item" href="<?php echo base_url('historial') ?>">Historial</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Noticias/logout') ?>">Salir</a></li>
                                </ul>

                              <?php } elseif (strcasecmp($tipo, $ambos)==0) {?>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   
                                    <li><a class="dropdown-item" href="<?php echo base_url('nuevo') ?>">Nuevo</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('historial') ?>">Historial</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Noticias/logout') ?>">Salir</a></li>
                                </ul>

                             <?php }?>
                                
                            </li>
                        </ul>
                    </li>                    
                    <?php } else { ?>
                    <li class="nav-item">
                        <!-- icono sin session-->
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#!">Ayuda</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('login') ?>">Ingresar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>                                
         </div>
        </div>
    </nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

</html>