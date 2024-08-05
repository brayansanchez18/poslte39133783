<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';
require_once '../controladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';

class AjaxProductos
{
  /* -------------------------------------------------------------------------- */
  /*                   GENERAR CÓDIGO A PARTIR DE ID CATEGORIA                  */
  /* -------------------------------------------------------------------------- */

  public $idCategoria;

  public function ajaxCrearCodigoProducto()
  {
    $item = 'idCategoria';
    $valor = $this->idCategoria;
    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
    echo json_encode($respuesta);
  }

  /* ------------- FIN DE GENERAR CÓDIGO A PARTIR DE ID CATEGORIA ------------- */
}

/* -------------------------------------------------------------------------- */
/*                   GENERAR CÓDIGO A PARTIR DE ID CATEGORIA                  */
/* -------------------------------------------------------------------------- */

if (isset($_POST['idCategoria'])) {
  $codigoProducto = new AjaxProductos();
  $codigoProducto->idCategoria = base64_decode($_POST['idCategoria']);
  $codigoProducto->ajaxCrearCodigoProducto();
}

/* ------------- FIN DE GENERAR CÓDIGO A PARTIR DE ID CATEGORIA ------------- */
