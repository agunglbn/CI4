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
$routes->set404Override(function () {
    echo view('deskapp/error-pages/404.php');
});
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
$routes->post('/addMessage', 'Front::message');
$routes->get('/blogs', 'Front::blogs');
$routes->get('/warta', 'Front::warta');
$routes->get('/kategori/(:segment)', 'Front::detailKategori/$1');
$routes->get('/blogs/detailBerita(:segment)/(:segment)', 'Front::detailBerita/$1/$2');
$routes->get('/front/downloadwarta/(:segment)', 'Front::downloadwarta/$1');

$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('/Users', 'Users::index');
    $routes->post('/Users/deletenotif', 'Users::deletenotification', ['filter' => 'role:admin,superadmin']);
    $routes->get('/admin', 'Admin::index', ['filter' => 'role:superadmin']);
    $routes->get('/admin/index', 'Admin::index', ['filter' => 'role:superadmin']);
    $routes->get('/admin/(:num)', 'Admin::detailUser/$1', ['filter' => 'role:superadmin']);
    $routes->get('/admin/newUser', 'Admin::newUser', ['filter' => 'role:superadmin']);
    $routes->post('/admin/tambah', 'Admin::tambah', ['filter' => 'role:superadmin']);
    $routes->get('/admin/updateUser/(:segment)/(:segment)', 'Admin::updateUser/$1/$2', ['filter' => 'role:superadmin']);
    $routes->post('/admin/DeleteUser/(:num)', 'Admin::DeleteUser/$1', ['filter' => 'role:superadmin']);
    $routes->get('/program', 'Admin::program', ['filter' => 'role:admin,superadmin']);
    $routes->POST('/admin/newProgram', 'Admin::addNewProgram', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/statusProgram(:num)', 'Admin::statusProgram/$1', ['filter' => 'role:admin,superadmin']);
    $routes->delete('/admin/deleteProgram/(:num)', 'Admin::deleteProgram/$1', ['filter' => 'role:admin ,diakonia,parataon ']);

    // profile
    $routes->get('/profile', 'Users::profile');
    $routes->post('/user/updateProfile', 'Users::updateProfile');


    // Jemaat Diakonia
    $routes->get('/admin/jemaat', 'Admin::jemaat', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->get('/admin/newJemaat', 'Admin::newJemaat', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->post('/admin/addNewJemaat', 'Admin::addNewJemaat', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->get('/admin/(:num)', 'Admin::detailJemaat/$1', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->post('/admin/(:num)', 'Admin::updateJemaat/$1', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->delete('/admin/(:num)', 'Admin::deleteJemaat/$1', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->get('/financeDiakon', 'Users::financeDiakon', ['filter' => 'role:admin,diakonia,superadmin']);
    // Berita Admin
    $routes->get('/admin/berita', 'Admin::berita', ['filter' => 'role:admin,superadmin']);
    $routes->get('/admin/formBerita', 'Admin::formBerita', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/TambahBerita', 'Admin::TambahBerita', ['filter' => 'role:admin,superadmin']);
    $routes->get('/detailBerita/(:segment)/(:segment)', 'Admin::detailBerita/$1/$2', ['filter' => 'role:admin,superadmin']);
    $routes->delete('/admin/deleteBerita/(:segment)/(:segment)', 'Admin::deleteBerita/$1/$2', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/updateStatusBerita(:num)', 'Admin::updateStatusBerita/$1', ['filter' => 'role:admin,superadmin']);
    $routes->get('/formUpdateBerita/(:segment)/(:segment)', 'Admin::formUpdateBerita/$1/$2', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/updateBerita(:segment)', 'Admin::updateBerita/$1', ['filter' => 'role:admin,superadmin']);
    // Gallery
    $routes->get('/admin/gallery', 'Admin::gallery', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/TambahGallery', 'Admin::TambahGallery', ['filter' => 'role:admin,superadmin']);
    $routes->delete('/admin/deleteGallery/(:segment)/(:segment)', 'Admin::deleteGallery/$1/$2', ['filter' => 'role:admin,superadmin']);
    $routes->PUT('/admin/updateGallery(:segment)/(:segment)', 'Admin::updateGallery/$1/$2', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/statusGallery(:num)', 'Admin::statusGallery/$1', ['filter' => 'role:admin,superadmin']);

    // Stensilan
    $routes->post('/admin/addStensilan', 'Admin::addStensilan', ['filter' => 'role:admin,superadmin']);
    $routes->get('/admin/downloadfile/(:segment)', 'Admin::downloadfile/$1');


    // Keuangan Admin,Diakon,Parataon
    $routes->get('/admin/Kas', 'Admin::kas', ['filter' => 'role:admin,superadmin']);
    $routes->get('/Kas', 'Admin::kas', ['filter' => 'role:admin,superadmin']);
    $routes->get('/filter', 'Admin::filter', ['filter' => 'role:admin,superadmin']);
    $routes->post('/admin/TambahKhas', 'Admin::TambahKhas', ['filter' => 'role:admin ,diakonia,parataon,superadmin']);
    $routes->get('/detailKas/(:num)', 'Admin::detailKas/$1', ['filter' => 'role:admin ,diakonia,parataon,superadmin']);
    $routes->post('/admin/UpdateKas(:segment)', 'Admin::UpdateKas/$1', ['filter' => 'role:admin ,diakonia,parataon,superadmin']);
    $routes->delete('/admin/deleteKas/(:num)', 'Admin::deleteKas/$1', ['filter' => 'role:admin ,diakonia,parataon,superadmin ']);
    $routes->post('/admin/updateStatusKas(:num)', 'Admin::updateStatusKas/$1', ['filter' => 'role:admin,superadmin']);

    // Parhataon
    $routes->get('/inventory', 'Users::inventory', ['filter' => 'role:parataon,admin,superadmin']);
    $routes->post('/users/addInventory', 'Users::addInventory', ['filter' => 'role:admin,parataon,superadmin']);
    $routes->PUT('/users/updateInventory(:segment)/(:segment)', 'Users::updateInventory/$1/$2', ['filter' => 'role:admin,diakonia,superadmin']);
    $routes->post('/users/deleteInventory/(:num)', 'users::deleteInventory/$1', ['filter' => 'role:admin,parataon ,superadmin']);
    $routes->post('/users/updateStatusPeminjaman(:num)', 'Users::updateStatusPeminjaman/$1', ['filter' => 'role:admin,parataon,superadmin']);
    $routes->get('/users/financeParataon', 'Users::financeParataon', ['filter' => 'role:parataon,admin,superadmin']);

    // Program Kerja ALL USER
    $routes->get('/user/program', 'Users::programUser', ['filter' => 'role:diakonia,parataon,naposo,superadmin']);
    $routes->POST('/user/newProgram', 'Users::addProgramUser', ['filter' => 'role:diakonia,parataon,naposo,superadmin']);
    $routes->PUT('/UpdateProgram(:num)', 'Users::UpdateProgramUser/$1', ['filter' => 'role:diakonia,parataon,naposo,superadmin']);
    $routes->delete('/deleteProgramUser(:num)', 'Users::deleteProgramUser/$1', ['filter' => 'role:diakonia,parataon,naposo,superadmin']);
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
