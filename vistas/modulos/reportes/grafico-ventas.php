<?php
error_reporting(0);
if (isset($_GET['fechaInicial'])) {
  $fechaInicial = $_GET['fechaInicial'];
  $fechaFinal = $_GET['fechaFinal'];
} else {
  $fechaInicial = null;
  $fechaFinal = null;
}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
$arrayFechas = [];
$arrayVentas = [];
$sumaPagosMes = [];

foreach ($respuesta as $key => $value) {

  $fecha = substr($value['fecha'], 0, 7);
  array_push($arrayFechas, $fecha);

  $arrayVentas = array($fecha => $value['total']);

  foreach ($arrayVentas as $key => $value) {
    $sumaPagosMes[$key] += $value;
  }
}

#Evitamos repetir fecha
$noRepetirFechas = array_unique($arrayFechas);

?>
<!-- solid sales graph -->
<div class="card bg-gradient-info">
  <div class="card-header border-0">
    <h3 class="card-title">
      <i class="fas fa-th mr-1"></i>
      Grafico de Ventas
    </h3>
  </div>
  <div class="card-body">
    <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
  <!-- /.card-body -->

  <script>
    // Sales graph chart
    var salesGraphChartCanvas = $("#line-chart")
      .get(0)
      .getContext("2d");
    // $('#revenue-chart').get(0).getContext('2d');

    var salesGraphChartData = {
      labels: [
        <?php if ($noRepetirFechas != null) : ?>
          <?php foreach ($noRepetirFechas as $value): ?> '<?= $value ?>',
          <?php endforeach ?>
        <?php else : ?> '0'
        <?php endif; ?>
      ],
      datasets: [{
        label: "Recaudado MXN$",
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: "#efefef",
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: "#efefef",
        pointBackgroundColor: "#efefef",
        data: [
          <?php if ($noRepetirFechas != null) : ?>
            <?php foreach ($noRepetirFechas as $value): ?> '<?= $sumaPagosMes[$value] ?>',
            <?php endforeach ?>
          <?php else : ?> '0'
          <?php endif; ?>
        ],
      }, ],
    };

    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false,
      },
      scales: {
        xAxes: [{
          ticks: {
            fontColor: "#efefef",
          },
          gridLines: {
            display: false,
            color: "#efefef",
            drawBorder: false,
          },
        }, ],
        yAxes: [{
          ticks: {
            callback: (value, index, values) => {
              return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'MXN',
              }).format(value)
            },
            stepSize: 5000,
            fontColor: "#efefef",
          },
          gridLines: {
            display: true,
            color: "#efefef",
            drawBorder: false,
          },
        }, ],
      },
    };

    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    var salesGraphChart = new Chart(salesGraphChartCanvas, {
      // lgtm[js/unused-local-variable]
      type: "line",
      data: salesGraphChartData,
      options: salesGraphChartOptions,
    });
  </script>

</div>
<!-- /.card -->