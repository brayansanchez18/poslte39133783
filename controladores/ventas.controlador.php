<?php

class ControladorVentas
{
  /* -------------------------------------------------------------------------- */
  /*                               MOSTRAR VENTAS                               */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarVentas($item, $valor)
  {
    $tabla = 'ventas';
    $respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
    return $respuesta;
  }

  /* -------------------------- FIN DE MOSTRAR VENTAS ------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                                 CREAR VENTA                                */
  /* -------------------------------------------------------------------------- */

  static public function ctrCrearVenta()
  {

    if (isset($_POST['nuevaVenta'])) {

      /* -------------------------------------------------------------------------- */
      /*        ACTUALIZAR LAS COMPRAS REDUCIR EL STOCK Y AUMENTAR LAS VENTAS       */
      /* -------------------------------------------------------------------------- */

      $listaProductos = json_decode($_POST['listaProductos'], true);
      $totalProductosComprados = [];

      foreach ($listaProductos as $key => $value) {

        array_push($totalProductosComprados, $value['cantidad']);

        $tablaProductos = 'productos';

        $item = 'id';
        $valor = base64_decode($value['id']);

        $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

        $item1a = 'ventas';
        $valor1a = $value['cantidad'] + $traerProducto['ventas'];

        $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

        $item1b = 'stock';
        $valor1b = $value['stock'];

        $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
      }

      $tablaClientes = 'clientes';

      $item = 'id';
      $valor = base64_decode($_POST['seleccionarCliente']);

      $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

      $item1a = 'compras';
      if (is_array($traerCliente)) {
        $valor1a = array_sum($totalProductosComprados) + $traerCliente['compras'];
      } else {
        $valor1a = array_sum($totalProductosComprados);
      }



      $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

      $item1b = 'ultimaCompra';

      date_default_timezone_set('America/Mexico_City');

      $fecha = date('Y-m-d');
      $hora = date('H:i:s');
      $valor1b = $fecha . ' ' . $hora;

      $fechaCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);

      /* -------------------------------------------------------------------------- */
      /*                              GUARDAR LA COMPRA                             */
      /* -------------------------------------------------------------------------- */

      $tabla = 'ventas';

      $datos = [
        'codigo' => $_POST['nuevaVenta'],
        'idCliente' => base64_decode($_POST['seleccionarCliente']),
        'idVendedor' => base64_decode($_POST['idVendedor']),
        'productos' => $_POST['listaProductos'],
        'impuesto' => $_POST['nuevoPrecioImpuesto'],
        'neto' => $_POST['nuevoPrecioNeto'],
        'total' => $_POST['totalVenta'],
        'metodoPago' => $_POST['metodoPago'],
        'referencia' => $_POST['codigoPago']
      ];

      $respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);


