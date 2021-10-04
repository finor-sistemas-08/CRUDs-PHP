<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

	<?php
	include_once('capa_negocio/clsMateria.php');
	?>

	<b> REGISTRO DE MATERIAS </b>
	<form id="form1" name="form1" method="post" action="frmMateria.php">
		<table width="700" border="0">
			<tr>
				<td width="80">Sigla</td>
				<td>
					<input name="txtSigla" type="text" value="<?php echo $_GET['sigla']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="80">Nombre</td>
				<td width="225">
					<input name="txtNombre" type="text" value="<?php echo $_GET['nombre']; ?>" />
				</td>
			</tr>
			<!-- Botones -->
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
		if ($_POST['txtSigla'] && $_POST['txtNombre']) {
			$mat = new Materia();
			$mat->setSigla($_POST['txtSigla']);
			$mat->setNombre($_POST['txtNombre']);

			if ($mat->guardar()) {
				echo "Registros Guardados..!!!";
			} else {
				echo "Error al guardar registro";
			}
		} else {
			echo "Ingrese la sigla y el nombre al menos";
		}
	}

	function modificar()
	{
		if (($_POST['txtSigla'] && $_POST['txtNombre'])) {
			$mat = new Materia();
			$mat->setSigla($_POST['txtSigla']);
			$mat->setNombre($_POST['txtNombre']);
			if ($mat->modificar()) {
				echo "Registros modificados..!!!";
			} else {
				echo "Error al modificar registro";
			}
		} else {
			echo "Ingrese la sigla y el nombre o el prerequisito para modificar";
		}
	}

	function eliminar()
	{
		if ($_POST['txtSigla']) {

			$mat = new Materia();
			$mat->setSigla($_POST['txtSigla']);

			if ($mat->eliminar()) {
				echo "Registros Eliminados..!!!";
			} else {
				echo "Error al eliminar el registro";
			}
		} else {
			echo "Ingrese la sigla";
		}
	}

	function mostrar()
	{
		$mat = new Materia();
		$aux1 = $mat->mostrar();

		echo "<br>";
		echo "Materias";
		echo "<table border=1 >";
		echo "<tr>
				<td> Sigla </td>
				<td> Nombre </td>
				<td> * </td>
			</tr>";
		while ($reg = mysqli_fetch_object($aux1)) {
			echo "<tr>
					<td>$reg->sigla</td>
					<td>$reg->nombre</td>
					<td>
						<a href='
							frmMateria.php?
							sigla=$reg->sigla
							&nombre=$reg->nombre
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