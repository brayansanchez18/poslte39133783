<?php

require_once 'conexion.php';

class ModeloProductos
{
  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarProductos($tabla, $item, $valor)
  {

    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
      $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }

    $stmt = null;
  }

  /* ------------------------ End of MOSTRAR PRODUCTOS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                             INGRESAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  static public function mdlIngresoProducto($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idCategoria, codigo, descripcion, imagen, stock, precioCompra, precioVenta) VALUES (:idCategoria, :codigo, :descripcion, :imagen, :stock, :precioCompra, :precioVenta)");
    $stmt->bindParam(':idCategoria', $datos['idCategoria'], PDO::PARAM_INT);
    $stmt->bindParam(':codigo', $datos['codigo'], PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
    $stmt->bindParam(':imagen', $datos['imagen'], PDO::PARAM_STR);
    $stmt->bindParam(':stock', $datos['stock'], PDO::PARAM_STR);
    $stmt->bindParam(':precioCompra', $datos['precioCompra'], PDO::PARAM_STR);
    $stmt->bindParam(':precioVenta', $datos['precioVenta'], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt = null;
  }

  /* --------------------------- INGRESAR PRODUCTOS --------------------------- */
}