      if ($respuesta == 'ok') {
        echo '<script>
        localStorage.removeItem("rango");
						Swal.fire({
							icon: "success",
              title: "GUARDADO",
							text: "La venta se ha generado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/ventas";
							}
						});
						</script>';
      }

      /* -- FIN DE ACTUALIZAR LAS COMPRAS REDUCIR EL STOCK Y AUMENTAR LAS VENTAS -- */
    }
  }

  /* --------------------------- FIN DE CREAR VENTA --------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                                EDITAR VENTA                                */
  /* -------------------------------------------------------------------------- */

  static public function ctrEditarVenta()
  {

    if (isset($_POST['editarVenta'])) {

      /* -------------- FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES ------------- */

      $tabla = 'ventas';
      $item = 'codigo';
      $valor = $_POST['editarVenta'];
      $traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

      /* ------------------- REVISAR SI VIENE PRODUCTOS EDITADOS ------------------ */

      if ($_POST['listaProductos'] == '') {
        $listaProductos = $traerVenta['productos'];
        $cambioProducto = false;
      } else {
        $listaProductos = $_POST['listaProductos'];
        $cambioProducto = true;
      }

      if ($cambioProducto) {
        $productos =  json_decode($traerVenta['productos'], true);
        $totalProductosComprados = array();

        foreach ($productos as $key => $value) {

          array_push($totalProductosComprados, $value['cantidad']);

          $tablaProductos = 'productos';

          $item = 'id';
          $valor = base64_decode($value['id']);

          $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

          $item1a = 'ventas';
          $valor1a = $traerProducto['ventas'] - $value['cantidad'];

          $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

          $item1b = 'stock';
          $valor1b = $value['cantidad'] + $traerProducto['stock'];

          $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
        }

        if (base64_decode($_POST['seleccionarCliente'])) {

          $tablaClientes = 'clientes';

          $itemCliente = 'id';
          $valorCliente = base64_decode($_POST['seleccionarCliente']);

          $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

          $item1a = 'compras';
          $valor1a = $traerCliente['compras'] - array_sum($totalProductosComprados);

          $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);
        }


        /*=============================================
        ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
        =============================================*/

        $listaProductos_2 = json_decode($listaProductos, true);

        $totalProductosComprados_2 = [];

        foreach ($listaProductos_2 as $key => $value) {

          array_push($totalProductosComprados_2, $value['cantidad']);

          $tablaProductos_2 = 'productos';

          $item_2 = 'id';
          $valor_2 = base64_decode($value['id']);

          $traerProducto_2 = ModeloProductos::mdlMostrarProductos($tablaProductos_2, $item_2, $valor_2);

          $item1a_2 = 'ventas';
          $valor1a_2 = $value['cantidad'] + $traerProducto_2['ventas'];

          $nuevasVentas_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);

          $item1b_2 = 'stock';
          $valor1b_2 = $value['stock'];

          $nuevoStock_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1b_2, $valor1b_2, $valor_2);
        }

        if (base64_decode($_POST['seleccionarCliente'])) {

          $tablaClientes_2 = 'clientes';

          $item_2 = 'id';
          $valor_2 = base64_decode($_POST['seleccionarCliente']);

          $traerCliente_2 = ModeloClientes::mdlMostrarClientes($tablaClientes_2, $item_2, $valor_2);

          $item1a_2 = 'compras';
          $valor1a_2 = array_sum($totalProductosComprados_2) + $traerCliente_2['compras'];

          $comprasCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1a_2, $valor1a_2, $valor_2);

          $item1b_2 = 'ultimaCompra';

          date_default_timezone_set('America/Bogota');

          $fecha = date('Y-m-d');
          $hora = date('H:i:s');
          $valor1b_2 = $fecha . ' ' . $hora;

          $fechaCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1b_2, $valor1b_2, $valor_2);
        }
      }

      /*=============================================
      GUARDAR CAMBIOS DE LA COMPRA
      =============================================*/

      $datos = [
        'codigo' => $_POST['editarVenta'],
        'idCliente' => base64_decode($_POST['seleccionarCliente']),
        'idVendedor' => base64_decode($_POST['idVendedor']),
        'productos' => $listaProductos,
        'impuesto' => $_POST['nuevoPrecioImpuesto'],
        'neto' => $_POST['nuevoPrecioNeto'],
        'total' => $_POST['totalVenta'],
        'metodoPago' => $_POST['metodoPago'],
        'referencia' => $_POST['codigoPago']
      ];

      $respuesta = ModeloVentas::mdlEditarVenta($tabla, $datos);

      if ($respuesta == 'ok') {

        echo '<script>
        localStorage.removeItem("rango");
						Swal.fire({
							icon: "success",
              title: "EDITADO",
							text: "La venta ha sido editada correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/ventas";
							}
						});
						</script>';
      }
    }
  }

  /* --------------------------- FIN DE DITAR VENTA --------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                               ELIMINAR VENTA                               */
  /* -------------------------------------------------------------------------- */

  static public function ctrEliminarVenta()
  {

    if (isset($_GET['idVenta'])) {

      $tabla = 'ventas';

      $item = 'id';
      $valor = base64_decode($_GET['idVenta']);

      $traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

      /* --------------------- ACTUALIZAR FECHA ÚLTIMA COMPRA --------------------- */

      $tablaClientes = 'clientes';
      $itemVentas = null;
      $valorVentas = null;
      $traerVentas = ModeloVentas::mdlMostrarVentas($tabla, $itemVentas, $valorVentas);

      $guardarFechas = [];

      foreach ($traerVentas as $key => $value) {
        if ($value['idCliente'] == $traerVenta['idCliente']) {
          array_push($guardarFechas, $value['fecha']);
        }
      }

      if (count($guardarFechas) > 1) {

        if ($traerVenta['fecha'] > $guardarFechas[count($guardarFechas) - 2]) {
          $item = 'ultimaCompra';
          $valor = $guardarFechas[count($guardarFechas) - 2];
          $valorIdCliente = $traerVenta['idCliente'];
          $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);
        } else {
          $item = 'ultimaCompra';
          $valor = $guardarFechas[count($guardarFechas) - 1];
          $valorIdCliente = $traerVenta['idCliente'];
          $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);
        }
      } else {
        $item = 'ultimaCompra';
        $valor = '0000-00-00 00:00:00';
        $valorIdCliente = $traerVenta['idCliente'];
        $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);
      }

      /* -------------- FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES ------------- */

      $productos =  json_decode($traerVenta['productos'], true);
      $totalProductosComprados = [];

      foreach ($productos as $key => $value) {

        array_push($totalProductosComprados, $value['cantidad']);

        $tablaProductos = 'productos';
        $item = 'id';
        $valor = base64_decode($value['id']);
        $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

        $item1a = 'ventas';
        $valor1a = $traerProducto['ventas'] - $value['cantidad'];
        $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

        $item1b = 'stock';
        $valor1b = $value['cantidad'] + $traerProducto['stock'];
        $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
      }

      $tablaClientes = 'clientes';

      $itemCliente = 'id';
      $valorCliente = $traerVenta['idCliente'];

      $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

      $item1a = 'compras';
      if (is_array($traerCliente)) {
        $valor1a = $traerCliente['compras'] - array_sum($totalProductosComprados);
      } else {
        $valor = null;
      }


      $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);

      /* ----------------------------- ELIMINAR VENTA ----------------------------- */
      $respuesta = ModeloVentas::mdlEliminarVenta($tabla, base64_decode($_GET['idVenta']));

      if ($respuesta == 'ok') {

        echo '<script>

            Swal.fire({
							icon: "success",
              title: "BORRADO",
							text: "La venta ha sido eliminada!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/ventas";
							}
						});

				</script>';
      }
    }
  }

  /* -------------------------- FIN DE ELIMINAR VENTA ------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                                RANGO FECHAS                                */
  /* -------------------------------------------------------------------------- */

  static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal)
  {
    $tabla = 'ventas';
    $respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);
    return $respuesta;
  }

  /* ------------------------------ RANGO FECHAS ------------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                               DESCARGAR EXCEL                              */
  /* -------------------------------------------------------------------------- */

  public function ctrDescargarReporte()
  {

    if (isset($_GET['reporte'])) {

      $tabla = 'ventas';

      if (
        isset($_GET['fechaInicial']) &&
        isset($_GET['fechaFinal'])
      ) {
        $ventas = ModeloVentas::mdlRangoFechasVentas(
          $tabla,
          $_GET['fechaInicial'],
          $_GET['fechaFinal']
        );
      } else {
        $item = null;
        $valor = null;
        $ventas = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
      }


      /* -------------------------------------------------------------------------- */
      /*                         CREAMOS EL ARCHIVO DE EXCEL                        */
      /* -------------------------------------------------------------------------- */

      $Name = $_GET['reporte'] . '.xls';

      header('Expires: 0');
      header('Cache-control: private');
      header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
      header("Cache-Control: cache, must-revalidate");
      header('Content-Description: File Transfer');
      header('Last-Modified: ' . date('D, d M Y H:i:s'));
      header("Pragma: public");
      header('Content-Disposition:; filename="' . $Name . '"');
      header("Content-Transfer-Encoding: binary");

      echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NETO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>METODO DE PAGO</td>
          <td style='font-weight:bold; border:1px solid #eee;'>REFERENCIA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		
					</tr>");

      foreach ($ventas as $row => $item) {
        $cliente = ControladorClientes::ctrMostrarClientes('id', $item['idCliente']);
        $vendedor = ControladorUsuarios::ctrMostrarUsuario('id', $item['idVendedor']);

        if (is_array($cliente)) {
          $nombreCliente = $cliente['nombre'];
        } else {
          $nombreCliente = 'Sin Nombre';
        }


        echo utf8_decode("<tr>
          <td style='border:1px solid #eee;'>" . $item['codigo'] . "</td> 
          <td style='border:1px solid #eee;'>" . $nombreCliente . "</td>
          <td style='border:1px solid #eee;'>" . $vendedor['nombre'] . "</td>
          <td style='border:1px solid #eee;'>");

        $productos =  json_decode($item['productos'], true);

        foreach ($productos as $key => $valueProductos) {
          echo utf8_decode($valueProductos['cantidad'] . "<br>");
        }

        echo utf8_decode("</td><td style='border:1px solid #eee;'>");

        foreach ($productos as $key => $valueProductos) {
          echo utf8_decode($valueProductos['descripcion'] . "<br>");
        }

        echo utf8_decode("</td>
					<td style='border:1px solid #eee;'>$ " . number_format($item['impuesto'], 2) . "</td>
					<td style='border:1px solid #eee;'>$ " . number_format($item['neto'], 2) . "</td>	
					<td style='border:1px solid #eee;'>$ " . number_format($item['total'], 2) . "</td>
					<td style='border:1px solid #eee;'>" . $item['metodoPago'] . "</td>
          <td style='border:1px solid #eee;'>" . $item['referencia'] . "</td>
					<td style='border:1px solid #eee;'>" . substr($item['fecha'], 0, 10) . "</td>		
        </tr>");
      }
      echo "</table>";
    }
  }

  /* ----------------------------- DESCARGAR EXCEL ---------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              SUMA TOTAL VENTAS                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrSumaTotalVentas()
  {
    $tabla = 'ventas';
    $respuesta = ModeloVentas::mdlSumaTotalVentas($tabla);
    return $respuesta;
  }

  /* ---------------------------- SUMA TOTAL VENTAS --------------------------- */
}
