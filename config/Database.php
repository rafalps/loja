<?php

class Database {
    private $host = "localhost";
    private $username = "postgres";
    private $password = "15152002";
    private $database = "loja";
    public $pdo;

    public function __construct() {
        $dsn = "pgsql:host=$this->host;dbname=$this->database";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function createTables() {
        $sqlFile = 'config/database.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $this->pdo->exec($sql);
        } else {
            echo "Arquivo $sqlFile nao encontrado. \n";
        }
    }
    
    public function populateTables() {
        $sqlFile = 'config/seeder.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $this->pdo->exec($sql);
        } else {
            echo "Arquivo $sqlFile nao encontrado. \n";
        }
    }
}