<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Venta</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <!-- ------------------------------ EL FORMULARIO ----------------------------- -->

      <div class="col-lg-5 col-xs-12">
        <div class="card card-success card-outline">
          <form role="form" method="post" class="formularioVenta">
            <div class="card-body">
              <div class="box">

                <!-- ------------------------ ENTRADA DE VENDEDOR ----------------------- -->
                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" placeholder="Nombre" readonly="readonly" value="<?= $_SESSION['nombre'] ?>" required />
                  <input type="hidden" name="idVendedor" value="<?= base64_encode($_SESSION['id']) ?>">
                </div>

                <!-- ------------------------ CODIGO DE LA VENTA ------------------------ -->
                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-barcode"></i>
                    </span>
                  </div>
                  <?php
                  $item = null;
                  $valor = null;
                  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                  if (!$ventas) {
                    $codigo = 1;
                  } else {
                    foreach ($ventas as $key => $value) {
                    }

                    $codigo = $value['codigo'] + 1;
                  }

                  ?>
                  <input type="number" class="form-control input-lg" placeholder="<?= $codigo ?>" readonly="readonly" required />
                </div>

                <!-- ------------------------ ENTRADA DEL CLIENTE ----------------------- -->

                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-user-tag"></i>
                    </span>
                  </div>
                  <select class="form-control select2bs4" style="width:auto;">
                    <option>Seleccionar Cliente</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                    ?>

                    <?php foreach ($clientes as $key => $value) : ?>
                      <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    </span>
                  </div>
                </div>

                <!-- ------------------ ENTRADA PARA AGREGAR PRODUCTO ----------------- -->

                <div class="form-group row nuevoProducto">

                  <!-- <div class="row"> -->

                  <!-- Descripción del producto -->

                  <!-- <div class="col-12 col-xl-6" style="padding-right:0px">
                      <div class="input-group mt-2 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <button type="button" class="btn btn-danger btn-xs">
                              <i class="fa fa-times"></i>
                            </button>
                          </span>
                        </div>
                        <select class="form-control select2bs4" style="width:auto;">
                          <option>Seleccionar Cliente</option>
                          <option>Seleccionar Cliente</option>
                          <option>Seleccionar Cliente</option>
                          <option>Seleccionar Cliente</option>
                          <option>Seleccionar Cliente</option>
                          <option>Seleccionar Cliente</option>
                        </select>
                      </div>
                    </div> -->

                  <!-- Cantidad del producto -->

                  <!-- <div class="col-6 col-xl-3">
                      <div class="input-group mt-2 mb-2">
                        <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>
                      </div>
                    </div> -->

                  <!-- Precio del producto -->

                  <!-- <div class="col-6 col-xl-3" style="padding-left:0px">
                      <div class="input-group mt-2 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-dollar-sign"></i>
                          </span>
                        </div>
                        <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="0.00" readonly required>
                      </div>
                    </div>
                  </div> -->

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- -------------------- BOTÓN PARA AGREGAR PRODUCTO ------------------- -->

                <button type="button" class="btn btn-default d-md-none d-xs-block d-sm-block btnAgregarProducto">
                  Agregar producto
                </button>

                <hr>

                <div class="row justify-content-xl-end">
                  <div class="col-12 col-xl-4">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td style="width: 50%">
                          <div class="input-group mt-2 mb-2">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-dollar-sign"></i>
                              </span>
                            </div>
                            <input type="number" class="form-control" min="0" id="subtotalVenta" value="" placeholder="0.00" required readonly>
                          </div>
                        </td>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row justify-content-xl-end">

                  <!-- --------------------- ENTRADA IMPUESTOS Y TOTAL -------------------- -->

                  <div class="col-12 col-xl-8">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>IVA</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td style="width: 50%">
                            <div class="input-group mt-2 mb-2">
                              <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="16" required readonly>
                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto">
                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                  <i class="fas fa-percentage"></i>
                                </span>
                              </div>
                            </div>
                          </td>

                          <td style="width: 50%">
                            <div class="input-group mt-2 mb-2">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                  <i class="fas fa-dollar-sign"></i>
                                </span>
                              </div>
                              <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="0.00" readonly required>
                              <input type="hidden" name="totalVenta" id="totalVenta">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <hr />

                <!-- ---------------------- ENTRADA MÉTODO DE PAGO ---------------------- -->

                <div class="form-group row">
                  <div class="col-12 col-md-5 mr-auto" style="padding-right:0px">
                    <div class="input-group mt-2 mb-2">
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjetaCredito">Tarjeta crédito</option>
                        <option value="tarjetaDebito">Tarjeta débito</option>
                        <option value="tranferencia">Transferencia de fondos</option>
                        <option value="cheque">Cheque nominativo</option>
                      </select>
                    </div>
                  </div>

                  <!-- <div class="col-6" style="padding-left:0px">
                    <div class="input-group mt-2 mb-2">
                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-lock"></i>
                        </span>
                      </div>
                    </div>
                  </div> -->

                  <div class="col-6 col-md-3" style="padding-left:0px">
                    <div class="input-group mt-2 mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-dollar-sign"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="0.00" required>
                    </div>
                  </div>

                  <div class="col-6 col-md-3" style="padding-left:0px">
                    <div class="input-group mt-2 mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-hand-holding-usd"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="0.00" required readonly>
                    </div>
                  </div>
                </div>

                <br>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">
                Guardar
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- -------------------------- LA TABLA DE PRODUCTOS ------------------------- -->

      <div class="d-none d-md-block col-lg-7">
        <div class="card card-warning card-outline">
          <div class="card-body">
            <table id="tablaVentas" class="table table-bordered table-striped dt-responsive tabla" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Stock</th>
                  <th>Precio</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
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