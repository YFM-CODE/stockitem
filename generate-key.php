<?php
/**
 * APP_KEY Generator Script (PHP Native)
 * Proyek - Sistem Informasi Stok Item
 */

try {
    $randomBytes = random_bytes(32);
} catch (Exception $e) {
    die("Error: Gagal menghasilkan byte acak - " . $e->getMessage() . "\n");
}

$finalKey = "base64:" . base64_encode($randomBytes);
$envPath = __DIR__ . '/.env';

if (!file_exists($envPath)) {
    die("Error: Berkas .env tidak ditemukan. Silakan buat berkas .env terlebih dahulu.\n");
}

$envContent = file_get_contents($envPath);
$pattern = '/^APP_KEY=(.*)$/m';
$replacement = "APP_KEY=" . $finalKey;

if (preg_match($pattern, $envContent)) {
    $newEnvContent = preg_replace($pattern, $replacement, $envContent);
} else {
    $newEnvContent = rtrim($envContent) . "\n" . $replacement . "\n";
}

if (file_put_contents($envPath, $newEnvContent) === false) {
    die("Error: Gagal menulis perubahan ke dalam berkas .env.\n");
}

echo "Application key [{$finalKey}] set successfully.\n";
