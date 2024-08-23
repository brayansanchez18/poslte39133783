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