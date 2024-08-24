<?php

require_once '../../../controladores/ventas.controlador.php';
require_once '../../../modelos/ventas.modelo.php';

require_once '../../../controladores/cliente.controlador.php';
require_once '../../../modelos/clientes.modelo.php';

require_once '../../../controladores/usuarios.controlador.php';
require_once '../../../modelos/usuarios.modelo.php';

require_once '../../../controladores/productos.controlador.php';
require_once '../../../modelos/productos.modelo.php';

class imprimirFactura
{

	public $codigo;

	public function traerImpresionFactura()
	{

		//TRAEMOS LA INFORMACIÓN DE LA VENTA

		$itemVenta = 'codigo';
		$valorVenta = $this->codigo;

		$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

		$fecha = substr($respuestaVenta['fecha'], 0, -8);
		$productos = json_decode($respuestaVenta['productos'], true);
		$neto = number_format($respuestaVenta['neto'], 2);
		$impuesto = number_format($respuestaVenta['impuesto'], 2);
		$total = number_format($respuestaVenta['total'], 2);

		//TRAEMOS LA INFORMACIÓN DEL CLIENTE

		$itemCliente = 'id';
		$valorCliente = $respuestaVenta['idCliente'];

		$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

		if (is_array($respuestaCliente)) {
			$cliente = $respuestaCliente['nombre'];
		} else {
			$cliente = '';
		}


		//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

		$itemVendedor = 'id';
		$valorVendedor = $respuestaVenta['idVendedor'];

		$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuario($itemVendedor, $valorVendedor);

		//REQUERIMOS LA CLASE TCPDF

		require_once('tcpdf_include.php');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->startPageGroup();

		$pdf->AddPage();

		// ---------------------------------------------------------

		$bloque1 = <<<EOF

	<table>
		<tr>
			<td style="background-color:white; width:150px;"><img src="images/logo_example.png" style="width:50px"></td>
			<td style="background-color:white; width:140px">
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					<br>
					RFC: XAXX010101000
					<br>
					Dirección: Calle 722 22-22
				</div>
			</td>

			<td style="background-color:white; width:140px">
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					<br>
					Teléfono: 722-222-2222
					<br>
					ventas@nemstudios.com
				</div>
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>N. VENTA<br>$valorVenta</td>
		</tr>
	</table>

EOF;

		$pdf->writeHTML($bloque1, false, false, false, false, '');

		// ---------------------------------------------------------

		$bloque2 = <<<EOF

	<table>
		<tr>
			<td style="width:540px"><img src="images/back.jpg"></td>
		</tr>
	</table>

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:390px">
				Cliente: $cliente
			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
				Fecha: $fecha
			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $respuestaVendedor[nombre]</td>
		</tr>

		<tr>
			<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>
		</tr>
	</table>

EOF;

		$pdf->writeHTML($bloque2, false, false, false, false, '');

		// ---------------------------------------------------------

		$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:260px; text-align:center">Producto</td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:80px; text-align:center">Cantidad</td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:100px; text-align:center">Valor Unit.</td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:100px; text-align:center">Valor Total</td>
		</tr>
	</table>

EOF;

		$pdf->writeHTML($bloque3, false, false, false, false, '');

		// ---------------------------------------------------------

		foreach ($productos as $key => $item) {

			$itemProducto = 'descripcion';
			$valorProducto = $item['descripcion'];
			$orden = null;

			$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

			if ($respuestaProducto) {
				$valorUnitario = number_format($respuestaProducto['precioVenta'], 2);
			} else {
				$valorUnitario = 0;
			}


			$precioTotal = number_format($item['total'], 2);

			$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center">
				$item[descripcion]
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$item[cantidad]
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$valorUnitario
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$precioTotal
			</td>
		</tr>
	</table>


EOF;

			$pdf->writeHTML($bloque4, false, false, false, false, '');
		}

		// ---------------------------------------------------------

		$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666;  background-color:#d4d4d4; width:100px; text-align:center">
				Neto:
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $neto
			</td>
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:100px; text-align:center">
				Impuesto:
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $impuesto
			</td>
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:100px; text-align:center">
				Total:
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $total
			</td>
		</tr>

		<tr>
			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:100px; text-align:center">
				Forma de pago:
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$respuestaVenta[metodoPago]
			</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:#d4d4d4; width:100px; text-align:center">
				Referencia:
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$respuestaVenta[referencia]
			</td>
		</tr>
	</table>

EOF;

		$pdf->writeHTML($bloque5, false, false, false, false, '');



		// ---------------------------------------------------------
		//SALIDA DEL ARCHIVO

		$pdf->Output('venta' . $valorVenta . '.pdf', 'D');
	}
}

$factura = new imprimirFactura();
$factura->codigo = base64_decode($_GET['codigo']);
$factura->traerImpresionFactura();
