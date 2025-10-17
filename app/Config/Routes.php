<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/menu', 'Menu::index');
$routes->get('/menu/detail/(:num)', 'Menu::detail/$1');
$routes->get('menu/detail/(:num)', 'Menu::detail/$1');
$routes->post('menu/orderNow', 'Menu::orderNow');

$routes->get('daftar_login', 'Home::daftar_login');
$routes->get('/kelola-menu', 'MenuController::index'); 
$routes->get('/logout', 'AuthController::logout');

$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');

$routes->post('/cart/updateQty/(:num)', 'Cart::updateQty/$1');
$routes->post('/cart/checkout', 'Cart::checkout');
$routes->post('/cart/updateQtyAjax/(:num)', 'Cart::updateQtyAjax/$1');

$routes->get('/order/checkout', 'Order::checkout');

