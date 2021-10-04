<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

	<?php
	include_once('capa_negocio/clsPlanPago.php');
	?>

	<b> BUSCAR PLAN DE PAGO </b>
	<form id="form1" name="form1" method="post" action="frmBuscarPlanPago.php">
		<table width="700" border="0">
			<tr>
				<td>
					<input name="txtBuscar" type="text" />
				</td>
			</tr>
			<tr>
				<td>
					<input name="seleccion" type="radio" value="Fecha" <?php if ($_POST['seleccion'] == "Fecha") echo "checked"; ?> /> Fecha
					<input name="seleccion" type="radio" value="MontoTotal" <?php if ($_POST['seleccion'] == "MontoTotal") echo "checked"; ?> /> Monto Total
					<input name="seleccion" type="radio" value="Plazo" <?php if ($_POST['seleccion'] == "Plazo") echo "checked"; ?> /> Plazo
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="botones" value="Buscar" />
					<input type="submit" name="botones" value="Mostrar Datos" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="botones" value="Volver">
				</td>
			</tr>
		</table>
	</form>


	<?php
	$obj = new PlanPago();



	function mostrar($aux)
	{
		echo "<table border=1 >";
		echo "<tr>
				<td> Código </td>
				<td> Fecha </td>
				<td> Monto Total </td>
				<td> Plazo </td>
				<td> * </td>
			</tr>";
		while ($reg = mysqli_fetch_object($aux)) {
			echo "<tr>
					<td>$reg->id_plan</td>
					<td>$reg->fecha</td>
					<td>$reg->montoTotal</td>
					<td>$reg->plazo</td>
					<td>
						<a href='
							frmCuota.php?
							id_plan=$reg->id_plan
						'>
						Add
					</td>
				</tr>";
		}
		echo "</table>";
	}

	function volver()
	{
		header("Location: http://localhost/practica1/frmCuota.php?");
	}


	//programa principal
	switch ($_POST['botones']) {
		case "Buscar": {
				if ($_POST['seleccion'] == 'Fecha') {
					$obj->setFecha($_POST['txtBuscar']);
					$aux = $obj->buscarFecha();
					mostrar($aux);
				} elseif ($_POST['seleccion'] == 'MontoTotal') {
					$obj->setMontoTotal($_POST['txtBuscar']);
					$aux = $obj->buscarMonto();
					mostrar($aux);
				} elseif ($_POST['seleccion'] == 'Plazo') {
					$obj->setPlazo($_POST['txtBuscar']);
					$aux = $obj->buscarPlazo();
					mostrar($aux);
				}
			}
			break;

		case "Mostrar Datos": {
				$aux = $obj->mostrar();
				mostrar($aux);
			}
			break;
		case "Volver": {
				volver();
			}
			break;
	}
	?>

</body>

</html>