<?php
/**
 * Web Routes Registry
 * routes/web.php
 */

// Daftarkan rute aplikasi Anda di sini
// Format: Router::get('/url-tujuan', 'NamaController@NamaMethod');

Router::get('/', 'HomeController@index');
Router::get('/item', 'ItemController@index');
Router::get('/stok', 'StokController@index');
