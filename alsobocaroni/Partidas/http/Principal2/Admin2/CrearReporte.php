<?php 

$annito = date("o");

$array = explode(",","Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre,Anual");

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
            width: 100px;
        }

        #anno
        {
                    
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            width: 100px;
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

		#cod_primario2{
			padding: 7px;
			width: 35px;
		}

		#item{
			padding: 0px 4px;
			width: 35px;
		}
		
	</style>

	<script type="text/javascript">

    function verificar_codigo(){

        var parametros = {
            "plistar" : "listado",
            "anno" 	  : document.getElementById("anno").value,
            "mes"	  : document.getElementById("mes").value,
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

    </script>
	
</head>

<body style="background-image: url('../../../../../img/Vista_Black_and_White_by_VistaDude_1600x900.jpg'); background-size: cover;">
	
	<form  action="NewUpdaRestDelt.php?opc=report_nuevo" id="RegisReportes" method="POST" 
				style="background-color:#CDC1C1;  border-radius:30px; padding: 0px 12px; margin: 18px;" onsubmit="return valPassw();">
			
			<table>
			<br>
				<tr>
					<center>
						<h3>
							  Nuevo Reporte
						</h3>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black; ">
						<h5>A&ntilde;o y Mes:</h5>
					</td>
					<td>
						<select name="anno" id="anno">
								<option><?php echo date("o"); ?></option>
								<option><?php echo date("o")-1; ?></option>
								<option><?php echo date("o")-2; ?></option>
								<option><?php echo date("o")-3; ?></option>
						</select>

						<!-- <select name="mes" id="mes" onchange="return verificar_codigo();"> -->
						<select name="mes" id="mes" >
								<?php 
									foreach ($array as $mes){
										echo '<option>'.$mes.' </option>';
									}
								?>
						</select>
					</td>
					<td><botton class="btn-veriicar" onclick="verificar_codigo();">	Verificar</botton></td>
				</tr>

			</table>

			<div id="mostrar_descrip" style="color: red;">
				
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