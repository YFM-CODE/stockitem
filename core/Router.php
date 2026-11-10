<?php
/**
 * Core Router Engine (Static Route Matching)
 * core/Router.php
 */

class Router {
    private static $routes = [];

    /**
     * Daftarkan rute dengan method GET
     */
    public static function get(string $url, string $controllerMethod) {
        self::$routes['GET'][$url] = $controllerMethod;
    }

    /**
     * Daftarkan rute dengan method POST
     */
    public static function post(string $url, string $controllerMethod) {
        self::$routes['POST'][$url] = $controllerMethod;
    }

    /**
     * Eksekusi pencocokan URL dan panggil Controller tujuan
     */
    public static function run() {
        $requestUri = isset($_GET['url']) ? '/' . rtrim($_GET['url'], '/') : '/';
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if (isset(self::$routes[$requestMethod][$requestUri])) {
            $handler = self::$routes[$requestMethod][$requestUri];
            list($controllerClass, $method) = explode('@', $handler);

            if (class_exists($controllerClass)) {
                $controllerObject = new $controllerClass();
                if (method_exists($controllerObject, $method)) {
                    // Panggil method di controller tersebut
                    $controllerObject->$method();
                    return;
                }
                die("Error: Method [{$method}] tidak ditemukan di kelas {$controllerClass}.");
            }
            die("Error: Kelas Controller [{$controllerClass}] tidak ditemukan.");
        }

        // Jika rute tidak terdaftar, lempar error 404
        http_response_code(404);
        echo "404 - Halaman tidak ditemukan.";
    }
}
