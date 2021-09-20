<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'login']);

// User Management
$routes->get('/user', 'User::index', ['filter' => 'role:Superuser,Admin']);
$routes->get('/user/index', 'User::index', ['filter' => 'role:Superuser,Admin']);
$routes->get('/user/(:num)', 'User::edit/$1', ['filter' => 'role:Superuser,Admin']);
$routes->post('/user/(:num)', 'User::update/$1', ['filter' => 'role:Superuser,Admin']);
$routes->delete('/user/(:num)', 'User::delete/$1', ['filter' => 'role:Superuser,Admin']);

// Inventory
$routes->get('/inventory', 'Inventory::index');
$routes->post('/inventory/save', 'Inventory::save');
$routes->get('/inventory/detail/(:num)', 'Inventory::detail/$1');
$routes->post('/inventory/(:num)', 'Inventory::update/$1');
$routes->delete('/inventory/(:num)', 'Inventory::delete/$1');

// Supplier
$routes->get('/supplier', 'Supplier::index');
$routes->post('/supplier', 'Supplier::save');
$routes->get('/supplier/detail/(:num)', 'Supplier::detail/$1');
$routes->post('/supplier/(:num)', 'Supplier::update/$1');
$routes->delete('/supplier/(:num)', 'Supplier::delete/$1');

// Konsumen
$routes->get('/konsumen', 'Konsumen::index');
$routes->post('/konsumen', 'Konsumen::save');
$routes->get('/konsumen/detail/(:num)', 'Konsumen::detail/$1');
$routes->post('/konsumen/(:num)', 'Konsumen::update/$1');
$routes->delete('/konsumen/(:num)', 'Konsumen::delete/$1');

// Kategori
$routes->post('/kategori', 'Kategori::save');
$routes->post('/kategori/(:num)', 'Kategori::update/$1');
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1');

// Satuan
$routes->post('/satuan', 'Satuan::save');
$routes->post('/satuan/(:num)', 'Satuan::update/$1');
$routes->delete('/satuan/(:num)', 'Satuan::delete/$1');

// Penjualan

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
