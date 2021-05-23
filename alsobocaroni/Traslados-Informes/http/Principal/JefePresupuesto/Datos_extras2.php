<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informacion Extras</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">
	<script src="../../../../../js/jquery-3.0.0.min.js"></script>
	<script src="../../../../../js/jquery.validate.min.js"></script>
	<script src="../../../../../js/JSPropio8.js" type="text/javascript"></script>

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

		
	</style>
	
</head>

<body style="background-image: url('../../../../../img/Apple-Laptop-And-A-Mug-Of-Coffee.jpg'); background-size: cover;">
	
	<form  action="NewUpdaRestDelt.php?opc=inf_extra2" id="RegistroExtra2" method="POST" 
				style="background-color:#8B7777; width:60%; border-radius:45px; padding: 0px 12px; margin: 18px;">
			
			<table>
				<tr>
					<center>
						<h3>
							Registrando Informacion Para Los Traslados
						</h3>
					</center>
				</tr>
				<hr> DATOS DEL PRESIDENTE DE LA CAMARA<hr>

				<tr>
					<td style="color:black;">
						<h5> Nombre y Apellidos :</h5>
					</td>
					<td>
						<input type="text" name="nombre_apellido_pc" id="nombre_apellido_pc" >
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5> Cedula :</h5>
					</td>
					<td>
						<input type="text" name="cedula_pc" id="cedula_pc" min="17000000" max="30000000">
					</td>
				</tr>

				</table>

				<table>

				<hr> DATOS DE SECRETARIA MUNICIPAL<hr>

				<tr>
					<td style="color:black;">
						<h5> Nombre y Apellido :</h5>
					</td>
					<td>
						<input type="text" name="nombre_apellido_sm" id="nombre_apellido_sm" >
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5> Cedula :</h5>
					</td>
					<td>
						<input type="text" name="cedula_sm" id="cedula_sm" min="17000000" max="30000000">
					</td>
				</tr>

				</table>
			
			<br>
			<center>
				<input type="submit" name="REGISTRAR" value="Registrar">
				<input type="reset" name="borrar" value="Borrar">
				<a href="jefepresupuesto.php"><botton class="btn-atras">Atras</botton></a>
			</center><br>
		</form>



</body>

</html>