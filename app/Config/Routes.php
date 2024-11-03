<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

    $routes->get('admin', 'LoginController::index');
    $routes->post('admin/login_admin', 'LoginController::login');
    $routes->get('admin/logout', 'LoginController::logout');

$routes->group('admin',['filter' => 'auth'],function($routes){
    $routes->get('dashboard', 'HomeController::index');

    $routes->get('details_karyawan/(:any)','DetailsKaryawanController::index/$1');
    $routes->post('details_karyawan','DetailsKaryawanController::change');

    $routes->get('profile/(:any)','ProfileController::index/$1');
    $routes->post('changeFoto','ProfileController::change');
    $routes->post('updateAkun','ProfileController::updateAkun');

    $routes->get('data_produk','ProdukController::index');
    $routes->post('tambah_produk','ProdukController::add');
    $routes->get('hapus_produk/(:any)','ProdukController::hapus/$1');
    $routes->post('edit_produk','ProdukController::update');
    $routes->post('edit_desc','ProdukController::updateDesc');
    $routes->post('edit_img','ProdukController::updateImg');

    $routes->get('data_kategori','KategoriController::index');
    $routes->post('tambah_kategori','KategoriController::add');

    $routes->get('data_akses','AksesController::index');
    $routes->post('tambah_akses','AksesController::add');
    $routes->post('update_akses','AksesController::update');
    $routes->get('hapus/(:any)','AksesController::delete/$1');
});

$routes->get('/', 'HomeProduk::index');
