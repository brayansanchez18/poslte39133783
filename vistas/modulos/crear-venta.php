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
                  <input type="text" class="form-control input-lg" placeholder="Nombre" readonly="readonly" value="Jazmin Montserrath Santiago Jilote" required />
                </div>

                <!-- ------------------------ CODIGO DE LA VENTA ------------------------ -->
                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-barcode"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control input-lg" placeholder="1005" readonly="readonly" required />
                </div>

                <!-- ------------------------ ENTRADA DEL CLIENTE ----------------------- -->

                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-user-tag"></i>
                    </span>
                  </div>
                  <select class="form-control" required>
                    <option value="">Seleccionar cliente</option>
                  </select>
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    </span>
                  </div>
                </div>

                <!-- ------------------ ENTRADA PARA AGREGAR PRODUCTO ----------------- -->

                <div class="form-group row nuevoProducto">

                  <!-- Descripción del producto -->

                  <div class="col-12 col-xl-6" style="padding-right:0px">
                    <div class="input-group mt-2 mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <button type="button" class="btn btn-danger btn-xs">
                            <i class="fa fa-times"></i>
                          </button>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>
                    </div>
                  </div>

                  <!-- Cantidad del producto -->

                  <div class="col-6 col-xl-3">
                    <div class="input-group mt-2 mb-2">
                      <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>
                    </div>
                  </div>

                  <!-- Precio del producto -->

                  <div class="col-6 col-xl-3" style="padding-left:0px">
                    <div class="input-group mt-2 mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-dollar-sign"></i>
                        </span>
                      </div>
                      <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="0.00" readonly required>
                    </div>
                  </div>
                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- -------------------- BOTÓN PARA AGREGAR PRODUCTO ------------------- -->

                <button type="button" class="btn btn-default d-md-none d-xs-block d-sm-block btnAgregarProducto">
                  Agregar producto
                </button>

                <hr>

                <div class="row justify-content-xl-end">

                  <!-- --------------------- ENTRADA IMPUESTOS Y TOTAL -------------------- -->

                  <div class="col-12 col-xl-8">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td style="width: 50%">
                            <div class="input-group mt-2 mb-2">
                              <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
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
                  <div class="col-5 mr-auto" style="padding-right:0px">
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

                  <div class="col-3" style="padding-left:0px">
                    <div class="input-group mt-2 mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-dollar-sign"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="0.00" required>
                    </div>
                  </div>

                  <div class="col-3" style="padding-left:0px">
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
            <table id="tables" class="table table-bordered table-striped dt-responsive tabla" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Stock</th>
                  <th>Precio de venta</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <img src="https://pos.tutorialesatualcance.com/vistas/img/productos/517/746.jpg" width="40px" alt="">
                  </td>
                  <td>515</td>
                  <td>Equipos para construcción</td>
                  <td>
                    <button class="btn btn-warning">15</button>
                  </td>
                  <td>MX$ 2,000.00</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info">
                        Agregar
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <img src="https://pos.tutorialesatualcance.com/vistas/img/productos/516/228.jpg" width="40px" alt="">
                  </td>
                  <td>516</td>
                  <td>Equipos para construcción</td>
                  <td>
                    <button class="btn btn-success">23</button>
                  </td>
                  <td>MX$ 2,000.00</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info">
                        Agregar
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <img src="https://pos.tutorialesatualcance.com/vistas/img/productos/515/174.jpg" width="40px" alt="">
                  </td>
                  <td>515</td>
                  <td>Equipos para construcción</td>
                  <td>
                    <button class="btn btn-danger">15</button>
                  </td>
                  <td>MX$ 2,000.00</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info">
                        Agregar
                      </button>
                    </div>
                  </td>
                </tr>
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