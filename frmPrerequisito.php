<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

    <?php
    include_once('capa_negocio/clsPrerequisito.php');
    ?>

    <b> PREREQUISITOS DE MATERIAS </b>
    <form id="form1" name="form1" method="post" action="frmPrerequisito.php">
        <table width="700" border="0">
            <tr>
                <td width="80">Sigla</td>
                <td>
                    <input name="txtSigla" type="text" value="<?php echo $_GET['sigla']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="80">Sigla Prerequisito</td>
                <td width="225">
                    <input name="txtPreReq" type="text" value="<?php echo $_GET['preReq']; ?>" />
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
        if ($_POST['txtSigla'] && $_POST['txtPreReq']) {
            $pre = new Prerequisito();
            $pre->setSigla($_POST['txtSigla']);
            $pre->setPreReq($_POST['txtPreReq']);

            if ($pre->guardar()) {
                echo "Registro Guardado..!!!";
            } else {
                echo "Error al guardar registro";
            }
        } else {
            echo "Ingrese la sigla y el prerequisito";
        }
    }

    function modificar()
    {
        if (($_POST['txtSigla'] && $_POST['txtPreReq'])) {
            $pre = new Prerequisito();
            $pre->setSigla($_POST['txtSigla']);
            $pre->setPreReq($_POST['txtPreReq']);
            if ($pre->modificar()) {
                echo "Registros modificados..!!!";
            } else {
                echo "Error al modificar";
            }
        } else {
            echo "Ingrese la sigla y el nombre o el prerequisito para modificar";
        }
    }

    function eliminar()
    {
        if (($_POST['txtSigla'] && $_POST['txtPreReq'])) {
            $pre = new Prerequisito();
            $pre->setSigla($_POST['txtSigla']);
            $pre->setPreReq($_POST['txtPreReq']);

            if ($pre->eliminar()) {
                echo "Registro Eliminado..!!!";
            } else {
                echo "Error al eliminar el registro";
            }
        } else {
            echo "Ingrese los datos";
        }
    }

    function mostrar()
    {
        $pre = new Prerequisito();
        $aux2 = $pre->mostrar();

        echo "Prerequisitos";
        echo "<table border=1 >";
        echo "<tr>
				<td> Sigla </td>
				<td> Prerequisito </td>
				<td> * </td>
			</tr>";
        while ($reg = mysqli_fetch_object($aux2)) {
            echo "<tr>
					<td>$reg->sigla</td>
					<td>$reg->preReq</td>
					<td>
						<a href='
							frmPrerequisito.php?
							sigla=$reg->sigla
							&preReq=$reg->preReq
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