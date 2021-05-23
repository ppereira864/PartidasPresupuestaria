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
	<script src="../../../../../js/JSPropio7.js" type="text/javascript"></script>

	<style>
		input, select
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 430px;
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
	
	<form  action="NewUpdaRestDelt.php?opc=inf_extra" id="RegistroExtra" method="POST" 
				style="background-color:#8B7777; width:80%; border-radius:45px; padding: 0px 12px; margin: 18px;">
			
			<table>
				<tr>
					<center>
						<h3>
							Registrando Información de CODIGO y DESCRIPCION de Partidas
						</h3>
					</center>
				</tr>
				<hr><hr>

				<tr>
					<td style="color:black;">
						<h5> Codigo :</h5>
					</td>
					<td>
						<input type="text" name="codigo" id="codigo" >
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5> Descripcion :</h5>
					</td>
					<td>
						<input type="text" name="descripcion" id="descripcion" >
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5> Seguir Guardando Registros :</h5>
					</td>
					<td>
						<select name="seguir">
							<option>YES</option>
							<option>NO</option>
						</select>
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