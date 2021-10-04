<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

	<?php
	include_once('capa_negocio/clsCuota.php');
	?>

	<b> REGISTRO DE CUOTAS PAGADAS </b>
	<form id="form1" name="form1" method="post" action="frmCuota.php">
		<table width="800" border="0">
			<tr>
				<!-- <td width="80">ID Cuota</td> -->
				<td>
					<input name="txtIdCuota" type="hidden" value="<?php echo $_GET['id_cuota']; ?>" />
				</td>

			</tr>
			<tr>
				<td width="80">Fecha</td>
				<td width="225">
					<input name="txtFecha" type="date" value="<?php echo $_GET['fecha']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="80">Monto</td>
				<td width="225">
					<input name="txtMonto" type="number" value=<?php echo $_GET['monto']; ?> />
				</td>
			</tr>
			<tr>
				<td>ID Plan</td>
				<td>
					<input name="txtIdPlan" type="number" value=<?php echo $_GET['id_plan']; ?> />
					<input type="submit" name="botones" value="BuscarPlanPago" />
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
		if ($_POST['txtFecha'] && $_POST['txtMonto'] && $_POST['txtIdPlan']) {
			$obj = new Cuota();
			$obj->setFecha($_POST['txtFecha']);
			$obj->setMonto($_POST['txtMonto']);
			$obj->setIdPlan($_POST['txtIdPlan']);
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
		if ($_POST['txtFecha'] && $_POST['txtMonto'] && $_POST['txtIdPlan'] && $_POST['txtIdCuota']) {
			$obj = new Cuota();
			$obj->setIdCuota($_POST['txtIdCuota']);
			$obj->setFecha($_POST['txtFecha']);
			$obj->setMonto($_POST['txtMonto']);
			$obj->setIdPlan($_POST['txtIdPlan']);
			if ($obj->modificar()) {
				echo "Registro Modificado..!!!";
			} else {
				echo "Error al modificar";
			}
		} else {
			echo "Ingrese los datos necesarios y seleccione un registro para editar";
		}
	}

	function eliminar()
	{
		if ($_POST['txtIdPlan'] && $_POST['txtIdCuota']) {
			$obj = new Cuota();
			$obj->setIdCuota($_POST['txtIdCuota']);
			$obj->setIdPlan($_POST['txtIdPlan']);
			if ($obj->eliminar()) {
				echo "Registro Eliminado..!!!";
			} else {
				echo "Error al eliminar";
			}
		} else {
			echo "Ingrese los datos necesarios";
		}
	}

	function mostrar()
	{
		$obj = new Cuota();
		$aux = $obj->mostrar();
		echo "<table border=1 >";
		echo "<tr>
				<td> Código </td>
				<td> Fecha </td>
				<td> Monto </td>
				<td> Código Plan de Pago </td>
				<td> * </td>
			</tr>";
		while ($reg = mysqli_fetch_object($aux)) {
			echo "<tr>
				<td>$reg->id_cuota</td>
				<td>$reg->fecha</td>
				<td>$reg->monto</td>
				<td>$reg->id_plan</td>
					<td>
						<a href='
							frmCuota.php?
							id_cuota=$reg->id_cuota
							&fecha=$reg->fecha
							&monto=$reg->monto
							&id_plan=$reg->id_plan
						'>
						Edit
					</td>
				</tr>";
		}
		echo "</table>";
	}

	function buscarPlanPago(){
		header("Location: http://localhost/practica1/frmBuscarPlanPago.php");
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
		case "BuscarPlanPago": {
				buscarPlanPago();
			}
			break;
	}
	?>

</body>

</html>