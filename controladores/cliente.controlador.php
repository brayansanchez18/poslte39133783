<?php

class ControladorClientes
{

  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR CLIENTES                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarClientes($item, $valor)
  {
    $tabla = 'clientes';
    $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
    return $respuesta;
  }

  /* ---------------------------- EDITAR CATEGORIA ---------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                                CREAR CLIENTE                               */
  /* -------------------------------------------------------------------------- */

  static public function ctrCrearCliente()
  {

    if (isset($_POST['nuevoCliente'])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevoCliente']) &&
        preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['nuevoEmail']) &&
        preg_match('/^[()\-0-9+ ]+$/', $_POST['nuevoTelefono']) &&
        preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST['nuevaDireccion'])
      ) {

        $tabla = 'clientes';

        $datos = [
          'nombre' => $_POST['nuevoCliente'],
          'email' => $_POST['nuevoEmail'],
          'telefono' => $_POST['nuevoTelefono'],
          'direccion' => $_POST['nuevaDireccion'],
        ];

        $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

        if ($respuesta == 'ok') {

          echo '<script>
            Swal.fire({
							icon: "success",
              title: "GUARDADO",
							text: "El cliente ha sido creado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/clientes";
							}
						});
						</script>';
        }
      } else {
        echo '<script>
            Swal.fire({
							icon: "error",
              title: "ERROR",
							text: "El cliente no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/clientes";
							}
						});
						</script>';
      }
    }
  }

  /* ------------------------------ CREAR CLIENTE ----------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                               EDITAR CLIENTE                               */
  /* -------------------------------------------------------------------------- */

  static public function ctrEditarCliente()
  {

    if (isset($_POST['editarCliente'])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarCliente']) &&
        preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['editarEmail']) &&
        preg_match('/^[()\-0-9+ ]+$/', $_POST['editarTelefono']) &&
        preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST['editarDireccion'])
      ) {

        $tabla = 'clientes';

        $datos = [
          'id' => base64_decode($_POST['idCliente']),
          'nombre' => $_POST['editarCliente'],
          'email' => $_POST['editarEmail'],
          'telefono' => $_POST['editarTelefono'],
          'direccion' => $_POST['editarDireccion'],
        ];

        $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

        if ($respuesta == 'ok') {

          echo '<script>
            Swal.fire({
							icon: "success",
              title: "EDITADO",
							text: "El cliente ha sido actualizado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/clientes";
							}
						});
						</script>';
        }
      } else {
        echo '<script>
            Swal.fire({
							icon: "error",
              title: "ERROR",
							text: "El cliente no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/clientes";
							}
						});
						</script>';
      }
    }
  }

  /* ----------------------------- EDITAR CLIENTE ----------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              ELIMINAR CLIENTE                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrEliminarCliente()
  {

    if (isset($_GET['idCliente'])) {

      $tabla = 'clientes';
      $datos = base64_decode($_GET['idCliente']);
      $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

      if ($respuesta == 'ok') {
        echo '<script>
            Swal.fire({
							icon: "success",
              title: "BORRADO",
							text: "El cliente ha sido eliminado de la base de datos!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/clientes";
							}
						});
						</script>';
      }
    }
  }

  /* ---------------------------- ELIMINAR CLIENTE ---------------------------- */
}
