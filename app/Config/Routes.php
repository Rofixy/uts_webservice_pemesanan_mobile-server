<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('pemesananmobil', 'PemesananMobil::index'); // Route untuk menampilkan halaman index
$routes->get('pemesananmobil/json', 'PemesananMobil::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari pemesanan mobil (pastikan method ada di controller)
$routes->get('pemesananmobil/data', 'PemesananMobil::getPemesananMobil'); // Route untuk mendapatkan pemesanan mobil dalam format JSON
$routes->post('pemesananmobil/store', 'PemesananMobil::create'); // Route untuk menyimpan data pemesanan mobil
$routes->get('pemesananmobil/data-pemesanan', 'PemesananMobil::getPemesananMobilDataJson'); // Route untuk mendapatkan data Pemesanan mobil dalam format JSON
$routes->post('pemesananmobil/update/(:num)', 'PemesananMobil::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('pemesananmobil/delete/(:num)', 'PemesananMobil::delete/$1'); // Route untuk menghapus data berdasarkan id
$routes->get('pemesananmobil/show/(:num)', 'PemesananMobil::show/$1'); // Route untuk menampilkan data berdasarkan id
