<?php

require_once '../controladores/ventas.controlador.php';
require_once '../controladores/cliente.controlador.php';
require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/ventas.modelo.php';
require_once '../modelos/clientes.modelo.php';
require_once '../modelos/usuarios.modelo.php';

session_start();

class AjaxTabladeVentas
{

  static public function MostrarVentas()
  {

    $item = null;
    $valor = null;
    $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

    if (count($respuesta) == 0) {
      echo '{"data": []}';
      return;
    }

    $datosJson = '{
            "data": [';

    for ($i = 0; $i < count($respuesta); $i++) {

      $itemCliente = 'id';
      $valorCliente = $respuesta[$i]['idCliente'];

      $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

      if (is_array($respuestaCliente)) {
        if ($respuestaCliente) {
          $cliente = $respuestaCliente['nombre'];
        } else {
          $cliente = 'John Doe';
        }
      } else {
        $cliente = 'John Doe';
      }


      $itemUsuario = 'id';
      $valorUsuario = $respuesta[$i]['idVendedor'];

      $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuario($itemUsuario, $valorUsuario);

      if ($_SESSION['perfil'] == 'Administrador') {
        // $botones =  "<div class='btn-group'><button class='btn btn-info btnImprimirFactura' codigoVenta='" . $respuesta[$i]['codigo'] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarVenta' idVenta='" . $respuesta[$i]['id'] . "'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarVenta' idVenta='" . $respuesta[$i]['id'] . "'><i class='fa fa-times'></i></button></div>";

        // $botones = "<div class='btn-group'><button class='btn btn-success'><i class='fas fa-file-invoice-dollar'></i></button><button class='btn btn-info btnImprimirRecibo' codigoVenta='" . base64_encode($respuesta[$i]['codigo']) . "'><i class='fas fa-print'></i></button><button class='btn btn-warning btnEditarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fas fa-trash-alt'></i></button></div>";

        // SIN BOTON DE FACTORA
        $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirRecibo' codigoVenta='" . base64_encode($respuesta[$i]['codigo']) . "'><i class='fas fa-print'></i></button><button class='btn btn-warning btnEditarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fas fa-trash-alt'></i></button></div>";
      } else {
        $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirRecibo' codigoVenta='" . base64_encode($respuesta[$i]['codigo']) . "'><i class='fas fa-print'></i></button></div>";
      }

      if ($respuesta[$i]['referencia'] != "") {
        $ref = $respuesta[$i]['referencia'];
      } else {
        $ref = 'Sin referencia';
      }


      $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $respuesta[$i]['codigo'] . '",
                    "' . $cliente . '",
                    "' . $respuestaUsuario['nombre'] . '",
                    "' . $respuesta[$i]['metodoPago'] . '",
                    "' . $ref . '",
                    "MX$ ' . number_format($respuesta[$i]['neto'], 2) . '",
                    "MX$ ' . number_format($respuesta[$i]['total'], 2) . '",
                    "' . $respuesta[$i]['fecha'] . '",
                    "' . $botones . '"
                ],';
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .=   ']
            }';

    echo $datosJson;
  }

  public $fechaInicial;
  public $fechaFinal;

  public function MostrarVentasFehca()
  {

    $fechaInicial = $this->fechaInicial;
    $fechaFinal = $this->fechaFinal;
    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

    echo $fechaInicial;

    // if (count($respuesta) == 0) {
    //   echo '{"data": []}';
    //   return;
    // }

    // $datosJson = '{
    //         "data": [';

    // for ($i = 0; $i < count($respuesta); $i++) {

    //   $itemCliente = 'id';
    //   $valorCliente = $respuesta[$i]['idCliente'];

    //   $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

    //   if (is_array($respuestaCliente)) {
    //     if ($respuestaCliente) {
    //       $cliente = $respuestaCliente['nombre'];
    //     } else {
    //       $cliente = 'John Doe';
    //     }
    //   } else {
    //     $cliente = 'John Doe';
    //   }


    //   $itemUsuario = 'id';
    //   $valorUsuario = $respuesta[$i]['idVendedor'];

    //   $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuario($itemUsuario, $valorUsuario);

    //   if ($_SESSION['perfil'] == 'Administrador') {
    //     // $botones =  "<div class='btn-group'><button class='btn btn-info btnImprimirFactura' codigoVenta='" . $respuesta[$i]['codigo'] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarVenta' idVenta='" . $respuesta[$i]['id'] . "'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarVenta' idVenta='" . $respuesta[$i]['id'] . "'><i class='fa fa-times'></i></button></div>";

    //     // $botones = "<div class='btn-group'><button class='btn btn-success'><i class='fas fa-file-invoice-dollar'></i></button><button class='btn btn-info btnImprimirRecibo' codigoVenta='" . base64_encode($respuesta[$i]['codigo']) . "'><i class='fas fa-print'></i></button><button class='btn btn-warning btnEditarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fas fa-trash-alt'></i></button></div>";

    //     // SIN BOTON DE FACTORA
    //     $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirRecibo' codigoVenta='" . base64_encode($respuesta[$i]['codigo']) . "'><i class='fas fa-print'></i></button><button class='btn btn-warning btnEditarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarVenta' idVenta='" . base64_encode($respuesta[$i]['id']) . "'><i class='fas fa-trash-alt'></i></button></div>";
    //   } else {
    //     $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirRecibo' codigoVenta='" . base64_encode($respuesta[$i]['codigo']) . "'><i class='fas fa-print'></i></button></div>";
    //   }

    //   if ($respuesta[$i]['referencia'] != "") {
    //     $ref = $respuesta[$i]['referencia'];
    //   } else {
    //     $ref = 'Sin referencia';
    //   }


    //   $datosJson .= '[
    //                 "' . ($i + 1) . '",
    //                 "' . $respuesta[$i]['codigo'] . '",
    //                 "' . $cliente . '",
    //                 "' . $respuestaUsuario['nombre'] . '",
    //                 "' . $respuesta[$i]['metodoPago'] . '",
    //                 "' . $ref . '",
    //                 "MX$ ' . number_format($respuesta[$i]['neto'], 2) . '",
    //                 "MX$ ' . number_format($respuesta[$i]['total'], 2) . '",
    //                 "' . $respuesta[$i]['fecha'] . '",
    //                 "' . $botones . '"
    //             ],';
    // }

    // $datosJson = substr($datosJson, 0, -1);

    // $datosJson .=   ']
    //         }';

    // echo $datosJson;
  }
}



/* -------------------------------------------------------------------------- */
/*                              MOSTRAR POR FECHA                             */
/* -------------------------------------------------------------------------- */

$activarTablaVentas = new AjaxTabladeVentas();
$activarTablaVentas->MostrarVentas();


/* --------------------------- MOSTRAR POR FECHAS --------------------------- */