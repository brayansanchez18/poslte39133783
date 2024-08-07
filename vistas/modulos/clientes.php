<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Clientes</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          Agregar Cliente <i class="ml-2 fas fa-user-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <table id="tablaClientes" class="table table-bordered table-striped dt-responsive tabla" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Direccion</th>
              <th>Total Compras</th>
              <th>Ultima Compra</th>
              <th>Fecha de Registro</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>1</td>
              <td>Gonzalo Pérez</td>
              <td>gonzalo@yahoo.com</td>
              <td>722-222-2222</td>
              <td>Carrera 34 # 56 - 34</td>
              <td>30</td>
              <td>2024-02-06 17:47:02</td>
              <td>2018-02-06 16:47:02</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCliente">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Pedro Pérez</td>
              <td>pedro@yahoo.com</td>
              <td>722-222-2222</td>
              <td>Carrera 34 # 56 - 34</td>
              <td>34</td>
              <td>2024-02-06 17:47:02</td>
              <td>2018-02-06 16:47:02</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarClientea">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Stella Jaramillo</td>
              <td>stella@yahoo.com</td>
              <td>722-222-2222</td>
              <td>Carrera 34 # 56 - 34</td>
              <td>34</td>
              <td>2024-02-06 17:47:02</td>
              <td>2018-02-06 16:47:02</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCliente">
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

<!-- -------------------------------------------------------------------------- */
/*                            MODAL AGREGAR CLIENTE                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Agregar Cliente
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
            <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-mobile-alt"></i>
              </span>
            </div>

            <input type="text" id="numeroCliente" name="nuevoTelefono" class="numeroCliente form-control input-lg" placeholder="Ingresar teléfono" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-map-marker-alt"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Crear Cliente
          </button>
        </div>

        <?php
        $crearCliente = new ControladorClientes;
        $crearCliente->ctrCrearCliente();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL AGREGAR CATEGORIA ---------------------- -->

<!-- -------------------------------------------------------------------------- */
/*                            MODAL EDITAR CLIENTE                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Agregar Cliente
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required />
            <input type="hidden" id="idCliente" name="idCliente">
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
            <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-mobile-alt"></i>
              </span>
            </div>

            <input type="text" id="editarTelefono" name="editarTelefono" class="numeroCliente form-control input-lg" placeholder="Ingresar teléfono" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-map-marker-alt"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Editar Cliente
          </button>
        </div>

        <?php
        $editarCliente = new ControladorClientes();
        $editarCliente->ctrEditarCliente();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL EDITAR CLIENTE ---------------------- -->

<?php
$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();
?>