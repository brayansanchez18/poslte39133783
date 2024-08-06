<?php

require_once '../controladores/cliente.controlador.php';
require_once '../modelos/clientes.modelo.php';
require_once '../controladores/usuarios.controlador.php';

SESSION_START();

class TablaClientes
{

  /* -------------------------------------------------------------------------- */
  /*                        MOSTRAR LA TABLA DE PRODUCTOS                       */
  /* -------------------------------------------------------------------------- */

  public function mostrarTablaClientes()
  {
    $item = null;
    $valor = null;
    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
    $datosJsonClientes = '{
            "data": [';

    for ($i = 0; $i < count($clientes); $i++) {

      /* -------------------------- TRAEMOS LAS ACCIONES -------------------------- */

      if ($_SESSION['perfil'] == 'Administrador') {
        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='" . base64_encode($clientes[$i]['id']) . "' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='" . base64_encode($clientes[$i]['id']) . "'><i class='fas fa-trash-alt'></i></button></div>";
      } else {
        $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='" . base64_encode($clientes[$i]['id']) . "' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-edit'></i></button></div>";
      }

      $datosJsonClientes .= '[
        "' . ($i + 1) . '",
        "' . $clientes[$i]['nombre'] . '",
        "' . $clientes[$i]['email'] . '",
        "' . $clientes[$i]['telefono'] . '",
        "' . $clientes[$i]['direccion'] . '",
        "' . $clientes[$i]['compras'] . '",
        "' . $clientes[$i]['ultimaCompra'] . '",
        "' . $clientes[$i]['fecha'] . '",
        "' . $botones . '"
      ],';
    }

    $datosJsonClientes = substr($datosJsonClientes, 0, -1);

    $datosJsonClientes .=   ']
        }';

    echo $datosJsonClientes;
  }
}

$activarClientes = new TablaClientes();
$activarClientes->mostrarTablaClientes();
