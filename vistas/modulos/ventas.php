<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Ventas</li>
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
        <a href="/crear-venta">
          <button class="btn btn-primary">
            Crear Venta <i class="fas fa-cash-register ml-2"></i>
          </button>
        </a>

        <button type="button" class="btn btn-default float-right" id="daterange-btn">
          <span>
            <i class="far fa-calendar-alt"></i> Ordenar por fechas
          </span>
          <i class="fas fa-caret-down"></i>
        </button>
      </div>
      <div class="card-body">
        <table id="tablaAdministrarVentas" class="table table-bordered table-striped dt-responsive tabla" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Codigo Venta</th>
              <th>Cliente</th>
              <th>Vendedor</th>
              <th>Metodo de Pago</th>
              <th>Referencia</th>
              <th>Subtotal</th>
              <th>Total</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($_GET['fechaInicial'])) {
              $fechaInicial = $_GET["fechaInicial"];
              $fechaFinal = $_GET["fechaFinal"];
            } else {

              $fechaInicial = null;
              $fechaFinal = null;
            }

            $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
            // var_dump($respuesta);
            ?>

            <?php foreach ($respuesta as $key => $value): ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['codigo'] ?></td>

                <?php
                $itemCliente = "id";
                $valorCliente = $value["idCliente"];

                $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                if (is_array($respuestaCliente)) {
                  $cliente = $respuestaCliente["nombre"];
                } else {
                  $cliente = 'Jhon Doe';
                }

                ?>
                <td><?= $cliente ?></td>

                <?php
                $itemUsuario = "id";
                $valorUsuario = $value["idVendedor"];

                $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuario($itemUsuario, $valorUsuario);
                ?>
                <td><?= $respuestaUsuario["nombre"] ?></td>
                <td><?= $value['metodoPago'] ?></td>

                <?php
                if ($value['referencia'] != "") {
                  $ref = $value['referencia'];
                } else {
                  $ref = 'Sin referencia';
                }
                ?>
                <td><?= $ref ?></td>
                <td>MX$ <?= number_format($value["neto"], 2) ?></td>
                <td>MX$ <?= number_format($value["total"], 2) ?></td>
                <td><?= $value['fecha'] ?></td>
                <td>
                  <div class="btn-group">
                    <button
                      class="btn btn-info btnImprimirRecibo"
                      codigoVenta="<?= base64_encode($value['codigo']) ?>">
                      <i
                        class="fas fa-print">
                      </i>
                    </button>
                    <button
                      class="btn btn-warning btnEditarVenta"
                      idVenta="<?= base64_encode($value['id']) ?>">
                      <i
                        class="fa fa-edit">
                      </i>
                    </button>
                    <button
                      class="btn btn-danger btnEliminarVenta"
                      idVenta="<?= base64_encode($value['id']) ?>">
                      <i
                        class="fas fa-trash-alt">
                      </i>
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$eliminarVenta = new ControladorVentas();
$eliminarVenta->ctrEliminarVenta();
?>