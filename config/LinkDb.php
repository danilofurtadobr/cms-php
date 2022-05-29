<?php

class LinkDb
{
    public  static  function  getConnection()
    {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $conn = new mysqli(
            $env['host'],
            $env['username'],
            $env['password'],
            $env['database']
        );

        if ($conn->connect_error) {
            var_dump("Erro: " . $conn->connect_error);die;
        }

        return $conn;
    }

    public  static  function  getResultFromQuery(string $sql)
    {
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}