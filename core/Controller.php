<?php
/**
 * Base Controller Engine
 * core/Controller.php
 */

abstract class Controller {
    /**
     * Memuat berkas tampilan dari folder resources/views
     */
    protected function view(string $view, array $data = []): void {
        $viewFile = __DIR__ . '/../resources/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            die("Error: Berkas tampilan [resources/views/{$view}.php] tidak ditemukan.");
        }

        extract($data);
        require_once $viewFile;
    }
}
