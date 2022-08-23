<?php

namespace Config;

use App\Filters\checkLogged;

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

//USERS
$routes->get('/', 'User::index');
$routes->get('/map', 'User::map');
$routes->get('/objek-wisata', 'User::objekWisata');

//LOGIN
$routes->get('/login', 'User::login');
$routes->get('/logout', 'User::logout');
$routes->post('/auth/login', 'User::authLogin');

$routes->group('/', ['filter' => checkLogged::class], static function ($routes) {
    $routes->get('/admin', 'Home::index');
    $routes->get('/wisata', 'Wisata::index');
    $routes->get('/wisata/map', 'Wisata::map');
    $routes->get('/wisata/create', 'Wisata::create');
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

    // wisata
    $routes->get('/wisata/create', 'Wisata::create');
    $routes->post('/wisata/simpan', 'Wisata::simpan');
    $routes->get('/wisata/edit/(:segment)', 'Wisata::edit/$1');
    $routes->post('/wisata/update/(:segment)', 'Wisata::update/$1');
    $routes->delete('/wisata/(:num)', 'Wisata::delete/$1');

    // Tempat
    $routes->get('/tempat/create', 'Tempat::create');
    $routes->post('/tempat/simpan', 'Tempat::simpan');
    $routes->get('/tempat/edit/(:segment)', 'Tempat::edit/$1');
    $routes->post('/tempat/update/(:segment)', 'Tempat::update/$1');
    $routes->delete('/tempat/(:num)', 'Tempat::delete/$1');


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
    $routes->delete('/jenis/(:num)', 'jenis::delete/$1');
    // akhir

    // kelurahan
    $routes->get('/kelurahan/create',  'kelurahan::create');
    $routes->post('/kelurahan/simpan', 'kelurahan::simpan');
    $routes->get('/kelurahan/edit/(:segment)', 'kelurahan::edit/$1');
    $routes->post('/kelurahan/update/(:segment)', 'kelurahan::update/$1');
    $routes->delete('/kelurahan/(:num)', 'kelurahan::delete/$1');
    // akhir

    $routes->get('/jenis',     'Jenis::index');
    $routes->get('/admin',     'Admin::index');
    $routes->get('/ulasan',    'Ulasan::index');
});



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
