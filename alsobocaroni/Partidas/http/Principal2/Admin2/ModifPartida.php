<?php 

require("../../ConexionBD/conexion.php");

$annito = date("o");
$codigo = $_GET['codigo'];

$mostrarPartidas = "SELECT * FROM presupuesto_partida WHERE item = '$codigo'";
$ejecutar_consulta = $conexion->query($mostrarPartidas);

$row = $ejecutar_consulta->fetch_assoc();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrando Partidas></title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">
	<script src="../../../../../js/jquery-3.0.0.min.js"></script>
	<script src="../../../../../js/jquery.validate.min.js"></script>
	<script src="../../../../../js/JSPropio1.js" type="text/javascript"></script>

	<style>


		input
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 260px;
        }

        #dia
        {
                    
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            width: 55px;
        }

        #mes
        {
                    
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            width: 90px;
        }

        #anno
        {
                    
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            width: 90px;
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

		.btn-veriicar {

			background: linear-gradient(#FFF,grey);
			border: 1;
			color: brown;
			opacity: 0.8;
			cursor: pointer;
			padding: 9px 10px;
			border-radius: 15px;
			margin-bottom: 0;
		}

		#cod_par{
			padding: 7px;
			width: 35px;
		}

		#cod_gen{
			padding: 7px;
			width: 35px;
		}

		#cod_esp{
			padding: 7px;
			width: 35px;
		}

		#cod_sub{
			padding: 7px;
			width: 35px;
		}

		#cod_primario{
			padding: 7px;
			width: 130px;
		}

		
	</style>


	<script type="text/javascript">

	function validar_montos(){

	    var parametros = {
	    	
	        "plistar"	: "listado",
	        "modificado"	: document.getElementById("modificado").value,
	        "comprometido"	: document.getElementById("comprometido").value,
	     };

	    $.ajax({
	        data: parametros,
	        url: "validar_montos.php",
	        type: "post",

	        success: function(response){                                
	            document.getElementById("descrip_montos").innerHTML=response;
	        }

	    });

	}


	</script>
	
</head>

<body style="background-image: url('../../../../../img/Vista_Black_and_White_by_VistaDude_1600x900.jpg'); background-size: cover;">
	
	<form  action="NewUpdaRestDelt.php?opc=partidamodf&codigo=<?php echo $codigo; ?>" id="RegisPartida" method="POST" 
				style="background-color:#CDC1C1; width:45%; border-radius:30px; padding: 0px 12px; margin: 18px;" onsubmit="return valPassw();">
			
			<table>

				<tr>
					<center>
						<h3>
							Modiicar Partida
						</h3>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h5>Año / Mes :</h5>
					</td>
					<td>
						<select name="anno" id="anno">
								<option><?php echo $row['anno']; ?></option>
						</select>

						<select name="mes" id="mes">
								<option><?php echo $row['mes']; ?></option>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Codigo :</h5>
					</td>
					<td>
						<input type="text" id="cod_primario" value="01-01-00-00-51-4" readonly>-
						<input type="text" id="cod_par" name="cod_par" value="<?php echo $row['cod_part']; ?>" readonly>-
						<input type="text" id="cod_gen" name="cod_gen" value="<?php echo $row['cod_gen']; ?>" readonly>-
						<input type="text" id="cod_esp" name="cod_esp" value="<?php echo $row['cod_esp']; ?>" readonly>-
						<input type="text" id="cod_sub" name="cod_sub" value="<?php echo $row['cod_sub']; ?>" readonly>
					</td>
				</tr>

				<tr>
				<td style='color:black;'>
					<h5>Monto Ley :</h5>
				</td>
				<td>
					<input type="text" name="monto_ley" id="monto_ley" min="0" value="<?php echo $row['monto_ley']; ?>">
				</td>
			</tr>

			<tr>
				<td style='color:black;'>
					<h5>Modificado :</h5>
				</td>
				<td>
					<input type="text" name="modificado" id="modificado" min="0" value="<?php echo $row['modificado']; ?>">
				</td>
			</tr>

			<tr>
				<td style='color:black;'>
					<h5>Credito Asig. :</h5>
				</td>
				<td>
					<input type="text" name="credito_asignado" id="credito_asignado" min="0" value="<?php echo $row['credito_asignado']; ?>">
				</td>
			</tr>

			<tr>
				<td style='color:black;'>
					<h5>Comprometido :</h5>
				</td>
				<td>
					<input type="text" name="comprometido" id="comprometido" min="0" value="<?php echo $row['comprometido']; ?>">
				</td>
			</tr>

			<tr>
				<td style='color:black;'>
					<h5>Acumulado :</h5>
				</td>
				<td>
					<input type="text" name="acumulado" id="acumulado" min="0" value="<?php echo $row['acumulado']; ?>" onmouseover="validar_montos();">
				</td>
			</tr>

			</table>
			
			<div id='descrip_montos'>
				
			</div><br>

			<hr>
			<table>
			<br>
			<center>
				<a href='administrador.php'><botton class='btn-atras'>Atras</botton></a>
			</center><br>
			</table>
		</form>



</body>

</html>