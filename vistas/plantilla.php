<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS39133783</title>

  <!-- -------------------------------------------------------------------------- */
  /*                                 PLUGINS CSS                                */
  /* -------------------------------------------------------------------------- -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">

  <!-- ------------------------------- PLUGINS CSS ------------------------------ -->

  <!-- -------------------------------------------------------------------------- */
  /*                                 PLUGINS JS                                 */
  /* -------------------------------------------------------------------------- -->

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- ------------------------------- PLUGINS JS ------------------------------- -->
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">

  <?php

  // if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {
  echo '<div class="wrapper">';
  include_once 'modulos/header.php';
  include_once 'modulos/lateral.php';

  /* -------------------------------------------------------------------------- */
  /*                                  CONTENIDO                                 */
  /* -------------------------------------------------------------------------- */

  if (isset($_GET['ruta'])) {
    if (
      $_GET['ruta'] == 'inicio' ||
      $_GET['ruta'] == 'usuarios' ||
      $_GET['ruta'] == 'categorias' ||
      $_GET['ruta'] == 'productos' ||
      $_GET['ruta'] == 'clientes' ||
      $_GET['ruta'] == 'ventas' ||
      $_GET['ruta'] == 'crear-venta' ||
      $_GET['ruta'] == 'reportes' ||
      $_GET['ruta'] == 'salir' ||
      $_GET['ruta'] == 'editar-venta'
    ) {
      include_once 'modulos/' . $_GET['ruta'] . '.php';
    } else {
      include_once 'modulos/error404.php';
    }
  } else {
    include_once 'modulos/inicio.php';
  }

  include_once 'modulos/footer.php';

  /* -------------------------------- CONTENIDO ------------------------------- */
  echo '</div';
  // } else {
  //   include_once 'modulos/login.php';
  // }

  ?>


</body>

</html>