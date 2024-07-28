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
        "2023 09",
        "2023 10",
        "2023 11",
        "2023 12",
        "2024 01",
        "2024 02",
        "2024 03",
        "2024 04",
        "2024 05",
        "2024 06",
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
          2666, 2778, 4912, 3767, 6810, 5670, 35000, 15073, 10687,
          8432,
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