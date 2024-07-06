<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// LOGIN
$routes->get('/', 'Home::index');
$routes->post("HOMIniciarSesion", "Home::HOMIniciarSesion");

//REGISTRO
$routes->get('/registro', 'Home::registro');
$routes->post("HOMObtenerUsuarios", "Home::HOMObtenerUsuarios");
$routes->post("HOMAgregarUsuario", "Home::HOMAgregarUsuario");
$routes->post("HOMObtenerUsuario", "Home::HOMObtenerUsuario");
$routes->post("HOMEditarUsuario", "Home::HOMEditarUsuario");
$routes->post("HOMDeshabilitarUsuario", "Home::HOMDeshabilitarUsuario");
$routes->post("HOMEliminarUsuario", "Home::HOMEliminarUsuario");
