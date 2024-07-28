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
      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-5 col-xs-12">
        <div class="card card-success card-outline">
          <form role="form" method="post" class="formularioVenta">
            <div class="card-body">
              <div class="box">
                <!-- ------------------------- NOMBRE PRESTATARIO -------------------------- -->
                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" placeholder="Nombre" readonly="readonly" value="Jazmin Montserrath Santiago Jilote" required />
                </div>

                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-barcode"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control input-lg" placeholder="1005" readonly="readonly" required />
                </div>

                <div class="input-group mt-2 mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-user-tag"></i>
                    </span>
                  </div>
                  <select class="form-control" required>
                    <option value="">Seleccionar cliente</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="TC">Tarjeta Crédito</option>
                    <option value="TD">Tarjeta Débito</option>
                    <option value="TRA">Trasferencia</option>
                  </select>
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    </span>
                  </div>
                </div>


                <div class="row">
                  <div class="col-4">
                    <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                      <option value="">Seleccione método de pago</option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="TC">Tarjeta Crédito</option>
                      <option value="TD">Tarjeta Débito</option>
                      <option value="TRA">Trasferencia</option>
                    </select>
                  </div>
                </div>

                <hr />
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">
                Cobrar
              </button>
            </div>
          </form>
        </div>
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
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