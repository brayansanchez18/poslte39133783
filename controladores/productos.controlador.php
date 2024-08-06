<?php

class ControladorProductos
{
  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarProductos($item, $valor)
  {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
    return $respuesta;
  }

  /* ------------------------ End of MOSTRAR PRODUCTOS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                               CREAR PRODUCTO                               */
  /* -------------------------------------------------------------------------- */

  static public function ctrCrearProducto()
  {

    if (isset($_POST['nuevaDescripcion'])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevaDescripcion']) &&
        preg_match('/^[0-9]+$/', $_POST['nuevoStock']) &&
        preg_match('/^[0-9.,]+$/', $_POST['nuevoPrecioCompra']) &&
        preg_match('/^[0-9.,]+$/', $_POST['nuevoPrecioVenta'])
      ) {

        /* ----------------------------- VALIDAR IMAGEN ----------------------------- */

        $ruta = 'vistas/img/productos/default/anonymous.png';

        if (
          isset($_FILES['nuevaImagen']['tmp_name']) &&
          !empty($_FILES['nuevaImagen']['tmp_name'])
        ) {

          list($ancho, $alto) = getimagesize($_FILES['nuevaImagen']['tmp_name']);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* ---- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO ---- */
          $directorio = 'vistas/img/productos/' . $_POST['nuevoCodigo'];
          mkdir($directorio, 0755);

          /* - DEACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP - */

          if ($_FILES['nuevaImagen']['type'] == 'image/jpeg') {

            /* ------------------ GUARDAMOS LA IMAGEN EN EL DIRECTORIO ------------------ */
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/productos/' . $_POST['nuevoCodigo'] . '/' . $aleatorio . '.jpg';
            $origen = imagecreateFromjpeg($_FILES['nuevaImagen']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAlto, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
          }

          if ($_FILES['nuevaImagen']['type'] == 'image/png') {

            /* ------------------ GUARDAMOS LA IMAGEN EN EL DIRECTORIO ------------------ */
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/productos/' . $_POST['nuevoCodigo'] . '/' . $aleatorio . '.png';
            $origen = imagecreateFromjpeg($_FILES['nuevaImagen']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAlto, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
          }
        } else {
          $ruta = 'vistas/img/productos/default/anonymous.png';
        }

        $tabla = 'productos';

        $datos = array(
          'idCategoria' => base64_decode($_POST['nuevaCategoria']),
          'codigo' => $_POST['nuevoCodigo'],
          'descripcion' => ucfirst($_POST['nuevaDescripcion']),
          'stock' => $_POST['nuevoStock'],
          'precioCompra' => $_POST['nuevoPrecioCompra'],
          'precioVenta' => $_POST['nuevoPrecioVenta'],
          'imagen' => $ruta
        );

        $respuesta = ModeloProductos::mdlIngresoProducto($tabla, $datos);

        if ($respuesta = 'ok') {

          echo '<script>
            Swal.fire({
							icon: "success",
              title: "GUARDADO",
							text: "El producto ha sido creado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/productos";
							}
						});
						</script>';
        }
      } else {

        echo '<script>
            Swal.fire({
							icon: "error",
              title: "ERROR",
							text: "El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/productos";
							}
						});
				</script>';
      }
    }
  }

  /* ----------------------------- CREAR PRODUCTO ----------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                               EDITAR PRODUCTO                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrEditarProducto()
  {

    if (isset($_POST['editarDescripcion'])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarDescripcion']) &&
        preg_match('/^[0-9]+$/', $_POST['editarStock']) &&
        preg_match('/^[0-9.]+$/', $_POST['editarPrecioCompra']) &&
        preg_match('/^[0-9.]+$/', $_POST['editarPrecioVenta'])
      ) {

        /* -------------------------------------------------------------------------- */
        /*                               VALIDAR IMAGEN                               */
        /* -------------------------------------------------------------------------- */

        $ruta = $_POST['imagenActual'];

        if (isset($_FILES['editarImagen']['tmp_name']) && !empty($_FILES['editarImagen']['tmp_name'])) {

          list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* ---- CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO ---- */
          $directorio = 'vistas/img/productos/' . $_POST['editarCodigo'];

          /* ----------- PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD ----------- */
          if (!empty($_POST['imagenActual']) && $_POST['imagenActual'] != 'vistas/img/productos/default/anonymous.png') {
            unlink($_POST['imagenActual']);
          } else {
            mkdir($directorio, 0755);
          }

          # DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          if ($_FILES['editarImagen']['type'] == 'image/jpeg') {
            /* ------------------ GUARDAMOS LA IMAGEN EN EL DIRECTORIO ------------------ */
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/productos/' . $_POST['editarCodigo'] . '/' . $aleatorio . '.jpg';
            $origen = imagecreatefromjpeg($_FILES['editarImagen']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
          }

          if ($_FILES['editarImagen']['type'] == 'image/png') {
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/productos/' . $_POST['editarCodigo'] . '/' . $aleatorio . '.png';
            $origen = imagecreatefrompng($_FILES['editarImagen']['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
          }
        }

        /* ----------------------------- VALIDAR IMAGEN ----------------------------- */

        $tabla = 'productos';

        $datos = array(
          'idCategoria' => $_POST['editarCategoria'],
          'codigo' => $_POST['editarCodigo'],
          'descripcion' => $_POST['editarDescripcion'],
          'stock' => $_POST['editarStock'],
          'precioCompra' => $_POST['editarPrecioCompra'],
          'precioVenta' => $_POST['editarPrecioVenta'],
          'imagen' => $ruta
        );

        $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

        if ($respuesta == 'ok') {
          echo '<script>
            Swal.fire({
							icon: "success",
              title: "EDITADO",
							text: "El producto ha sido editado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/productos";
							}
						});
						</script>';
        }
      } else {
        echo '<script>
            Swal.fire({
							icon: "error",
              title: "ERROR",
							text: "El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/productos";
							}
						});
						</script>';
      }
    }
  }

  /* --------------------------- END EDITAR PRODUCTO -------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              ELIMINAR PRODUCTO                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrEliminarProducto()
  {

    if (isset($_GET['idProducto'])) {

      $tabla = 'productos';
      $datos = base64_decode($_GET['idProducto']);

      if (
        $_GET['imagen'] != '' &&
        $_GET['imagen'] != 'vistas/img/productos/default/anonymous.png'
      ) {
        unlink($_GET['imagen']);
        rmdir('vistas/img/productos/' . $_GET['codigo']);
      }

      $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

      if ($respuesta == 'ok') {

        echo '<script>
            Swal.fire({
							icon: "success",
              title: "ELIMINADO",
							text: "El producto ha sido eliminado de la base de datos!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "/productos";
							}
						});
						</script>';
      }
    }
  }

  /* ---------------------------- ELIMINAR PRODUCTO --------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                             MOSTRAR SUMA VENTAS                            */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarSumaVentas()
  {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);
    return $respuesta;
  }

  /* ----------------------- FIN DE MOSTRAR SUMA VENTAS ----------------------- */
}
