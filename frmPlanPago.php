<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

	<?php
	include_once('capa_negocio/clsPlanPago.php');
	?>

	<b> REGISTRO DE PLAN DE PAGO </b>
	<form id="form1" name="form1" method="post" action="frmPlanPago.php">
		<table width="700" border="0">
			<tr>
				<!-- <td width="80">ID Plan P</td> -->
				<td>
					<input name="txtIdPlan" type="hidden" value=<?php echo $_GET['id_plan']; ?> />
				</td>
			</tr>
			<tr>
				<td width="80">Fecha</td>
				<td width="225">
					<input name="txtFecha" type="date" value="<?php echo $_GET['fecha']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="80">Monto Total</td>
				<td width="225">
					<input name="txtMontoTotal" type="number" value="<?php echo $_GET['montoTotal']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="80">Plazo</td>
				<td width="225">
					<input name="txtPlazo" type="text" value="<?php echo $_GET['plazo']; ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="botones" value="Nuevo" />
					<input type="submit" name="botones" value="Guardar" />
					<input type="submit" name="botones" value="Modificar" />
					<input type="submit" name="botones" value="Eliminar" />
					<input type="submit" name="botones" value="Mostrar Datos" />
				</td>
			</tr>
		</table>
	</form>


	<?php

	function guardar()
	{
		if ($_POST['txtFecha'] && $_POST['txtMontoTotal'] && $_POST['txtPlazo']) {
			$obj = new PlanPago();
			$obj->setFecha($_POST['txtFecha']);
			$obj->setMontoTotal($_POST['txtMontoTotal']);
			$obj->setPlazo($_POST['txtPlazo']);
			if ($obj->guardar()) {
				echo "Registro Guardado..!!!";
			} else {
				echo "Error al guardar";
			}
		} else {
			echo "Ingrese los datos necesarios";
		}
	}

	function modificar()
	{
		if ($_POST['txtFecha'] && $_POST['txtMontoTotal'] && $_POST['txtPlazo']) {
			$obj = new PlanPago();
			$obj->setIdPlan($_POST['txtIdPlan']);
			$obj->setFecha($_POST['txtFecha']);
			$obj->setMontoTotal($_POST['txtMontoTotal']);
			$obj->setPlazo($_POST['txtPlazo']);
			if ($obj->modificar()) {
				echo "Registro modificado..!!!";
			} else {
				echo "Error al modificar";
			}
		} else {
			echo "Ingrese los datos necesarios";
		}
	}

	function eliminar()
	{
		if ($_POST['txtIdPlan']) {
			$obj = new PlanPago();
			$obj->setIdPlan($_POST['txtIdPlan']);
			if ($obj->eliminar()) {
				echo "Registro eliminado..!!!";
			} else {
				echo "Error al eliminar";
			}
		} else {
			echo "Seleccione un registro";
		}
	}

	function mostrar()
	{
		$obj = new PlanPago();
		$aux = $obj->mostrar();
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
							frmPlanPago.php?
							id_plan=$reg->id_plan
							&fecha=$reg->fecha
							&montoTotal=$reg->montoTotal
							&plazo=$reg->plazo
						'>
						Edit
					</td>
				</tr>";
		}
		echo "</table>";
	}


	//programa principal
	switch ($_POST['botones']) {
		case "Nuevo": {
			}
			break;

		case "Guardar": {
				guardar();
			}
			break;

		case "Modificar": {
				modificar();
			}
			break;

		case "Eliminar": {
				eliminar();
			}
			break;
		case "Mostrar Datos": {
				mostrar();
			}
			break;
	}
	?>

</body>

</html>