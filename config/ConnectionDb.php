<?php

namespace config;

use mysqli;

class ConnectionDb
{
    private $db;

    public function __construct()
    {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
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

    public function getResultFromQuery(string $sql): array
    {
        $conn = $this->db;

        $result = $conn->query($sql);
        $conn->close();

        return $result->fetch_assoc();
    }
}