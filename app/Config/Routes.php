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

$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');

$routes->post('/cart/updateQty/(:num)', 'Cart::updateQty/$1');
