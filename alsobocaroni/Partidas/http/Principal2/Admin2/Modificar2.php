<?php 
require("../../ConexionBD/conexion.php");

$cedula = $_GET['ced'];

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

	<style>
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

		label.error{
			color:blue;
			font-size: 9px;
			font-weight: bold;
			display: block;
		}

		input.error{
			border: 2.5px dotted blue;
		}

		select.error{
			border: 2.5px dotted blue;
		}

		
	</style>

</head>

<body style="background-image: url('../../../../../img/Vista_Black_and_White_by_VistaDude_1600x900.jpg'); background-size: cover;">
	
	<center>
	<form  action="NewUpdaRestDelt.php?opc=modificar" id="RegistroUser" method="POST" 
				style="background-color:#EE7E5C; width:525px; border-radius:45px; padding: 0px 12px; margin: 18px;" >
			
			<table>
				<tr>
					<center>
						<h3>
							Actualizando Registro
						</h3>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Cedula  :</h4>
					</td>
					<td>
						<input type="number" name="cedula" min="9000000" max="50000000" value="<?php echo $row_cedula ?>" style="border-radius: 25px;">
						
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Nombres :</h4>
					</td>
					<td>
						<input type="text" name="nombres" value="<?php echo $row_nombres ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Apellidos :</h4>
					</td>
					<td>
						<input type="text" name="apellidos" value="<?php echo $row_apellidos ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Sexo :</h4>
					</td>
					<td>
						<select name="sexo">
							<option><?php echo $row_sexo; ?></option>
							<?php if ( $row_sexo == "Femenino" ){ ?>
								<option>Masculino</option>
							<?php } else { ?>
								<option>Femenino</option>
							<?php } ?>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Email :</h4>
					</td>
					<td>
						<input type="email"  name="email" id="email" value="<?php echo $row_email ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Cargo :</h4>
					</td>
					<td>
						<input type="text"  name="cargo" id="cargo" value="<?php echo $row_cargo ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Tipo de Usuario :</h4>
					</td>
					<td>
						<input type="text"  name="tipousuario" value="<?php echo $row_rango ?>">
					</td>
				</tr>
			</table>

			<hr>

			<table>
				<tr>
					<td style="color:black;">  
						<h4>Usuario :</h4>
					</td>
					<td>
						<input type="text" name="hostname" value="<?php echo $row_usuario ?>">
					</td>
				</tr>

				<tr>
					<td style="color:black;">  
						<h4>Contrase&ntilde;a :</h4>
					</td>
					<td>
						<input type="password" name="password" id="password" placeholder="<?php echo $row_contrasena ?>">
					</td>
				</tr>

			</table>
			<br>
			<center>
				<input type="submit" name="REGISTRAR" value="Actualizar">
				<input type="reset" name="borrar" value="Borrar">
				<a href="administrador.php"><botton class="btn-atras">Atras</botton></a>
			</center><br>
		</form>
		</center>



</body>

</html>