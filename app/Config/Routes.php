<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/wisata', 'Wisata::index');
$routes->get('/create', 'Wisata::create');
$routes->get('/fasilitas', 'Fasilitas::index');
$routes->get('/tempat',    'Tempat::index');
$routes->get('/kelurahan', 'Kelurahan::index');
$routes->get('/kecamatan', 'Kecamatan::index');

// fasilitas
$routes->get('/fasilitas/create', 'Fasilitas::create');
$routes->post('/fasilitas/simpan', 'Fasilitas::simpan');
$routes->get('/fasilitas/edit/(:segment)', 'Fasilitas::edit/$1');
$routes->post('/fasilitas/update/(:segment)', 'Fasilitas::update/$1');
$routes->delete('/fasilitas/(:num)', 'Fasilitas::delete/$1');

// kecamatan
$routes->get('/kecamatan/create', 'Kecamatan::create');
$routes->post('/kecamatan/simpan', 'Kecamatan::simpan');
$routes->get('/kecamatan/edit/(:segment)', 'Kecamatan::edit/$1');
$routes->post('/kecamatan/update/(:segment)', 'Kecamatan::update/$1');
$routes->delete('/kecamatan/(:num)', 'Kecamatan::delete/$1');
// akhir

// jenis
$routes->get('/jenis/create', 'jenis::create'); 
$routes->post('/jenis/simpan', 'jenis::simpan'); 
$routes->get('/jenis/edit/(:segment)', 'jenis::edit/$1'); 
$routes->post('/jenis/update/(:segment)', 'jenis::update/$1'); 
$routes->delete('/jenis/(:num)','jenis::delete/$1'); 
// akhir

// kelurahan
// $routes->get('/kecamatan/create', 'Kecamatan::create');
// $routes->post('/kecamatan/simpan', 'Kecamatan::simpan');
// $routes->post('/kecamatan/update', 'Kecamatan::update');
// $routes->delete('/kecamatan/(:num)', 'Kecamatan::delete/$1');
// akhir

$routes->get('/jenis',     'Jenis::index');
$routes->get('/admin',     'Admin::index');
$routes->get('/ulasan',    'Ulasan::index');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}