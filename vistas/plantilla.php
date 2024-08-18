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
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.css">
  <!-- SWEETALERT -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- select2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DATERANGEPICKER -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">

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
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
  <!-- SWEETALERT -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- select2 -->
  <script src="vistas/plugins/select2/js/select2.full.min.js"></script>
  <!-- JQUERY NUMBER -->
  <script src="vistas/js/jquery.number.min.js"></script>
  <!-- DATERANGEPICKER -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>


  <!-- <script src="vsitas/plugins/jszip/jszip.min.js"></script>
  <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->


  <!-- ------------------------------- PLUGINS JS ------------------------------- -->
</head>



<?php

if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {
  echo '<body class="hold-transition sidebar-mini sidebar-collapse">';
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
  echo '</div>';
} else {
  echo '<body class="hold-transition sidebar-mini sidebar-collapse login-page">';
  include_once 'modulos/login.php';
}

?>
<!-- DataTables  & Plugins -->
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- InputMask -->
<script src="vistas/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/administrarVentas.js"></script>
<script src="vistas/js/ventas.js"></script>
</body>

</html>