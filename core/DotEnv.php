<?php
/**
 * Core DotEnv Loader
 * core/DotEnv.php
 */

class DotEnv {
    protected $path;

    public function __construct($path) {
        if (!file_exists($path)) {
            throw new InvalidArgumentException("Berkas .env tidak ditemukan pada jalur: {$path}");
        }
        $this->path = $path;
    }

    public function load() {
        if (!is_readable($this->path)) {
            throw new RuntimeException("Berkas .env tidak dapat dibaca oleh sistem.");
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim(trim($value), '"\'');

                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv("{$name}={$value}");
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}
