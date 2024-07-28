<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Categorias</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Categorias</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          Agregar Categoria <i class="ml-2 fas fa-user-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <table id="tables" class="table table-bordered table-striped dt-responsive tabla" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Codigo Venta</th>
              <th>Cliente</th>
              <th>Vendedor</th>
              <th>Forma de Pago</th>
              <th>Subtotal</th>
              <th>Total</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
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

<!-- -------------------------------------------------------------------------- */
/*                            MODAL AGREGAR CATEGORIA                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Agregar Categoria
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-boxes"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Nombre Categoria" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Crear Categoria
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL AGREGAR CATEGORIA ---------------------- -->

<!-- -------------------------------------------------------------------------- */
/*                            MODAL EDITAR CATEGORIA                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Editar Categoria
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-boxes"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Nombre Categoria" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Editar Categoria
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL EDITAR CATEGORIA ---------------------- -->