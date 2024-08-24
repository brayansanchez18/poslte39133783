<?php
$item = null;
$valor = null;
$orden = 'id';
$ventas = ControladorVentas::ctrSumaTotalVentas();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);
?>
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3>$<?= number_format($ventas['total'], 2) ?></h3>
      <p>Ventas</p>
    </div>
    <div class="icon">
      <i class="fas fa-shopping-cart"></i>
    </div>
    <a href="/" class="small-box-footer">Ir a Ventas <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3><?= number_format($totalCategorias) ?></h3>
      <p>Categorias</p>
    </div>
    <div class="icon">
      <i class="fas fa-boxes"></i>
    </div>
    <a href="/categoras" class="small-box-footer">Ir a Categorias <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= number_format($totalProductos) ?></h3>
      <p>Productos</p>
    </div>
    <div class="icon">
      <i class="fas fa-box"></i>
    </div>
    <a href="/productos" class="small-box-footer">Ir a Productos <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3><?= number_format($totalClientes) ?></h3>
      <p>Clientes</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-tag"></i>
    </div>
    <a href="/clientes" class="small-box-footer">Ir a Clientes <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->