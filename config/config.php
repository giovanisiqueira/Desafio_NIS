<?php

class DatabaseConnection
{
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $user, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            throw new Exception('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        if ($this->pdo === null) {
            $this->pdo = $this->connect();
        }
        return $this->pdo;
    }
}

try {
    $host = 'localhost';
    $dbname = 'cidadao';
    $user = 'root';
    $password = '';

    $dbConnection = new DatabaseConnection($host, $dbname, $user, $password);
    $pdo = $dbConnection->getConnection();
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}