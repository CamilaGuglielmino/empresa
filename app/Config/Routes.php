<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Noticias::index');
$routes->get('/login', 'Noticias::login');
$routes->post('Noticias/iniciar_sesion', 'Noticias::iniciar_sesion');
$routes->get('Noticias/logout', 'Noticias::logout');
$routes->get('/nuevo', 'Noticias::nuevo');



/*$routes->get('/', 'login::index');
$routes->post('login/process', 'login::process');*/




