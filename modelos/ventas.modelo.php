<?php

require_once 'conexion.php';

class ModeloVentas
{

  /* -------------------------------------------------------------------------- */
  /*                               MOSTRAR VENTAS                               */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarVentas($tabla, $item, $valor)
  {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
      $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
      $stmt->execute();
      return $stmt->fetchAll();
    }

    $stmt = null;
  }

  /* -------------------------- FIN DE MOSTRA VENTAS -------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              REGISTRO DE VENTA                             */
  /* -------------------------------------------------------------------------- */

  static public function mdlIngresarVenta($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, idCliente, idVendedor, productos, impuesto, neto, total, metodoPago, referencia) VALUES (:codigo, :idCliente, :idVendedor, :productos, :impuesto, :neto, :total, :metodoPago, :referencia)");
    $stmt->bindParam(':codigo', $datos['codigo'], PDO::PARAM_INT);
    $stmt->bindParam(':idCliente', $datos['idCliente'], PDO::PARAM_INT);
    $stmt->bindParam(':idVendedor', $datos['idVendedor'], PDO::PARAM_INT);
    $stmt->bindParam(':productos', $datos['productos'], PDO::PARAM_STR);
    $stmt->bindParam(':impuesto', $datos['impuesto'], PDO::PARAM_STR);
    $stmt->bindParam(':neto', $datos['neto'], PDO::PARAM_STR);
    $stmt->bindParam(':total', $datos['total'], PDO::PARAM_STR);
    $stmt->bindParam(':metodoPago', $datos['metodoPago'], PDO::PARAM_STR);
    $stmt->bindParam(':referencia', $datos['referencia'], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt = null;
  }

  /* ------------------------ FIN DE REGISTRO DE VENTA ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                                EDITAR VENTA                                */
  /* -------------------------------------------------------------------------- */

  static public function mdlEditarVenta($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  idCliente = :idCliente, idVendedor = :idVendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodoPago = :metodoPago, referencia = :referencia WHERE codigo = :codigo");
    $stmt->bindParam(':codigo', $datos['codigo'], PDO::PARAM_INT);
    $stmt->bindParam(':idCliente', $datos['idCliente'], PDO::PARAM_INT);
    $stmt->bindParam(':idVendedor', $datos['idVendedor'], PDO::PARAM_INT);
    $stmt->bindParam(':productos', $datos['productos'], PDO::PARAM_STR);
    $stmt->bindParam(':impuesto', $datos['impuesto'], PDO::PARAM_STR);
    $stmt->bindParam(':neto', $datos['neto'], PDO::PARAM_STR);
    $stmt->bindParam(':total', $datos['total'], PDO::PARAM_STR);
    $stmt->bindParam(':metodoPago', $datos['metodoPago'], PDO::PARAM_STR);
    $stmt->bindParam(':referencia', $datos['referencia'], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt = null;
  }

  /* --------------------------- FIN DE DITAR VENTA --------------------------- */
}
