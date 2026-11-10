<?php
/**
 * HomeController
 * app/Http/Controllers/HomeController.php
 */

class HomeController extends Controller {
    
    public function index() {
        // Data tiruan untuk mengetes apakah parsing data ke View berfungsi
        $data = [
            'judul_halaman' => 'Dashboard Stok Item',
            'pesan_selamat' => 'Selamat datang di Sistem Informasi Stok Item.'
        ];

        // Memanggil View 'dashboard' yang ada di folder resources/views/
        $this->view('dashboard', $data);
    }
}
