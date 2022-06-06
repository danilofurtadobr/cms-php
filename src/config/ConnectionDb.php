<?php

namespace src\config;

use mysqli;

class ConnectionDb
{
    private $db;

    public function __construct()
    {
        $envPath = realpath(ROOT . '/env.ini');

        $env = parse_ini_file($envPath);
        $this->db = new mysqli(
            $env['host'],
            $env['username'],
            $env['password'],
            $env['database']
        );

        if ($this->db->connect_error) {
            var_dump("Erro: " . $this->db->connect_error);die;
        }
    }

    public function getResultFromQuery(string $sql)
    {
        $conn = $this->db;

        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }
}