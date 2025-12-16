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
$routes->post('/cart/checkout', 'Order::checkout');

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

// ✅ download nota PDF
$routes->get('/order/downloadNota/(:num)', 'Order::downloadNota/$1');

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

// =========================
// CRUD Informasi Akun
// =========================
$routes->get('admin/tambah-akun', 'Admin::tambahAkun');
$routes->post('admin/simpan-akun', 'Admin::simpanAkun');

$routes->get('admin/edit-akun/(:num)', 'Admin::editAkun/$1');
$routes->post('admin/update-akun/(:num)', 'Admin::updateAkun/$1');

$routes->get('admin/hapus-akun/(:num)', 'Admin::hapusAkun/$1');

// =========================
// NOTIFICATIONS
// =========================
$routes->get('/admin/notifications', 'Admin::getNotifications');
$routes->post('/admin/notifications/mark-read/(:num)', 'Admin::markNotificationRead/$1');
$routes->post('/admin/notifications/mark-all-read', 'Admin::markAllRead');

$routes->get('riwayat-pesanan', 'Home::riwayatPesanan');
