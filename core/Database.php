<?php
/**
 * Class Database Connection Engine (MySQLi Object-Oriented Singleton)
 * core/Database.php
 */

class Database {
    private static $instance = null;
    private $mysqli;

    private function __construct() {
        $config = require __DIR__ . '/../config/database.php';
        $dbConfig = $config['connections'][$config['default']];

        $this->mysqli = new mysqli(
            $dbConfig['host'],
            $dbConfig['username'],
            $dbConfig['password'],
            $dbConfig['database'],
            $dbConfig['port']
        );

        if ($this->mysqli->connect_error) {
            die("Kegagalan Sistem: Koneksi database tidak dapat dibangun. " . $this->mysqli->connect_error);
        }

        $this->mysqli->set_charset($dbConfig['charset']);

        $tz = $dbConfig['timezone'];
        $offset = '+07:00';
        if ($tz === 'Asia/Makassar') $offset = '+08:00';
        if ($tz === 'Asia/Jayapura') $offset = '+09:00';

        $this->mysqli->query("SET time_zone = '{$offset}'");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->mysqli;
    }

    private function __clone() {}
}
