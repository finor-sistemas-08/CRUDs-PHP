<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

	<?php
	include_once('capa_negocio/clsPersona.php');
	?>

	<b> REGISTRO DE PERSONAS </b>
	<form id="form1" name="form1" method="post" action="frmPersona.php">
		<table width="400" border="0">
			<tr>
				<td> </td>
				<td>
					<input name="txtIdPersona" type="hidden" value="<?php echo $_GET['id_persona']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="80">Nombre</td>
				<td width="225">
					<input name="txtNombre" type="text" value="<?php echo $_GET['nombre']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="80">Edad</td>
				<td width="225">
					<input name="txtEdad" type="text" value="<?php echo $_GET['edad']; ?>" />
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
		if ($_POST['txtNombre']) {
			$obj = new Persona();
			$obj->setNombre($_POST['txtNombre']);
			$obj->setEdad($_POST['txtEdad']);
			if ($obj->guardar())
				echo "Persona Guardada..!!!";
			else
				echo "Error al guardar la Persona";
		} else
			echo "El nombre es obligatorio..!!!";
	}

	function modificar()
	{
		if ($_POST['txtNombre']) {
			$obj = new Persona();
			$obj->setIdPersona($_POST['txtIdPersona']);
			$obj->setNombre($_POST['txtNombre']);
			$obj->setEdad($_POST['txtEdad']);
			if ($obj->modificar())
				echo "Persona modificada..!!!";
			else
				echo "Error al modificar la persona..!!!";
		} else
			echo "El nombre es obligatorio...!!!";
	}

	function eliminar()
	{
		if ($_POST['txtIdPersona']) {
			$obj = new Persona();
			$obj->setIdPersona($_POST['txtIdPersona']);
			if ($obj->eliminar())
				echo "Persona eliminada";
			else
				echo "Error al eliminar la persona";
		} else
			echo "para eliminar la persona, debe tener el codigo de la persona..!!!";
	}

	function mostrar()
	{
		$obj = new Persona();
		$aux = $obj->buscar();
		echo "<table border=1 >";
		echo "<tr>
				<td> Código </td>
				<td> Nombre </td>
				<td> Edad </td>
				<td> * </td>
			</tr>";
		while ($reg = mysqli_fetch_object($aux)) {
			echo "<tr>
					<td>$reg->id_persona</td>
					<td>$reg->nombre</td>
					<td>$reg->edad</td>
					<td>
						<a href='
							frmPersona.php?
							id_persona=$reg->id_persona
							&nombre=$reg->nombre
							&edad=$reg->edad
						'>
						<<
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