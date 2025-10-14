<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu', 'Menu::index');
$routes->get('daftar_login', 'Home::daftar_login');
$routes->get('/kelola-menu', 'MenuController::index'); 
$routes->get('/logout', 'AuthController::logout');



