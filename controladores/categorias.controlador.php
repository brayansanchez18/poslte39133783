<?php

class ControladorCategorias
{
  /* -------------------------------------------------------------------------- */
  /*                              CREAR CATEGORIAS                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrCrearCategorias()
  {

    if (isset($_POST['nuevaCategoria'])) {
      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevaCategoria'])) {
        $tabla = 'categorias';
        $datos = ucfirst($_POST['nuevaCategoria']);
        $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

        if ($respuesta == 'ok') {
          echo '<script>
            Swal.fire({
							icon: "success",
              title: "AGREGADO",
							text: "La categoría ha sido creada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/categorias";
							}
						});
					</script>';
        }
      } else {

        echo '<script>
            Swal.fire({
							icon: "error",
              title: "ERROR",
							text: "La categoría no puede ir vacia o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/categorias";
							}
						});
				</script>';
      }
    }
  }

  /* ------------------------- End of CREAR CATEGORIAS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                             MOSTRAR CATEGORIAS                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarCategorias($item, $valor)
  {
    $tabla = 'categorias';
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
    return $respuesta;
  }

  /* ------------------------ End of MOSTRAR CATEGORIAS ----------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              EDITAR CATEGORIA                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrEditarCategoria()
  {

    if (isset($_POST["editarCategoria"])) {

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])) {

        $tabla = 'categorias';
        $datos = [
          'categoria' => ucfirst($_POST['editarCategoria']),
          'id' => base64_decode($_POST['idCategoria'])
        ];

        $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

        if ($respuesta == 'ok') {

          echo '<script>
            Swal.fire({
							icon: "success",
              title: "EDITADO",
							text: "La categoría ha sido editada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/categorias";
							}
						});
					</script>';
        }
      } else {

        echo '<script>
            Swal.fire({
							icon: "error",
              title: "ERROR",
							text: "La categoría no puede ir vacía o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/categorias";
							}
						});
				</script>';
      }
    }
  }

  /* ---------------------------- EDITAR CATEGORIA ---------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              BORRAR CATEGORIA                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrBorrarCategoria()
  {

    if (isset($_GET['idCategoria'])) {

      $productos = ControladorProductos::ctrMostrarProductos('idCategoria', base64_decode($_GET['idCategoria']));

      if (is_array($productos) && count($productos) != 0) {

        echo '<script>
          Swal.fire({
            title: "¡ERROR!",
            text: "La categoria no puede ser eliminada por que contiene productos",
            icon: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false,
          }).then((isConfirm) => {
            if (isConfirm) {
              window.location = "categorias";
            }
          })
        </script>';
      } else {

        $tabla = 'Categorias';
        $datos = base64_decode($_GET['idCategoria']);

        $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

        if ($respuesta == 'ok') {

          echo '<script>
            Swal.fire({
              title: "¡BORRADO!",
              text: "La categoría ha sido borrada correctamente",
              icon: "success",
              confirmButtonText: "Cerrar",
              closeOnConfirm: false,
            }).then((isConfirm) => {
              if (isConfirm) {
                window.location = "categorias";
              }
            })
          </script>';
        }
      }
    }
  }

  /* ------------------------- End of BORRAR CATEGORIA ------------------------ */
}
