<?php

class ControladorUsuarios
{

  /* -------------------------------------------------------------------------- */
  /*                                    LOGIN                                   */
  /* -------------------------------------------------------------------------- */

  static public function ctrIngresoUsuario()
  {
    if (isset($_POST['ingUsuario'])) {
      if (
        preg_match('/^[a-zA-Z0-9_.@-_]+$/', $_POST['ingUsuario']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])
      ) {

        $encriptar = crypt($_POST['ingPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $tabla = 'usuarios';
        $item = 'usuario';
        $valor = $_POST['ingUsuario'];
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        if (is_array($respuesta) && $respuesta['usuario'] == $_POST['ingUsuario'] && $respuesta['pass'] == $encriptar) {

          // if (is_array($respuesta) && $respuesta['usuario'] == $_POST['ingUsuario']) {

          if ($respuesta['estado'] == 1) {

            $_SESSION['iniciarSesion'] = 'ok';
            $_SESSION['id'] = $respuesta['id'];
            $_SESSION['nombre'] = $respuesta['nombre'];
            $_SESSION['usuario'] = $respuesta['usuario'];
            $_SESSION['foto'] = $respuesta['foto'];
            $_SESSION['perfil'] = $respuesta['perfil'];

            /* -------------------------------------------------------------------------- */
            /*                 REGISTRAR FECHA PARA SABER EL ULTIMO LOGIN                 */
            /* -------------------------------------------------------------------------- */

            date_default_timezone_set('America/Mexico_City');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha . ' ' . $hora;

            $item1 = 'ultimologin';
            $valor1 = $fechaActual;

            $item2 = 'id';
            $valor2 = $respuesta['id'];

            $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

            if ($ultimoLogin == 'ok') {
              echo '<script>
								window.location = "inicio";
							</script>';
            }
          } else {

            echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';
          }
        } else {
          echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
        }
      }
    }
  }

  /* ---------------------------------- LOGIN --------------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                               MOSTRAR USUARIO                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarUsuario($item, $valor)
  {
    $tabla = 'usuarios';
    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
    return $respuesta;
  }

  /* ----------------------------- MOSTRAR USUARIO ---------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                             REGISTRO DE USUARIO                            */
  /* -------------------------------------------------------------------------- */

  static public function ctrCrearUsuario()
  {
    if (isset($_POST['nuevoUsuario'])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .@-_]+$/', $_POST['nuevoNombre']) &&
        preg_match('/^[a-zA-Z0-9.@-_]+$/', $_POST['nuevoUsuario']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoPassword'])
      ) {

        /* -------------------------------------------------------------------------- */
        /*                               VALIDAR IMAGEN                               */
        /* -------------------------------------------------------------------------- */

        $ruta = '';

        if (isset($_FILES['nuevaFoto']['tmp_name'])) {

          list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* -------------------------------------------------------------------------- */
          /*       CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO      */
          /* -------------------------------------------------------------------------- */

          $directorio = 'vistas/img/usuarios/' . $_POST['nuevoUsuario'];
          mkdir($directorio, 0755);

          /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

          if ($_FILES['nuevaFoto']['type'] == 'image/jpeg') {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/usuarios/' . $_POST['nuevoUsuario'] . '/' . $aleatorio . '.jpg';
            $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
          }

          if ($_FILES['nuevaFoto']['type'] == 'image/png') {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/usuarios/' . $_POST['nuevoUsuario'] . '/' . $aleatorio . '.png';
            $origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
          }
        }

        $tabla = 'usuarios';
        $encriptar = crypt($_POST['nuevoPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $datos = array(
          'nombre' => $_POST['nuevoNombre'],
          'usuario' => $_POST['nuevoUsuario'],
          'password' => $encriptar,
          'perfil' => $_POST['nuevoPerfil'],
          'foto' => $ruta
        );

        $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

        if ($respuesta == 'ok') {

          echo '<script>
						Swal.fire({
							icon: "success",
              title: "OK",
							text: "¡El usuario ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/usuarios";
							}
						});
						</script>';
        }
      } else {

        echo '<script>
				Swal.fire({
					icon: "error",
          title: "Error",
					text: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function(result){
					if(result.value){
						window.location = "usuarios";
					}
				});
			</script>';
      }
    }
  }

  /* --------------------------- REGISTRO DE USUARIO -------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                               EDITAR USUARIO                               */
  /* -------------------------------------------------------------------------- */

  static public function ctrEditarUsuario()
  {
    if (isset($_POST['editarUsuario'])) {
      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarNombre'])) {

        /* ----------------------------- VALIDAR IMAGEN ----------------------------- */

        $ruta = $_POST['fotoActual'];

        if (
          isset($_FILES['editarFoto']['tmp_name']) &&
          !empty($_FILES['editarFoto']['tmp_name'])
        ) {
          list($ancho, $alto) = getimagesize($_FILES['editarFoto']['tmp_name']);
          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* --------- CREAMOS EL DIRECTORIO PARA GUARDAR LA FOTO DEL USUARIO --------- */
          $directorio = 'vistas/img/usuarios/' . $_POST['editarUsuario'];

          /* --------------- PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD --------------- */
          if (!empty($_POST['fotoActual'])) {
            unlink($_POST['fotoActual']);
          } else {
            mkdir($directorio, 0755);
          }

          /* ------ DEPENDIENDO EL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES DE PHP ------ */
          if ($_FILES['editarFoto']['type'] == 'image/jpeg') {

            /* ------------------ GUARDAMOS LA IMAGEN EN EL DIRECTORIO ------------------ */
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/usuarios/' . $_POST['editarUsuario'] . '/' . $aleatorio . '.jpg';
            $origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
          }

          if ($_FILES['editarFoto']['type'] == 'image/png') {

            /* ------------------ GUARDAMOS LA IMAGEN EN EL DIRECTORIO ------------------ */
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/usuarios/' . $_POST['editarUsuario'] . '/' . $aleatorio . '.png';
            $origen = imagecreatefrompng($_FILES['editarFoto']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
          }
        }

        $tabla = 'usuarios';

        if ($_POST['editarPassword'] != '') {
          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['editarPassword'])) {
            $encriptar = crypt($_POST['editarPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
          } else {

            echo '<script>
                  Swal.fire({
                    icon: "error",
                    title: "ERROR!",
                    text: "La contraseña no puede ir vacía o llevar caracteres especiales",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                  }).then(function(result){
                    if(result.value){
                      window.location = "/usuarios";
                    }
                  });
							</script>';
          }
        } else {
          $encriptar = $_POST['passwordActual'];
        }

        $datos = array(
          'nombre' => $_POST['editarNombre'],
          'usuario' => $_POST['editarUsuario'],
          'pass' => $encriptar,
          'perfil' => $_POST['editarPerfil'],
          'foto' => $ruta
        );

        $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

        if ($respuesta == 'ok') {
          echo '<script>
                  Swal.fire({
                    icon: "success",
                    title: "GUARDADO",
                    text: "El usuario ha sido editado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                  }).then(function(result){
                    if(result.value){
                      window.location = "/usuarios";
                    }
                  });
                </script>';
        } else {
          echo '<script>
                  Swal.fire({
                    icon: "error",
                    title: "ERROR",
                    text: "Ocurrio un error al editar el usuario, intentelo de nuevo mas tarde",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                  }).then(function(result){
                    if(result.value){
                      window.location = "/usuarios";
                    }
                  });
                </script>';
        }
      } else {
        echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "ERROR",
                  text: "El nombre no puede ir vacio o llevar caracteres especiales",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "/usuarios";
                  }
                })
              </script>';
      }
    }
  }

  /* ----------------------------- EDITAR USUARIO ----------------------------- */
}
