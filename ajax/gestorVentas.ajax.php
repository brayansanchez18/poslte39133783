<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';

class AjaxTablaVentas
{

  public function mostrarTablaProductosVentas()
  {

    /* -------------------------------------------------------------------------- */
    /*                        MOSTRAR LA TABLA DE PRODUCTOS                       */
    /* -------------------------------------------------------------------------- */

    $item = null;
    $valor = null;
    $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

    if (count($productos) == 0) {
      echo '{"data": []}';
      return;
    }

    $datosJson = '{
            "data": [';

    for ($i = 0; $i < count($productos); $i++) {

      /* -------------------------------------------------------------------------- */
      /*                              TRAEMOS LA IMAGEN                             */
      /* -------------------------------------------------------------------------- */

      if ($productos[$i]['imagen'] != '') {
        $imagen = "<img src='" . $productos[$i]['imagen'] . "' width='40px'>";
      } else {
        $imagen = "<img src='vistas/img/productos/default/anonymous.png' width='40px'>";
      }

      /* ---------------------------- TRAEMOS LA IMAGEN --------------------------- */

      /* -------------------------------------------------------------------------- */
      /*                                    STOCK                                   */
      /* -------------------------------------------------------------------------- */

      if ($productos[$i]['stock'] <= 10) {
        $stock = "<button class='btn btn-danger'>" . $productos[$i]['stock'] . "</button>";
      } else if ($productos[$i]['stock'] > 11 && $productos[$i]['stock'] <= 15) {
        $stock = "<button class='btn btn-warning'>" . $productos[$i]['stock'] . "</button>";
      } else {
        $stock = "<button class='btn btn-success'>" . $productos[$i]['stock'] . "</button>";
      }

      /* ---------------------------------- STOCK --------------------------------- */

      /* -------------------------------------------------------------------------- */
      /*                            TRAEMOS LAS ACCIONES                            */
      /* -------------------------------------------------------------------------- */

      $botones =  "<div class='btn-group'><button class='btn btn-info agregarProducto recuperarBoton' idProducto='" . base64_encode($productos[$i]['id']) . "'>Agregar</button></div>";

      /* -------------------------- TRAEMOS LAS ACCIONES -------------------------- */

      $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $imagen . '",
                    "' . $productos[$i]['codigo'] . '",
                    "' . $productos[$i]['descripcion'] . '",
                    "' . $stock . '",
                    "MX$ ' . number_format($productos[$i]['precioVenta'], 2) . '",
                    "' . $botones . '"
                ],';
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .=   ']
            }';

    echo $datosJson;
  }
}

$activarProductosVentas = new AjaxTablaVentas();
$activarProductosVentas->mostrarTablaProductosVentas();
