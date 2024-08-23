<?php
$item = null;
$valor = null;
$orden = 'ventas';

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = [
  "#dc3545", // ROJO
  "#51a74b", // VERDE
  "#ffc11e", // AMARILLO
  "#9471b8",
  "#6f42c1", // MORADO
  "#0090ff", // 
  "#35a2b8", //
  "#8ed4c8", //
  "#fd7e49", // 
  "#d48ead"
];

$coloresText = [
  'red',
  'green',
  'yellow',
  'aqua',
  'purple',
  'blue',
  'cyan',
  'magenta',
  'orange',
  'gold'
];
$totalVentas = ControladorProductos::ctrMostrarSumaVentas();

?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Productos más vendidos</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChart" height="150"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
          <?php for ($i = 0; $i < 10; $i++): ?>
            <li>
              <i class="far fa-circle text-<?= $coloresText[$i] ?>"></i>
              <?= $productos[$i]['descripcion'] ?>
            </li>
          <?php endfor ?>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer p-0">
    <ul class="nav nav-pills flex-column">

      <?php for ($i = 0; $i < 5; $i++): ?>
        <li class="nav-item">
          <a>
            <img src="<?= $productos[$i]['imagen'] ?>" class="img-thumbnail" width="60px" style="margin-right:10px">
            <?= $productos[$i]['descripcion'] ?>
            <span class="mr-4 mt-3 float-right text-<?= $coloresText[$i] ?>">
              <?= ceil($productos[$i]['ventas'] * 100 / $totalVentas['total']) ?>%
            </span>
          </a>
        </li>
      <?php endfor ?>
    </ul>
  </div>
  <!-- /.footer -->
</div>
<!-- /.card -->

<script>
  //-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = {
    labels: [
      <?php for ($i = 0; $i < 10; $i++): ?> '<?= $productos[$i]['descripcion'] ?>',
      <?php endfor ?>
    ],
    datasets: [{
      data: [
        <?php for ($i = 0; $i < 10; $i++): ?> '<?= $productos[$i]['ventas'] ?>',
        <?php endfor ?>
      ],
      backgroundColor: [
        <?php for ($i = 0; $i < 10; $i++): ?> '<?= $colores[$i] ?>',
        <?php endfor ?>
      ]
    }]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  });

  //-----------------
  // - END PIE CHART -
  //-----------------
</script>