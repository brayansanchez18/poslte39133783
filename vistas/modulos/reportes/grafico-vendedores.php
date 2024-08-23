<?php

$item = null;
$valor = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
$usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

$arrayVendedores = [];
$arraylistaVendedores = [];

foreach ($ventas as $key => $valueVentas) {
  foreach ($usuarios as $key => $valueUsuarios) {
    if ($valueUsuarios['id'] == $valueVentas['idVendedor']) {
      #Capturamos los vendedores en un array
      array_push($arrayVendedores, $valueUsuarios['nombre']);

      #Capturamos las nombres y los valores netos en un mismo array
      $arraylistaVendedores = array($valueUsuarios['nombre'] => $valueVentas['neto']);

      #Sumamos los netos de cada vendedor
      foreach ($arraylistaVendedores as $key => $value) {
        $sumaTotalVendedores[$key] += $value;
      }
    }
  }
}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayVendedores);

?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Vendedores</h3>
  </div>

  <div class="card-body">
    <div class="chart">
      <!-- <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
      <canvas id="barChart" width="800" height="540"></canvas>
    </div>
  </div>

  <script>
    // Bar chart
    new Chart(document.getElementById("barChart"), {
      type: 'bar',
      data: {
        labels: [
          <?php foreach ($noRepetirNombres as $value) : ?> '<?= $value ?>',
          <?php endforeach ?>
        ],
        datasets: [{
          label: "Vendido $",
          backgroundColor: [
            <?php foreach ($noRepetirNombres as $value) : ?> '#3e95cd',
            <?php endforeach ?>
          ],
          data: [
            <?php foreach ($noRepetirNombres as $value) : ?> '<?= $sumaTotalVendedores[$value] ?>',
            <?php endforeach ?>
          ]
        }]
      },
      options: {
        legend: {
          display: false
        }
      }
    });
  </script>
</div>