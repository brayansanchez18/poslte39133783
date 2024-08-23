<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reportes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Reportes</li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-default float-left" id="daterange-btn2">
          <span>
            <i class="far fa-calendar-alt"></i> Ordenar por fecha
          </span>
          <i class="fas fa-caret-down"></i>
        </button>

        <?php if (isset($_GET['fechaInicial'])): ?>
          <a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial=<?= $_GET['fechaInicial'] ?>&fechaFinal=<?= $_GET['fechaFinal'] ?>">
          <?php else: ?>
            <a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';
            <?php endif ?>

            <button type="button" class="btn btn-success float-right">
              <span>
                Descargar reporte en Excel <i class="fas fa-file-excel ml-2"></i>
              </span>
            </button>
            </a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <?php include_once 'reportes/grafico-ventas.php'; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-6">
            <?php
            include_once 'reportes/productos-mas-vendidos.php';
            ?>
          </div>

          <div class="col-12 col-md-6">
            <?php
            include_once 'reportes/grafico-vendedores.php';
            ?>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->