<?php 

require("../../ConexionBD/conexion.php");

$mostrarPartidas = "SELECT * FROM presupuesto_partida";
	$ejecutar_consulta1  = $conexion->query($mostrarPartidas);

$valor = $_GET['valor'];
$valor1 = $_GET['valor1'];
$valor2 = $_GET['valor2'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Partidas Receptora</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">
	<script src="../../../../../js/jquery-3.0.0.min.js"></script>
	<script src="../../../../../js/jquery.validate.min.js"></script>
	<script src="../../../../../js/JSPropio6.js" type="text/javascript"></script>

	<style>
		input, select
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 12px;
            width: 150px;
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

		#num_acuerdo{
			border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 17px;
            width: 70px;
		}

		#anno{
			border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 17px;
            width: 100px;
		}

		#seguir{
			border: 2px solid #BFBFBF;
		    color: #000;
		    padding: 7px 17px;
		    width: 100px;	
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

		#cod_part{
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

		
	</style>

		<script type="text/javascript">

	    function verificar_codigo(){

	        var parametros = {
	            "plistar" : "listado",
	            "cod_part" : document.getElementById("cod_part").value,
	            "cod_gen" : document.getElementById("cod_gen").value,
	            "cod_esp" : document.getElementById("cod_esp").value,
	            "cod_sub" : document.getElementById("cod_sub").value,
	            "mes" 	  : document.getElementById("mes").value,
	            "anno" 	  : document.getElementById("anno").value,
	        };


	        $.ajax({
	            data: parametros,
	            url: "verificar_codigo2.php",
	            type: "post",

	            success: function(response){                                
	                document.getElementById("mostrar_descrip").innerHTML=response;
	            }

	        });

	    }



	    function verificar_monto1(){

	        var parametros = {
	            "plistar" : "listado",
	            "monto1" : document.getElementById("monto1").value,
	            "num_acuerdo" : document.getElementById("num_acuerdo").value,
	            "anno" : document.getElementById("anno").value,
	            "mes" : document.getElementById("mes").value,
	        };


	        $.ajax({
	            data: parametros,
	            url: "verificar_monto1.php",
	            type: "post",

	            success: function(response){                                
	                document.getElementById("verificar_montodisponible").innerHTML=response;
	            }

	        });

	    }



	    </script>
	
</head>

<body style="background-image: url('../../../../../img/Apple-Laptop-And-A-Mug-Of-Coffee.jpg'); background-size: cover;">
	
	<form  action="NewUpdaRestDelt.php?opc=reg_prt" id="Registrandotraslado" method="POST" 
				style="background-color:#8B7777; border-radius:45px; padding: 0px 12px; margin: 18px;">
			
			<center><table>
			<tr><br>
				<td style="color:black;">
					<h5 style="margin: 3px;"> Numero Acuerdo y Año :</h5>
				</td>
				<td>
					<input type="text" name="num_acuerdo" id="num_acuerdo" value="<?php echo $valor; ?>" readonly style="background-color:grey;">
					<input type="text" name="anno" id="anno" value="<?php echo $valor1; ?>" readonly style="background-color:grey;">
					<input type="text" name="mes" id="mes" value="<?php echo $valor2; ?>" readonly style="background-color:grey;">
				</td>
			</tr>
			</table></center>
			<table>
				<tr>
					<center>
						<h1>
							Registro Partida Receptora 
						</h1>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h5 style="margin: 4px;"> Codigo Partida :</h5>
					</td>
					<td>
						<input type="text" value="01-01-00-00-51-4" readonly >-
						<input type="text" name="cod_part" id="cod_part" value="00" min="0" max="99" maxlength="2">-
						<input type="text" name="cod_gen" id="cod_gen" value="00" min="0" max="99" maxlength="2">-
						<input type="text" name="cod_esp" id="cod_esp" value="00" min="0" max="99" maxlength="2">-
						<input type="text" name="cod_sub" id="cod_sub" value="00" min="0" max="99" maxlength="2">
						<botton class="btn-veriicar" onclick="verificar_codigo();" >Verificar</botton>
						
					</td>
					
				</tr>
		</table>

			<div id="mostrar_descrip"></div>

		<table>
		<hr>
	
		<br>

		<table>
		<br>
		<center>
			<a href='NewUpdaRestDelt.php?opc=cancelTrasl&v1=<?php echo $valor; ?>&v2=<?php echo $valor1; ?>&v3=<?php echo $valor2; ?>'><botton class='btn-atras'>Cancelar</botton></a>
		</center><br>
		</table>
		</form>



</body>

</html>