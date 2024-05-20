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
$routes->post('Noticias/new', 'Noticias::new');
$routes->get('/historial', 'Noticias::historial');
$routes->get('Noticias/index', 'Noticias::index');
$routes->get('Noticias/editar', 'Noticias::editar');
$routes->post('Noticias/actualizar', 'Noticias::actualizar');
$routes->get('/detalle', 'Noticias::detalle');
$routes->get('Noticias/categoria', 'Noticias::categoria');
$routes->get('Noticias/detalle', 'Noticias::detalle');
$routes->get('Noticias/descartar', 'Noticias::descartar');
$routes->get('Noticias/validar', 'Noticias::validar');
$routes->get('borradores', 'Noticias::borradores');
$routes->get('validar', 'Noticias::vista');
$routes->get('Noticias/borrador', 'Noticias::borrador');
$routes->get('Noticias/anular', 'Noticias::anular');
$routes->get('Noticias/ver', 'Noticias::ver');
$routes->get('automatico', 'Noticias::automatico');
$routes->get('Noticias/despublicar', 'Noticias::despublicar');
$routes->get('publicadas', 'Noticias::publicada');
$routes->get('descartadas', 'Noticias::descartadas');
$routes->get('Noticias/cambios', 'Noticias::cambios');
























/*$routes->get('/', 'login::index');
$routes->post('login/process', 'login::process');*/




