<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';
require_once '../controladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';

session_start();

class TablaProductos
{
  /* -------------------------------------------------------------------------- */
  /*                        MOSTRAR LA TABLA DE PRODUCTOS                       */
  /* -------------------------------------------------------------------------- */

  public function mostrarTablaProductos()
  {
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

      /* ------------------------ FIN DE TRAEMOS LA IMGAEN ------------------------ */

      /* -------------------------------------------------------------------------- */
      /*                            TRAEMOS LA CATEGORÍA                            */
      /* -------------------------------------------------------------------------- */

      $item = 'id';
      $valor = $productos[$i]['idCategoria'];
      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

      /* -------------------------- TREAMOS LA CATEGORIA -------------------------- */

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

      /* ------------------------------ FIN DE STOCK ------------------------------ */

      /* -------------------------------------------------------------------------- */
      /*                            TRAEMOS LAS ACCIONES                            */
      /* -------------------------------------------------------------------------- */

      if ($_SESSION['perfil'] == 'Administrador') {
        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idproducto='" . base64_encode($productos[$i]['id']) . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarProducto' idproducto='" . base64_encode($productos[$i]["id"]) . "' codigo='" . base64_encode($productos[$i]["codigo"]) . "' imagen='" . base64_encode($productos[$i]["imagen"]) . "'><i class='fas fa-trash-alt'></i></button></div>";
      } else if ($_SESSION['perfil'] == 'Especial') {
        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idproducto='" . base64_encode($productos[$i]['id']) . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-edit'></i></button><button class='btn btn-danger disabled'><i class='fas fa-trash-alt'></i></button></div>";
      } else {
        $botones = "<div class='btn-group'><button class='btn btn-warning disabled'><i class='fa fa-edit'></i></button><button class='btn btn-danger disabled'><i class='fas fa-trash-alt'></i></button></div>";
      }



      /* ----------------------- FIN DE TRAEMOS LAS ACCIONES ---------------------- */

      $datosJson .= '[
					"' . ($i + 1) . '",
					"' . $imagen . '",
					"' . $productos[$i]['codigo'] . '",
					"' . $productos[$i]['descripcion'] . '",
					"' . $categorias['categoria'] . '",
					"' . $stock . '",
					"MX$ ' . number_format($productos[$i]['precioCompra'], 2) . '",
					"MX$ ' . number_format($productos[$i]['precioVenta'], 2) . '",
					"' . $productos[$i]['fecha'] . '",
					"' . $botones . '"
				],';
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .=   ']
			}';

    echo $datosJson;
  }
  /* ---------------------- MOSTRAR LA TABLA DE PRODUCTOS --------------------- */
}

/* -------------------------------------------------------------------------- */
/*                         ACTIVAR TABLA DE PRODUCTOS                         */
/* -------------------------------------------------------------------------- */

$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();

/* --------------------- FIN ACTIVAR TABLA DE PRODUCTOS --------------------- */
