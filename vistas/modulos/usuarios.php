<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Usuarios</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario <i class="ml-2 fas fa-user-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <table id="tables" class="table table-bordered table-striped dt-responsive tabla" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo Ingreso</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Brayan Emanuel Sanchez Ramirez</td>
              <td>emanuel@correo.com</td>
              <td>
                <img class="img-circle" src="vistas/dist/img/avatar.png" width="60px" />
              </td>
              <td>Administrador</td>
              <td>
                <button class="btn btn-xs btn-danger">Activo</button>
              </td>
              <td>24-06-2024 12:12:12</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarUsuario">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jazmin Montserrath Santiago Jilote</td>
              <td>jazmin@correo.com</td>
              <td>
                <img class="img-circle" src="vistas/dist/img/avatar3.png" width="60px" />
              </td>
              <td>Editor</td>
              <td>
                <button class="btn btn-xs btn-success">Inactivo</button>
              </td>
              <td>24-06-2024 12:12:12</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarUsuario">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-danger">
                    <i class="fa fa-times"></i>
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
/*                            MODAL AGREGAR USUARIO                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Agregar Usuario
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-envelope"></i>
              </span>
            </div>
            <input type="email" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Correo Electronico" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-lock"></i>
              </span>
            </div>
            <select class="form-control input-lg" name="nuevoPerfil">
              <option value="">Perfil</option>
              <option value="metepec">Administrador</option>
              <option value="metepec">Especial</option>
              <option value="metepec">Vendedor</option>
            </select>
          </div>

          <div class="mb-2">
            <div class="panel">SUBIR FOTO</div>
            <input type="file" class="form-control input-lg nuevaFoto custom-file-input" id="customFile" name="nuevaFoto" />
            <p class="help-block">Peso máximo de la foto 4MB</p>
            <img src="vistas/dist/img/avatar3.png" class="img-thumbnail previsualizar" width="200px" />
          </div>

          <div class="mb-2">
            <div class="panel">SUBIR DOCUMENTOS</div>
            <input type="file" class="form-control input-lg nuevaFoto" name="nuevaFoto" />
            <p class="help-block">Peso máximo del documento 4MB</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Crear Usuario
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL AGREGAR PRESTATARIO ---------------------- -->

<!-- -------------------------------------------------------------------------- */
/*                            MODAL EDITAR PRESTATARIO                            */
/* -------------------------------------------------------------------------- -->

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Editar Usuario
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user"></i>
              </span>
            </div>
            <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-envelope"></i>
              </span>
            </div>
            <input type="email" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Correo Electronico" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required />
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-lock"></i>
              </span>
            </div>
            <select class="form-control input-lg" name="nuevoPerfil">
              <option value="">Perfil</option>
              <option value="metepec">Administrador</option>
              <option value="metepec">Especial</option>
              <option value="metepec">Vendedor</option>
            </select>
          </div>

          <div class="mb-2">
            <div class="panel">SUBIR FOTO</div>
            <input type="file" class="form-control input-lg nuevaFoto custom-file-input" id="customFile" name="nuevaFoto" />
            <p class="help-block">Peso máximo de la foto 4MB</p>
            <img src="vistas/dist/img/avatar3.png" class="img-thumbnail previsualizar" width="200px" />
          </div>

          <div class="mb-2">
            <div class="panel">SUBIR DOCUMENTOS</div>
            <input type="file" class="form-control input-lg nuevaFoto" name="nuevaFoto" />
            <p class="help-block">Peso máximo del documento 4MB</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            Editar Usuario
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ----------------------- End of MODAL EDITAR PRESTATARIO ---------------------- -->