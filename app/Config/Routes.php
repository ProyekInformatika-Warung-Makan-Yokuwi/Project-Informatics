<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::home');

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
$routes->get('/logout', 'Login::logout');

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

// =========================
// Kelola Menu
// =========================
$routes->get('/admin/kelola-menu', 'Admin::kelolaMenu');
$routes->get('/admin/kelola-menu/edit/(:num)', 'Admin::editMenu/$1');
$routes->post('/admin/kelola-menu/update/(:num)', 'Admin::updateMenu/$1');
$routes->get('/admin/kelola-menu/delete/(:num)', 'Admin::deleteMenu/$1');

// ✅ Tambah Menu Baru
$routes->get('/admin/kelola-menu/tambah', 'Admin::tambahMenu');
$routes->post('/admin/kelola-menu/simpan', 'Admin::simpanMenu');

// =========================
// Admin
// =========================
$routes->get('/daftar_login', 'Admin::daftarLogin');
