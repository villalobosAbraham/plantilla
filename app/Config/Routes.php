<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post("HOMObtenerUsuarios", "Home::HOMObtenerUsuarios");
$routes->post("HOMAgregarUsuario", "Home::HOMAgregarUsuario");
$routes->post("HOMObtenerUsuario", "Home::HOMObtenerUsuario");
$routes->post("HOMEditarUsuario", "Home::HOMEditarUsuario");
$routes->post("HOMDeshabilitarUsuario", "Home::HOMDeshabilitarUsuario");
