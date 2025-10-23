<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// =========================
// MENU
// =========================
$routes->get('/menu', 'Menu::index');
$routes->get('/menu/detail/(:num)', 'Menu::detail/$1');
$routes->post('/menu/orderNow', 'Menu::orderNow');

// =========================
// LOGIN & REGISTER
// =========================
$routes->get('/login', 'Home::login');
$routes->post('/login/process', 'Login::process');
$routes->get('/daftar_login', 'Home::daftar_login');
$routes->get('/logout', 'AuthController::logout');

// =========================
// ADMIN: KELOLA MENU
// =========================
$routes->get('/kelola-menu', 'MenuController::index');

// =========================
// CART
// =========================
$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
$routes->post('/cart/updateQty/(:num)', 'Cart::updateQty/$1');
$routes->post('/cart/updateQtyAjax/(:num)', 'Cart::updateQtyAjax/$1');
$routes->post('/cart/checkout', 'Cart::checkout');

// =========================
// ORDER
// =========================
$routes->get('/order/checkout', 'Order::checkout');
$routes->get('/order/payment', 'Order::payment');
$routes->post('/order/payNow', 'Order::payNow');
$routes->get('/order/qris', 'Order::qris');

// ✅ route konfirmasi pembayaran (POST)
$routes->post('/order/confirmPayment', 'Order::confirmPayment');

// ✅ halaman sukses pembayaran
$routes->get('/order/payment_success', 'Order::paymentSuccess');
$routes->get('/order/success', 'Order::success');

