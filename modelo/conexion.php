<?php 


class Conexion{


    static public function conectar(){
        $host = "localhost";
        $dbname = "adminltmvc";
        $username = "root";
        $password = "";

        try {
            $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
            exit;
        }
    }
}
