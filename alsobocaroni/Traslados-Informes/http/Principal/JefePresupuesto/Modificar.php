<?php 
require("../../ConexionBD/conexion.php");

$cedula = $_GET['opc'];

$obtener_datos = "SELECT usu.usuario, usu.contrasena, usu.cedula, usu.rango, pers.nombres, pers.apellidos, pers.email, pers.sexo, pers.cargo FROM usuarios AS usu JOIN personal AS pers ON (usu.cedula = '$cedula' and pers.cedula='$cedula')";

$ejecutar_consulta = $conexion->query($obtener_datos);

$row = $ejecutar_consulta->fetch_assoc();
$row_usuario = $row['usuario'];
$row_contrasena = $row['contrasena'];
$row_cedula = $row['cedula'];
$row_rango = $row['rango'];
$row_nombres = $row['nombres'];
$row_apellidos = $row['apellidos'];
$row_email = $row['email'];
$row_sexo = $row['sexo'];
$row_cargo = $row['cargo'];  


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Datos</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">

	<style type="text/css">
		input, select
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 230px;
        }

		input.host{ 
			background: url("../../../../../img/114-user.png") no-repeat scroll 0 0 transparent;
			background-position: 4px 4px;
			font-size: 16px;
		}

		input.passw{ 
			background: url("../../../../../img/142-key.png") no-repeat scroll 0 0 transparent;
			background-position: 5px 5px;
			font-size: 16px;
		}

		input[type="submit"]{
			padding: 7px 7px 7px 12px;
			width: 130px;
		}
        
        input[type="reset"]{
			padding: 7px 7px 7px 12px;
			width: 130px;
		}

		.btn-atras {
  
			background: linear-gradient(#FFF,grey);
			border: 1;
			color: brown;
			opacity: 0.8;
			cursor: pointer;
			padding: 9px 45px;
			border-radius: 15px;
			margin-bottom: 0;
		}

		
	</style>
</head>

<body style="background-image: url('../../../../../img/Apple-Laptop-And-A-Mug-Of-Coffee.jpg'); background-size: cover;">
	
	<form  action="NewUpdaRestDelt.php?opc=modificar" id="RegistroUser" method="POST" 
				style="background-color:#8B7777; border-radius:45px; padding: 0px 12px; margin: 18px;" >
			
			<table>
				<tr>
					<center>
						<h3>
							Actualizar Datos de <?php echo $row_usuario; ?>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h5>Nombres :</h5>
					</td>
					<td>
						<input type="text" name="nombres" value="<?php echo $row_nombres ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Apellidos :</h5>
					</td>
					<td>
						<input type="text" name="apellidos" value="<?php echo $row_apellidos ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Ingrese Email :</h5>
					</td>
					<td>
						<input type="email"  name="email" id="email" value="<?php echo $row_email ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Ingrese Cargo :</h5>
					</td>
					<td>
						<input type="text"  name="cargo" id="cargo" value="<?php echo $row_cargo ?>">
					</td>
				</tr>
			</table>
			
			<br>
			<center>
				<input type="submit" name="REGISTRAR" value="Actualizar">
				<input type="reset" name="borrar" value="Borrar">
				<a href="jefepresupuesto.php"><botton class="btn-atras">Atras</botton></a>
			</center><br>
		</form>



</body>

</html>