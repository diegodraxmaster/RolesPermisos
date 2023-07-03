<?php

require_once "conexion.php";



class mdlUsuarios
{
    static public function mdlMostrarUsuariosl($tabla, $item, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
        }
    }
    static public function mdlEliminarUsuarios($tabla, $id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error en la consulta.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
        }
    }
    static public function mdlEditarUsuarios($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :NOM_E, password = :PASSSER_E, nombre = :NOMUSER_E, foto = :IMG_E, rol = :ROL_E WHERE id = :IDE");
            $stmt->bindParam(":IDE", $datos["idE"], PDO::PARAM_INT);
            $stmt->bindParam(":NOM_E", $datos["nom_usuarioE"], PDO::PARAM_STR);
            $stmt->bindParam(":NOMUSER_E", $datos["nom_userE"], PDO::PARAM_STR);
            $stmt->bindParam(":PASSSER_E", $datos["passE"], PDO::PARAM_STR);
            $stmt->bindParam(":ROL_E", $datos["rol_userE"], PDO::PARAM_STR);
            $stmt->bindParam(":IMG_E", $datos["img"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error en la consulta.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
        }
    }


    static public function MdlMostrarUsuarios1($tabla, $item, $valor)
    {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch();
            return $resultado;
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
        }
    }



    static public function mdlMostrarUsuarios($tabla)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
        }
    }
    static public function mdlguardarUsuarios($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, nombre, foto, rol) VALUES (:USUARIO_u, :PASS_u, :NOMBRE_u, :FOTO_u, :ROL_u)");
            $stmt->bindParam(":NOMBRE_u", $datos["nom_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":USUARIO_u", $datos["nom_user"], PDO::PARAM_STR);
            $stmt->bindParam(":PASS_u", $datos["pass_user"], PDO::PARAM_STR);
            $stmt->bindParam(":ROL_u", $datos["rol_user"], PDO::PARAM_INT);
            $stmt->bindParam(":FOTO_u", $datos["foto"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error en la consulta.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
        }
    }
}
