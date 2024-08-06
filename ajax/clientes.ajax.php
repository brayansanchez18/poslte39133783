<?php

require_once '../controladores/cliente.controlador.php';
require_once '../modelos/clientes.modelo.php';

class AjaxClientes
{

  /* -------------------------------------------------------------------------- */
  /*                               EDITAR CLIENTE                               */
  /* -------------------------------------------------------------------------- */

  public $idCliente;

  public function ajaxEditarCliente()
  {
    $item = 'id';
    $valor = $this->idCliente;
    $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);
    echo json_encode($respuesta);
  }

  /* ----------------------------- EDITAR CLIENTE ----------------------------- */
}

/* -------------------------------------------------------------------------- */
/*                               EDITAR CLIENTE                               */
/* -------------------------------------------------------------------------- */

if (isset($_POST['idCliente'])) {
  $cliente = new AjaxClientes();
  $cliente->idCliente = base64_decode($_POST['idCliente']);
  $cliente->ajaxEditarCliente();
}

/* -------------------------- FIN DE EDITAR CLIENTE ------------------------- */