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
        $valor = $value['id'];

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
      $valor1a = array_sum($totalProductosComprados) + $traerCliente['compras'];

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
}
