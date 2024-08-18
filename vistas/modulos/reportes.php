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

        <button type="button" class="btn btn-success float-right">
          <span>
            Descargar reporte en Excel <i class="fas fa-file-excel ml-2"></i>
          </span>
        </button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
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
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-6">
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
                      <li><i class="far fa-circle text-danger"></i> Chrome</li>
                      <li><i class="far fa-circle text-success"></i> IE</li>
                      <li><i class="far fa-circle text-warning"></i> FireFox</li>
                      <li><i class="far fa-circle text-info"></i> Safari</li>
                      <li><i class="far fa-circle text-primary"></i> Opera</li>
                      <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      United States of America
                      <span class="float-right text-danger">
                        <i class="fas fa-arrow-down text-sm"></i>
                        12%</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      India
                      <span class="float-right text-success">
                        <i class="fas fa-arrow-up text-sm"></i> 4%
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      China
                      <span class="float-right text-warning">
                        <i class="fas fa-arrow-left text-sm"></i> 0%
                      </span>
                    </a>
                  </li>
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
                  'Chrome',
                  'IE',
                  'FireFox',
                  'Safari',
                  'Opera',
                  'Navigator'
                ],
                datasets: [{
                  data: [700, 500, 400, 600, 300, 100],
                  backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
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
          </div>

          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendedores</h3>
              </div>

              <div class="card-body">
                <div class="chart">
                  <!-- <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                  <canvas id="barChart" width="800" height="370"></canvas>
                </div>
              </div>

              <script>
                // Bar chart
                new Chart(document.getElementById("barChart"), {
                  type: 'bar',
                  data: {
                    labels: ["Brayan Sánchez", "Jazmin Santiago Jilote", "Sandra Gomez"],
                    datasets: [{
                      label: "Vendido $",
                      backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd"],
                      data: [2478, 5267, 734, 784, 433]
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
          </div>

        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendedores</h3>
              </div>

              <div class="card-body">
                <div class="chart">
                  <!-- <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                  <canvas id="barChart2" width="800" height="250"></canvas>
                </div>
              </div>

              <script>
                // Bar chart
                new Chart(document.getElementById("barChart2"), {
                  type: 'bar',
                  data: {
                    labels: [
                      "Juan Villegas",
                      "Pedro Pérez",
                      "Pedro Pérez",
                      "Margarita Londoño",
                      "Julian Ramirez",
                      "Stella Jaramillo",
                      "Eduardo López",
                      "Ximena Restrepo",
                      "David Guzman",
                      "Gonzalo Pérez"
                    ],
                    datasets: [{
                      label: "Venta $",
                      backgroundColor: [
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a",
                        "#f6a"
                      ],
                      data: [
                        2478,
                        5267,
                        734,
                        784,
                        433,
                        2478,
                        5267,
                        734,
                        784,
                        433
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