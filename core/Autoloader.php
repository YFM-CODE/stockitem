<?php
/**
 * Core Autoloader Enterprise
 * core/Autoloader.php
 */

spl_autoload_register(function ($class) {
    $rootDir = __DIR__ . '/../';

    $directories = [
        'core/',
        'app/Http/Controllers/',
        'app/Http/Middleware/',
        'app/Http/Middlewares/',
        'app/Http/Requests/',
        'app/Models/',
        'app/Repositories/',
        'app/Handlers/',
        'app/Interfaces/',
        'app/Enums/',
        'app/Filters/',
        'app/Exports/',
        'app/Traits/'
    ];

    foreach ($directories as $dir) {
        $file = $rootDir . $dir . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
