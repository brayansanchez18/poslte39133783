<?php

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelo.php';

class AjaxUsuarios
{

  /* -------------------------------------------------------------------------- */
  /*                               EDITAR USUARIO                               */
  /* -------------------------------------------------------------------------- */

  public $idUsuario;

  public function ajaxEditarUsuario()
  {
    $item = 'id';
    $valor = $this->idUsuario;
    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
    echo json_encode($respuesta);
  }

  /* -------------------------- FIN DE EDITAR USUARIO ------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                         VALIDAR NO REPETIR USUARIO                         */
  /* -------------------------------------------------------------------------- */

  public $validarUsuario;

  public function ajaxValidarUsuario()
  {
    $item = 'usuario';
    $valor = $this->validarUsuario;
    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
    echo json_encode($respuesta);
  }

  /* -------------------- FIN DE VALIDAR NO REPETIR USUARIO ------------------- */
}

/* -------------------------------------------------------------------------- */
/*                               EDITAR USUARIO                               */
/* -------------------------------------------------------------------------- */

if (isset($_POST['idUsuario'])) {
  $editar = new AjaxUsuarios();
  $editar->idUsuario = base64_decode($_POST['idUsuario']);
  $editar->ajaxEditarUsuario();
}

/* -------------------------- FIN DE EDITAR USUARIO ------------------------- */

/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR USUARIO                         */
/* -------------------------------------------------------------------------- */

if (isset($_POST['validarUsuario'])) {
  $valUsuario = new AjaxUsuarios();
  $valUsuario->validarUsuario = $_POST['validarUsuario'];
  $valUsuario->ajaxValidarUsuario();
}

/* -------------------- FIN DE VALIDAR NO REPETIR USUARIO ------------------- */
