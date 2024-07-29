<?php

/* -------------------------------------------------------------------------- */
/*                                CONTROLADORES                               */
/* -------------------------------------------------------------------------- */

require_once 'controladores/categorias.controlador.php';
require_once 'controladores/cliente.controlador.php';
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/productos.controlador.php';
require_once 'controladores/usuarios.controlador.php';
require_once 'controladores/ventas.controlador.php';

/* ------------------------------ CONTROLADORES ----------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   MODELOS                                  */
/* -------------------------------------------------------------------------- */

require_once 'modelos/categorias.modelo.php';
require_once 'modelos/clientes.modelo.php';
require_once 'modelos/productos.modelo.php';
require_once 'modelos/usuarios.modelo.php';
require_once 'modelos/ventas.modelo.php';

/* --------------------------------- MODELOS -------------------------------- */

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
