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
            <!-- <tr>
              <td>1</td>
              <td>01548</td>
              <td>Juan Villegas</td>
              <td>Administrador</td>
              <td>Efectivo</td>
              <td>MX$ 1,498.00</td>
              <td>MX$ 4,407.00</td>
              <td>2021-10-08 15:18:40</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-success">
                    <i class="fas fa-file-invoice-dollar"></i>
                  </button>
                  <button class="btn btn-info">
                    <i class="fas fa-print"></i>
                  </button>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCategoria">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>01548</td>
              <td>Juan Villegas</td>
              <td>Administrador</td>
              <td>Efectivo</td>
              <td>MX$ 1,498.00</td>
              <td>MX$ 4,407.00</td>
              <td>2021-10-08 15:18:40</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-success">
                    <i class="fas fa-file-invoice-dollar"></i>
                  </button>
                  <button class="btn btn-info">
                    <i class="fas fa-print"></i>
                  </button>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCategoria">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>01548</td>
              <td>Juan Villegas</td>
              <td>Administrador</td>
              <td>Efectivo</td>
              <td>MX$ 1,498.00</td>
              <td>MX$ 4,407.00</td>
              <td>2021-10-08 15:18:40</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-success">
                    <i class="fas fa-file-invoice-dollar"></i>
                  </button>
                  <button class="btn btn-info">
                    <i class="fas fa-print"></i>
                  </button>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCategoria">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>01548</td>
              <td>Juan Villegas</td>
              <td>Administrador</td>
              <td>Efectivo</td>
              <td>MX$ 1,498.00</td>
              <td>MX$ 4,407.00</td>
              <td>2021-10-08 15:18:40</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-success">
                    <i class="fas fa-file-invoice-dollar"></i>
                  </button>
                  <button class="btn btn-info">
                    <i class="fas fa-print"></i>
                  </button>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCategoria">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr> -->
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