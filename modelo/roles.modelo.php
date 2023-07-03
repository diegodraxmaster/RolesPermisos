<?php

require_once "conexion.php";

class mdlroles
{

  static public function mdlEliminarRoles($tabla, $valor)
  {
    try {
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_roles = :idE");
      $stmt->bindParam(":idE", $valor, PDO::PARAM_INT);
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


  static public function mdlMostrarRoles($tabla, $item, $valor)
  {
    try {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      throw new Exception("Error en la consulta: " . $e->getMessage());
    } finally {
      if ($stmt) {
        $stmt->closeCursor();
      }
    }
  }
  static public function mdlMostrarRoles2($tabla)
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
  static public function mdlGuardarRoles($tabla, $nomRol)
  {
    try {
      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nom_rol) VALUES(:NOMBRE_ROL)");
      $stmt->bindParam(":NOMBRE_ROL", $nomRol, PDO::PARAM_STR);
      if ($stmt->execute()) {
        return "ok";
      } else {
        throw new Exception("Error en la ejecución de la consulta.");
      }
    } catch (PDOException $e) {
      throw new Exception("Error en la consulta: " . $e->getMessage());
    } finally {
      if ($stmt) {
        $stmt->closeCursor();
      }
    }
  }

  static public function mdlVerRoles($tabla, $item, $valor)
  {
    try {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:IDE");
      $stmt->bindParam(":IDE", $valor, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      throw new Exception("Error en la consulta: " . $e->getMessage());
    } finally {
      if ($stmt) {
        $stmt->closeCursor();
      }
    }
  }


  static public function mdlEditarRoles($tabla, $nomRol, $idrol)
  {
    try {
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nom_rol=:rol_nom WHERE id_roles=:id");
      $stmt->bindParam(":id", $idrol, PDO::PARAM_STR);
      $stmt->bindParam(":rol_nom", $nomRol, PDO::PARAM_STR);
      if ($stmt->execute()) {
        return "ok";
      } else {
        throw new Exception("Error al ejecutar la consulta.");
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
