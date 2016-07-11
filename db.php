<?php
class Database {
    private $_dbh;
    // Store the single instance.
    private static $_instance;

    public static function getInstance() {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        $dsn = 'mysql:dbname=expense;host=localhost;';
        $user = 'root';
        $password = '';
        try {
            $this->_dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    private function __clone() {}
    public function getConnection() {
        return $this->_dbh;
    }
}


$database = new Database();
$dbh = $database->getConnection();
