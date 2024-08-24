<?php

require_once '../controladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';
require_once '../controladores/usuarios.controlador.php';

session_start();

class TablaCategorias
{

  public function mostrarTablaCategorias()
  {
    $item = null;
    $valor = null;
    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

    if (count($categorias) == 0) {
      echo '{"data": []}';
      return;
    }

    $datosJsonCategorias = '{
            "data": [';

    for ($i = 0; $i < count($categorias); $i++) {

      /* -------------------------------------------------------------------------- */
      /*                            TRAEMOS LAS ACCIONES                            */
      /* -------------------------------------------------------------------------- */

      if ($_SESSION['perfil'] == 'Administrador') {
        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . base64_encode($categorias[$i]["id"]) . "' data-toggle='modal' data-target='#modalEditarCategoria'><i) class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='" . base64_encode($categorias[$i]["id"]) . "'><i class='fas fa-trash-alt'></i></button></div>";
      } else if ($_SESSION['perfil'] == 'Especial') {
        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . base64_encode($categorias[$i]["id"]) . "' data-toggle='modal' data-target='#modalEditarCategoria'><i) class='fa fa-edit'></i></button><button class='btn btn-danger disabled'><i class='fas fa-trash-alt'></i></button></div>";
      } else {
        $botones = "<div class='btn-group'><button class='btn btn-warning disabled'><i) class='fa fa-edit'></i></button><button class='btn btn-danger disabled'><i class='fas fa-trash-alt'></i></button></div>";
      }



      /* -------------------------- TRAEMOS LAS ACCIONES -------------------------- */

      $datosJsonCategorias .= '[
                "' . ($i + 1) . '",
                "' . $categorias[$i]['categoria'] . '",
                "' . $botones . '"
              ],';
    }

    $datosJsonCategorias = substr($datosJsonCategorias, 0, -1);
    $datosJsonCategorias .=   ']
      }';

    echo $datosJsonCategorias;
  }
}

$activarCategorias = new TablaCategorias();
$activarCategorias->mostrarTablaCategorias();
