<?php

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelo.php';

class TablaUsuarios
{

  /* -------------------------------------------------------------------------- */
  /*                          MOSTRAR TABLA DE USUARIOS                         */
  /* -------------------------------------------------------------------------- */

  static public function mostrarTablaUsuarios()
  {
    $item = null;
    $valor = null;
    $usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);


    if (count($usuarios) == 0) {
      echo '{"data": []}';
      return;
    } else {
      $datosJson = '{"data":[';

      for ($i = 0; $i < count($usuarios); $i++) {

        /* -------------------------------------------------------------------------- */
        /*                               TRAEMOS LA FOTO                              */
        /* -------------------------------------------------------------------------- */

        if ($usuarios[$i]['foto'] != '') {
          $foto = "<img class='img-circle' src='" . $usuarios[$i]['foto'] . "' width='60px' />";
        } else {
          $foto = "<img class='img-circle' src='vistas/img/usuarios/default/anonymous.png' width='60px' />";
        }

        /* ----------------------------- TRAEMOS LA FOTO ---------------------------- */

        /* -------------------------------------------------------------------------- */
        /*                             TRAEMOS LOS ESTADOS                            */
        /* -------------------------------------------------------------------------- */

        if ($usuarios[$i]['estado'] == 1) {
          $estado = "<button class='btn btn-xs btn-success btnActivar' idUsuario='" . base64_encode($usuarios[$i]['id']) . "' estadoUsuario='" . base64_encode(0) . "'>Activo</button>";
        } else {
          $estado = "<button class='btn btn-xs btn-danger btnActivar' idUsuario='" . base64_encode($usuarios[$i]['id']) . "' estadoUsuario='" . base64_encode(1) . "'>Inactivo</button>";
        }


        /* --------------------------- TRAEMOS LOS ESTADOS -------------------------- */

        /* -------------------------------------------------------------------------- */
        /*                            TRAEMOS LAS ACCIONES                            */
        /* -------------------------------------------------------------------------- */

        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='" . base64_encode($usuarios[$i]["id"]) . "' data-toggle='modal' data-target='#modalEditarUsuario'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarUsuario' idUsuario='" . base64_encode($usuarios[$i]["id"]) . "'><i class='fas fa-trash-alt'></i></button></div>";

        /* -------------------------- TRAEMOS LAS ACCIONES -------------------------- */

        $datosJson .= '[
          "' . $usuarios[$i]['id'] . '",
          "' . $usuarios[$i]['nombre'] . '",
          "' . $usuarios[$i]['usuario'] . '",
          "' . $foto . '",
          "' . $usuarios[$i]['perfil'] . '",
          "' . $estado . '",
          "' . $usuarios[$i]['ultimologin'] . '",
          "' . $botones . '"
        ],';
      }


      $datosJson = substr($datosJson, 0, -1);
      $datosJson .= ']}';
      echo $datosJson;
    }
  }


  /* ------------------------ MOSTRAR TABLA DE USUARIOS ----------------------- */
}

$activarUsuarios = new TablaUsuarios();
$activarUsuarios->mostrarTablaUsuarios();
