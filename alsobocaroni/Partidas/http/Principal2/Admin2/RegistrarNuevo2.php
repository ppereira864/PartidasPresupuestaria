<?php 

$rango = $_GET['rango'];

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Nuevo <?php echo $rango; ?></title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">
	<script src="../../../../../js/jquery-3.0.0.min.js"></script>
	<script src="../../../../../js/jquery.validate.min.js"></script>
	<script src="../../../../../js/JSPropio11.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
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
	<form  action="NewUpdaRestDelt.php?opc=nuevo" id="RegistroUser" method="POST" 
				style="background-color:#EE7E5C; width:525px; border-radius:30px; padding: 0px 12px; margin: 18px;" onsubmit="return valPassw();">
	
			<table>
				<tr><br>
					<center>
						<h3>
							Registrar Nuevo <?php echo $rango; ?>
						</h3>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Cedula  :</h4>
					</td>
					<td>
						<input type="text" name="cedula" min="9000000" max="50000000" placeholder="CEDULA...." style="border-radius: 25px;" maxlength="8">
						
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Nombres :</h4>
					</td>
					<td>
						<input type="text" name="nombres" placeholder="NOMBRE....">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Apellidos :</h4>
					</td>
					<td>
						<input type="text" name="apellidos" placeholder="APELLIDO....">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Sexo :</h4>
					</td>
					<td>
						<select name="sexo">
							<option>Masculino</option>
							<option>Femenino</option>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Email :</h4>
					</td>
					<td>
						<input type="email"  name="email" id="email"
						 placeholder=" Example@UI.COM....">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Ingrese Cargo :</h4>
					</td>
					<td>
						<input type="text"  name="cargo" id="cargo"
						 placeholder=" ">
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h4>Tipo de Usuario :</h4>
					</td>
					<td>
						<select name="tipousuario">
							<option><?php echo $rango; ?></option>
						</select>
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
						<input type="text" name="hostname" 
						 placeholder="  Usuario....">
					</td>
				</tr>

				<tr>
					<td style="color:black;">  
						<h4>Contrase&ntilde;a :</h4>
					</td>
					<td>
						<input type="password" name="password" id="password" 
						 placeholder="    ***********">
					</td>
				</tr>

				<tr>
					<td style="color:black;">  
						<h4>Reingrese Contrase&ntilde;a :</h4>
					</td>
					<td>
						<input type="password" name="repassword" id="repassword" 
						 placeholder="    ***********">
					</td>
				</tr>
			</table>
			<br>
			<center>
				<input type="submit" name="REGISTRAR" value="Registrar">
				<input type="reset" name="borrar" value="Borrar">
				<a href="administrador.php"><botton class="btn-atras">Atras</botton></a>
			</center><br>
		</form>
		</center>



</body>

</html>