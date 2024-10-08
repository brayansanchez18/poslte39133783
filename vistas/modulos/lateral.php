<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="vistas/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">POS39133783</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if ($_SESSION['foto'] != '') : ?>
          <img src="<?= $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="User Image">
        <?php else: ?>
          <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle elevation-2" alt="User Image">
        <?php endif ?>
      </div>
      <div class="info">
        <a href="/usuarios" class="d-block"><?= $_SESSION['nombre'] ?></a>
        <a href="/salir" class="btn btn-block btn-danger btn-sm mt-1">Salir</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/usuarios" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>Usuarios</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/categorias" class="nav-link">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Categorias</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/productos" class="nav-link">
            <i class="nav-icon fas fa-box"></i>
            <p>Productos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/clientes" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Clientes</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/ventas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Administrar Ventas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/crear-venta" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear Ventas</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/reportes" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Reportes de Ventas</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>