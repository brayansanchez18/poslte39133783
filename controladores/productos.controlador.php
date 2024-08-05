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
}
