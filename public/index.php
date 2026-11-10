<?php
/**
 * Front Controller (Single Entry Point)
 * public/index.php
 */

// 1. Jalankan Autoloader Core
require_once __DIR__ . '/../core/Autoloader.php';

// 2. Muat Variabel Lingkungan (.env)
try {
    $dotEnv = new DotEnv(__DIR__ . '/../.env');
    $dotEnv->load();
} catch (Exception $e) {
    die("Gagal memuat konfigurasi sistem: " . $e->getMessage());
}

// 3. Muat Definisi Rute Aplikasi
require_once __DIR__ . '/../routes/web.php';

// 4. Jalankan Mesin Routing Utama
Router::run();
