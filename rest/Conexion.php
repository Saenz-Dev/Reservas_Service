<?php

class Conexion extends PDO
{

    private $hostBd = 'localhost:3030';
    private $nombreBd = 'reservas_service';
    private $usuarioBd = 'root';
    private $password = '';

    public function __construct()
    {
        try {
            parent::__construct('mysql:host=' . $this->hostBd . ';dbname' . $this->nombreBd . ';charset=utf8', $this->usuarioBd, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }

    }

}

