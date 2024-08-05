<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Productos</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar Productos <i class="ml-2 fas fa-user-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <table id="tablaProductos" class="table table-bordered table-striped dt-responsive tabla" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Imagen</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Categoría</th>
              <th>Stock</th>
              <th>Precio de compra</th>
              <th>Precio de venta</th>
              <th>Agregado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>1</td>
              <td>
                <img src="https://pos.tutorialesatualcance.com/vistas/img/productos/517/746.jpg" width="40px" alt="">
              </td>
              <td>515</td>
              <td>Cortadora de Baldosin</td>
              <td>Equipos para construcción</td>
              <td>
                <button class="btn btn-warning">15</button>
              </td>
              <td>MX$ 1,252.00</td>
              <td>MX$ 2,000.00</td>
              <td>24-06-2024 12:12:12</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarProducto">
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
              <td>
                <img src="https://pos.tutorialesatualcance.com/vistas/img/productos/516/228.jpg" width="40px" alt="">
              </td>
              <td>516</td>
              <td>Cono slump</td>
              <td>Equipos para construcción</td>
              <td>
                <button class="btn btn-success">23</button>
              </td>
              <td>MX$ 1,252.00</td>
              <td>MX$ 2,000.00</td>
              <td>24-06-2024 12:12:12</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarProducto">
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
              <td>
                <img src="https://pos.tutorialesatualcance.com/vistas/img/productos/515/174.jpg" width="40px" alt="">
              </td>
              <td>515</td>
              <td>Coche llanta neumatica</td>
              <td>Equipos para construcción</td>
              <td>
                <button class="btn btn-danger">15</button>
              </td>
              <td>MX$ 1,252.00</td>
              <td>MX$ 2,000.00</td>
              <td>24-06-2024 12:12:12</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarProducto">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody> -->
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
/*                            MODAL AGREGAR PRODUCTO                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Agregar Producto
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
            <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria">
              <option value="">Seleccionar Categoria</option>
              <?php
              $item = null;
              $valor = null;
              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
              ?>
              <?php foreach ($categorias as $key => $value) : ?>
                <option value="<?= base64_encode($value['id']) ?>"><?= $value['categoria'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-hashtag"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Codigo Producto" readonly required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-info-circle"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-cubes"></i>
              </span>
            </div>
            <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
          </div>

          <div class="row">
            <div class="input-group mt-2 mb-2 col-12 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-dollar-sign"></i>
                </span>
              </div>
              <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>
            </div>

            <div class="input-group mt-2 mb-2 col-12 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-tags"></i>
                </span>
              </div>
              <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>
            </div>

            <br>

            <!-- CHECKBOX PARA PORCENTAJE -->
            <div class="col-12 col-md-6 d-flex float-righ ml-auto">
              <div class="input-group mt-2 mb-2 col-6">
                <div class="icheck-primary d-inline">
                  <input type="checkbox" id="porcentaje" class="porcentaje" checked>
                  <label for="porcentaje">Utilizar Procentaje</label>
                </div>
              </div>

              <!-- ENTRADA PARA PORCENTAJE -->

              <div class="input-group mt-2 mb-2 col-6" style="padding:0">
                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-percentage"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-2 mt-3">
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="150px" />
          </div>

          <div class="mb-2">
            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="form-control input-lg nuevaImagen" name="nuevaImagen" />
            <p class="help-block">Peso máximo del documento 4MB</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Crear Producto
          </button>
        </div>
        <?php
        $crearProducto = new ControladorProductos();
        $crearProducto->ctrCrearProducto();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL AGREGAR PRODUCTO ---------------------- -->

<!-- -------------------------------------------------------------------------- */
/*                            MODAL EDITAR PRODUCTO                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Agregar Producto
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
            <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria">
              <option value="">Seleccionar Categoria</option>
              <option value="1">Equipos Electromecánicos</option>
              <option value="2">Taladros</option>
              <option value="3">Andamios</option>
              <option value="4">Generadores de energía</option>
              <option value="5">Equipos para construcción</option>
              <option value="6">Martillos mecánicos</option>
            </select>
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-hashtag"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-info-circle"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-cubes"></i>
              </span>
            </div>
            <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
          </div>

          <div class="row">
            <div class="input-group mt-2 mb-2 col-12 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-dollar-sign"></i>
                </span>
              </div>
              <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>
            </div>

            <div class="input-group mt-2 mb-2 col-12 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-tags"></i>
                </span>
              </div>
              <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>
            </div>

            <br>

            <!-- CHECKBOX PARA PORCENTAJE -->
            <div class="col-12 col-md-6 d-flex float-righ ml-auto">
              <div class="input-group mt-2 mb-2 col-6">
                <div class="checkbox icheck-belizehole">
                  <input type="checkbox" checked id="porcentaje" class="porcentaje" />
                  <label for="porcentaje">Utilizar Porcentaje</label>
                </div>
              </div>

              <!-- ENTRADA PARA PORCENTAJE -->

              <div class="input-group mt-2 mb-2 col-6" style="padding:0">
                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-percentage"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-2">
            <img src="vistas/dist/img/avatar3.png" class="img-thumbnail previsualizar" width="200px" />
          </div>

          <div class="mb-2">
            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="form-control input-lg nuevaFoto" name="nuevaFoto" />
            <p class="help-block">Peso máximo del documento 4MB</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Crear Producto
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL EDITAR PRODUCTO ---------------------- -->