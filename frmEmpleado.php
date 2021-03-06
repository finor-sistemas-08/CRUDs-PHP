<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

    <?php
    include_once('capa_negocio/clsEmpleado.php');
    ?>

    <b> REGISTRO DE PERSONAS </b>
    <form id="form1" name="form1" method="post" action="frmEmpleado.php">
        <table width="700" border="0">
            <tr>
                <td width="80">Carnet de Identidad</td>
                <td>
                    <input name="txtCi" type="number" value=<?php echo $_GET['ci']; ?> />
                </td>
            </tr>
            <tr>
                <td width="80">Nombres</td>
                <td width="225">
                    <input name="txtNombres" type="text" value="<?php echo $_GET['nombres']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="80">Apellido Paterno</td>
                <td width="225">
                    <input name="txtPaterno" type="text" value="<?php echo $_GET['paterno']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="80">Apellido Materno</td>
                <td width="225">
                    <input name="txtMaterno" type="text" value="<?php echo $_GET['materno']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="80">Sueldo</td>
                <td width="225">
                    <input name="txtSueldo" type="number" value=<?php echo $_GET['sueldo']; ?> />
                </td>
            </tr>
            <tr>
                <td width="80">Tipo</td>
                <td width="225">
                    <select name="cbxTipo" id="" required>
                        <option value="S" <?php if ($_GET['tipo'] == "S") {
                                                echo "selected";
                                            } ?>> Secretaria</option>
                        <option value="T" <?php if ($_GET['tipo'] == "T") {
                                                echo "selected";
                                            } ?>> T??cnico</option>
                    </select>
                </td>
            </tr>
            <?php
            // Intentando mostrar din??micamente los textbox en funci??n del tipo de empleado
            // if ($_POST['cbxTipo'] == "S") {
            //     $vel = $_GET['vel'];
            //     echo "<tr>
            //             <td width=\"80\">Velocidad de Typeo</td>
            //             <td width=\"225\">
            //                 <input name=\"txtVel\" type=\"number\" value=$vel />
            //             </td>
            //         </tr>";
            // } else {
            //     $grado = $_GET['grado'];
            //     echo "<tr>
            //         <td width=\"80\">Grado</td>
            //         <td width=\"225\">
            //             <input name=\"txtGrado\" type=\"text\" value=\"$grado\" />
            //         </td>
            //     </tr>";
            // }
            ?>
            <tr>
                <td width="80">Velocidad de Typeo</td>
                <td width="225">
                    <input name="txtVel" type="number" value=<?php echo $_GET['vel']; ?> />
                </td>
            </tr>
            <tr>
                <td width="80">Grado</td>
                <td width="225">
                    <input name="txtGrado" type="text" value="<?php echo $_GET['grado']; ?>" />
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
        if ($_POST['txtCi'] && $_POST['txtNombres'] && $_POST['txtPaterno']) {
            $obj = new Empleado();
            $obj->setCi($_POST['txtCi']);
            $obj->setNombres($_POST['txtNombres']);
            $obj->setPaterno($_POST['txtPaterno']);
            $obj->setMaterno($_POST['txtMaterno']);
            if ($_POST['txtSueldo'] > 0) {
                $obj->setSueldo($_POST['txtSueldo']);
            }

            $obj->setTipo($_POST['cbxTipo']);
            if ($_POST['cbxTipo'] == "T") {
                $obj->setGrado($_POST['txtGrado']);
            } else {
                if ($_POST['txtVel'] > 0) {
                    $obj->setVelTypeo($_POST['txtVel']);
                }
            }

            if ($obj->guardar())
                echo "Empleado Guardado..!!!";
            else
                echo "Error al guardar empleado";
        } else
            echo "Ingrese Ci, nombre y paterno al menos";
    }

    function modificar()
    {
        if ($_POST['txtCi'] && $_POST['txtNombres'] && $_POST['txtPaterno']) {
            $obj = new Empleado();
            $obj->setCi($_POST['txtCi']);
            $obj->setNombres($_POST['txtNombres']);
            $obj->setPaterno($_POST['txtPaterno']);
            $obj->setMaterno($_POST['txtMaterno']);
            if ($_POST['txtSueldo'] > 0) {
                $obj->setSueldo($_POST['txtSueldo']);
            }
            $obj->setTipo($_POST['cbxTipo']);
            if ($_POST['cbxTipo'] == "T") {
                $obj->setGrado($_POST['txtGrado']);
            } else {
                if ($_POST['txtVel'] > 0) {
                    $obj->setVelTypeo($_POST['txtVel']);
                }
            }
            if ($obj->modificar())
                echo "Empleado modificado..!!!";
            else
                echo "Error al modificar empleado";
        } else
            echo "Ingrese Ci, nombre y paterno al menos";
    }

    function eliminar()
    {
        if ($_POST['txtCi']) {
            $obj = new Empleado();
            $obj->setCi($_POST['txtCi']);
            if ($obj->eliminar())
                echo "Empleado eliminado..!!!";
            else
                echo "Error al eliminar empleado";
        } else
            echo "Ingrese Ci";
    }

    function mostrar()
    {
        $obj = new Empleado();
        $aux = $obj->mostrar();
        echo "<table border=1 >";
        echo "<tr>
				<td> C??digo </td>
				<td> Nombre </td>
				<td> Apellido Paterno </td>
				<td> Apellido Materno </td>
				<td> Sueldo </td>
				<td> Velocidad de Typeo </td>
				<td> Grado </td>
				<td> Tipo </td>
				<td> * </td>
			</tr>";
        while ($reg = mysqli_fetch_object($aux)) {
            echo "<tr>
					<td>$reg->ci</td>
					<td>$reg->nombres</td>
					<td>$reg->paterno</td>
					<td>$reg->materno</td>
					<td>$reg->sueldo</td>
					<td>$reg->vel_typeo</td>
					<td>$reg->grado</td>
					<td>$reg->tipo</td>
					<td>
						<a href='
							frmEmpleado.php?
							ci=$reg->ci
							&nombres=$reg->nombres
							&paterno=$reg->paterno
							&materno=$reg->materno
							&sueldo=$reg->sueldo
							&vel=$reg->vel_typeo
							&grado=$reg->grado
							&tipo=$reg->tipo
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