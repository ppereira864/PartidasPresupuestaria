<?php 

require("../../ConexionBD/conexion.php");

$codigo = $_GET['codg'];
$array = explode(",","Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre");
$buscando_mes = ""; $bandera = false;

$selMes = "SELECT * FROM reportes WHERE codigo_partida ='$codigo' ";
$ejecutar_consulta = $conexion->query($selMes);

while ($result=mysqli_fetch_array($ejecutar_consulta)){

	$buscando_mes = $result['mes'];
}

foreach ($array as $a) {

	if ( $bandera ){
		$buscando_mes = $a;
		$bandera = false;
		$a = "";
	}

	if ( $a == $buscando_mes ){
		$bandera = true;
	}

}



?>


 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creando Reporte</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">
	<script src="../../../../../js/jquery-3.0.0.min.js"></script>
	<script src="../../../../../js/jquery.validate.min.js"></script>
	<script src="../../../../../js/JSPropio2.js" type="text/javascript"></script>

	<style>

		input
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 230px;
        }

        #mes
        {
                    
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            width: 130px;
        }

        #cod_partida
        {
                    
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            width: 180px;
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

<body style="background-image: url('../../../../../img/Vista_Black_and_White_by_VistaDude_1600x900.jpg'); background-size: cover;">
	
	<form  action="NewUpdaRestDelt.php?opc=report_exist" id="RegisReportes" method="POST" 
				style="background-color:#CDC1C1; width:35%; border-radius:30px; padding: 0px 12px; margin: 18px;" onsubmit="return valPassw();">
			
			<table>
				<tr>
					<center>
						<h3>
							Reporte Con Codigo <?php echo $codigo; ?>
						</h3>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h5>Codigo Partida :</h5>
					</td>
					<td>
						<select name="cod_partida" id="cod_partida">
								<option><?php echo $codigo; ?></option>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Mes :</h5>
					</td>
					<td>
						
						<select name="mes" id="mes">
								<option><?php echo $buscando_mes; ?></option>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Gastos Mensual :</h5>
					</td>
					<td>
						<input type="text" name="gastos_mensual" id="gastos_mensual" min="1" max="1000000000" >
					</td>
				</tr>

			</table>
			<hr>
			<br>
			<center>
				<input type="submit" name="REGISTRAR" value="Registrar">
				<input type="reset" name="borrar" value="Borrar">
				<a href="administrador.php"><botton class="btn-atras">Atras</botton></a>
			</center><br>
		</form>



</body>

</html>