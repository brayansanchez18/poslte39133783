<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Editar Venta</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <?php

      $item = 'id';
      $valor = base64_decode($_GET['idVenta']);
      $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);


      $itemUsuario = 'id';
      $valorUsuario = $ventas['idVendedor'];
      $vendedor = ControladorUsuarios::ctrMostrarUsuario($itemUsuario, $valorUsuario);

      $itemCliente = 'id';
      $valorCliente = $ventas['idCliente'];
      $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

      if (!is_array($cliente)) {
        $cliente = [
          'id' => 0,
          'nombre' => 'John Doe'
        ];
      }

      $porcentajeImpuesto = $ventas['impuesto'] * 100 / $ventas['neto'];
      ?>

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
                  <input type="text" class="form-control input-lg" placeholder="Nombre" readonly="readonly" value="<?= $vendedor['nombre'] ?>" required />
                  <input type="hidden" name="idVendedor" value="<?= base64_encode($vendedor['id']) ?>">
                </div>

                <!-- ------------------------ CODIGO DE LA VENTA ------------------------ -->
                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-barcode"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control input-lg" id="nuevaVenta" name="editarVenta" value="<?= $ventas['codigo'] ?>" readonly="readonly" required />
                </div>

                <!-- ------------------------ ENTRADA DEL CLIENTE ----------------------- -->

                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-user-tag"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control input-lg" id="seleccionarCliente" value="<?= $cliente['nombre'] ?>" readonly="readonly" required />
                  <input type="hidden" name="seleccionarCliente" value="<?= base64_decode($cliente['id']) ?>">
                </div>

                <!-- ------------------ ENTRADA PARA AGREGAR PRODUCTO ----------------- -->

                <div class="form-group row nuevoProducto">

                  <?php
                  $listaProductos = json_decode($ventas['productos'], true)
                  ?>

                  <?php foreach ($listaProductos as $key => $value): ?>
                    <?php
                    $item = 'id';
                    $valor = base64_decode($value['id']);

                    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
                    $stockAntiguo = $respuesta['stock'] + $value['cantidad'];
                    ?>
                    <!-- Descripción del producto -->
                    <!-- TODO: ARRGLAR EL EDITAR VENTA EN DISPOSITIVOS MOVILES -->
                    <div class="row">
                      <div class="col-12 col-xl-6" style="padding-right:0px">
                        <div class="input-group mt-2 mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                              <button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="<?= base64_encode($value['id']) ?>">
                                <i class="fa fa-times"></i>
                              </button>
                            </span>
                          </div>
                          <input type="text" class="form-control nuevaDescripcionProducto" id="agregarProducto" name="agregarProducto" idProducto="<?= $value['id'] ?>" value="<?= $value['descripcion'] ?>" readonly required>
                        </div>
                      </div>

                      <!-- Cantidad del producto -->
                      <div class="col-6 col-xl-3">
                        <div class="input-group mt-2 mb-2">
                          <input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="<?= $value['cantidad'] ?>" stock="<?= $stockAntiguo ?>" nuevoStock="<?= $value['stock'] ?>" required>
                        </div>
                      </div>

                      <!-- Precio del producto -->
                      <div class="col-6 col-xl-3 ingresoPrecio" style="padding-left:0px">
                        <div class="input-group mt-2 mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control nuevoPrecioProducto" precioReal="<?= $respuesta['precioVenta'] ?>" id="nuevoPrecioProducto" name="nuevoPrecioProducto" value="<?= $value['total'] ?>" readonly required>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>

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
                            <input type="text" class="form-control itotal" min="0" id="subtotalVenta" value="<?= $ventas['neto'] ?>" required readonly>
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
                              <input type="number" class="form-control" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?= $porcentajeImpuesto ?>" required readonly>
                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" value="<?= $ventas['impuesto'] ?>">
                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" value="<?= $ventas['neto'] ?>">
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
                              <input type="text" class="form-control itotal" id="nuevoTotalVenta" name="nuevoTotalVenta" value="<?= $ventas['total'] ?>" readonly required>
                              <input type="hidden" name="totalVenta" id="totalVenta" value="<?= $ventas['total'] ?>">
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
                      <select class="form-control" id="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta Credito">Tarjeta crédito</option>
                        <option value="Tarjeta Debito">Tarjeta débito</option>
                        <option value="Transferencia Electronica">Transferencia de fondos</option>
                        <option value="Cheque">Cheque nominativo</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-12 col-md-6 d-flex cajasMetodoPago">
                    <!-- <div class="col-12" style="padding-left:0px">
                      <div class="input-group mt-2 mb-2">
                        <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-lock"></i>
                          </span>
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="col-6" style="padding-left:0px">
                      <div class="input-group mt-2 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-dollar-sign"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="0.00" required>
                      </div>
                    </div>

                    <div class="col-6" id="capturarCambioEfectivo" style="padding-left:0px">
                      <div class="input-group mt-2 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-hand-holding-usd"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="0.00" required readonly>
                      </div>
                    </div> -->
                  </div>

                  <input type="hidden" id="metodoPago" name="metodoPago">
                  <input type="hidden" id="codigoPago" name="codigoPago">


                </div>

                <br>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">
                Editar Venta
              </button>
            </div>
          </form>
          <?php
          $editarVenta = new ControladorVentas();
          $editarVenta->ctrEditarVenta();
          ?>
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