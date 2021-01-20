<?php

/**
 * Class ConexionDB
 */
class ConexionDB
{
    /**
     * función para conectarse a la base de datos
     *
     * @return mysqli
     */
    public static function conexion()
    {
        $conexion = new PDO('mysql:host=192.168.56.101;dbname=konecta_db;charset=utf8mb4', 'root', '123');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }
}

