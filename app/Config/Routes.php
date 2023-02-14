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
$routes->setDefaultController('Front');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Tambah User Admin
$routes->get('/', 'Front::index');
$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('/Users', 'Users::index');
    $routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
    $routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
    $routes->get('/admin/(:num)', 'Admin::detailUser/$1', ['filter' => 'role:admin']);
    $routes->get('/admin/newUser', 'Admin::newUser', ['filter' => 'role:admin']);
    $routes->post('/admin/tambah', 'Admin::tambah', ['filter' => 'role:admin']);
    $routes->post('/admin/DeleteUser/(:num)', 'Admin::DeleteUser/$1', ['filter' => 'role:admin']);
    // Jemaat Diakonia
    $routes->get('/admin/jemaat', 'Admin::jemaat', ['filter' => 'role:admin,diakonia']);
    $routes->get('/admin/newJemaat', 'Admin::newJemaat', ['filter' => 'role:admin,diakonia']);
    $routes->post('/admin/addNewJemaat', 'Admin::addNewJemaat', ['filter' => 'role:admin,diakonia']);
    $routes->get('/admin/(:num)', 'Admin::detailJemaat/$1', ['filter' => 'role:admin,diakonia']);
    $routes->post('/admin/(:num)', 'Admin::updateJemaat/$1', ['filter' => 'role:admin,diakonia']);
    $routes->delete('/admin/(:num)', 'Admin::deleteJemaat/$1', ['filter' => 'role:admin,diakonia']);
    $routes->get('/financeDiakon', 'Users::financeDiakon', ['filter' => 'role:admin,diakonia']);
    // Berita Admin
    $routes->get('/admin/berita', 'Admin::berita', ['filter' => 'role:admin']);
    $routes->get('/admin/formBerita', 'Admin::formBerita', ['filter' => 'role:admin']);
    $routes->post('/admin/TambahBerita', 'Admin::TambahBerita', ['filter' => 'role:admin']);
    $routes->get('/detailBerita/(:segment)/(:segment)', 'Admin::detailBerita/$1/$2', ['filter' => 'role:admin']);
    $routes->delete('/admin/deleteBerita/(:segment)/(:segment)', 'Admin::deleteBerita/$1/$2', ['filter' => 'role:admin']);
    $routes->post('/admin/updateStatusBerita(:num)', 'Admin::updateStatusBerita/$1', ['filter' => 'role:admin']);
    $routes->get('/formUpdateBerita/(:segment)/(:segment)', 'Admin::formUpdateBerita/$1/$2', ['filter' => 'role:admin']);
    $routes->post('/admin/updateBerita(:segment)', 'Admin::updateBerita/$1', ['filter' => 'role:admin']);
    // Gallery
    $routes->get('/admin/gallery', 'Admin::gallery', ['filter' => 'role:admin']);
    $routes->post('/admin/TambahGallery', 'Admin::TambahGallery', ['filter' => 'role:admin']);
    $routes->delete('/admin/deleteGallery/(:segment)/(:segment)', 'Admin::deleteGallery/$1/$2', ['filter' => 'role:admin']);
    $routes->PUT('/admin/updateGallery(:segment)/(:segment)', 'Admin::updateGallery/$1/$2', ['filter' => 'role:admin']);
    $routes->post('/admin/statusGallery(:num)', 'Admin::statusGallery/$1', ['filter' => 'role:admin']);

    // Stensilan
    $routes->post('/admin/addStensilan', 'Admin::addStensilan', ['filter' => 'role:admin']);
    $routes->get('/admin/downloadfile', 'Admin::downloadfile', ['filter' => 'role:admin']);


    // Keuangan Admin,Diakon,Parataon
    $routes->get('/admin/Kas', 'Admin::kas', ['filter' => 'role:admin']);
    $routes->get('/Kas', 'Admin::kas', ['filter' => 'role:admin']);
    $routes->post('/admin/TambahKhas', 'Admin::TambahKhas', ['filter' => 'role:admin ,diakonia,parataon']);
    $routes->get('/detailKas/(:num)', 'Admin::detailKas/$1', ['filter' => 'role:admin ,diakonia,parataon']);
    $routes->post('/admin/UpdateKas(:segment)', 'Admin::UpdateKas/$1', ['filter' => 'role:admin ,diakonia,parataon']);
    $routes->delete('/admin/deleteKas/(:num)', 'Admin::deleteKas/$1', ['filter' => 'role:admin ,diakonia,parataon ']);
    $routes->post('/admin/updateStatusKas(:num)', 'Admin::updateStatusKas/$1', ['filter' => 'role:admin']);

    // Parhataon
    $routes->get('/inventory', 'Users::inventory', ['filter' => 'role:parataon,admin']);
    $routes->post('/users/addInventory', 'Users::addInventory', ['filter' => 'role:admin,parataon']);
    $routes->PUT('/users/updateInventory(:segment)/(:segment)', 'Users::updateInventory/$1/$2', ['filter' => 'role:admin,diakonia']);
    $routes->post('/users/deleteInventory/(:num)', 'users::deleteInventory/$1', ['filter' => 'role:admin,parataon ']);
    $routes->post('/users/updateStatusPeminjaman(:num)', 'Users::updateStatusPeminjaman/$1', ['filter' => 'role:admin,parataon']);
    $routes->get('/users/financeParataon', 'Users::financeParataon', ['filter' => 'role:parataon,admin']);
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
