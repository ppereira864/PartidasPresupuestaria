<?php 

require("plantillas/post_plantilla.php");

$array = explode(",","Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre,Anual");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Nuevo Traslado</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="../../../../../img/icons/EscudoAlsobocaroni.ico">
	<link rel="stylesheet" href="../../../../../css/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/bootstrap.css">
	<script src="../../../../../js/jquery-3.0.0.min.js"></script>
	<script src="../../../../../js/jquery.validate.min.js"></script>
	<script src="../../../../../js/JSPropio12.js" type="text/javascript"></script>

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
	
	<center>
	<form  action="NewUpdaRestDelt.php?opc=trasladonuevo" id="Registrotraslado" method="POST" 
				style="background-color:#8B7777; width:680px; border-radius:45px; padding: 0px 12px; margin: 18px;">
			
			<table>
			<br>
				<tr>
					<center>
						<h2>
							Nuevo Traslado Comsocaroni
						</h2>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:black;">
						<h5>A&ntilde;o :</h5>
					</td>
					<td>
						<select name="anno">
							<option><?php echo date("o"); ?></option>
							<option><?php echo date("o")-1; ?></option>
							<option><?php echo date("o")-2; ?></option>
							<option><?php echo date("o")-3; ?></option>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Mes :</h5>
					</td>
					<td>
						<select name="mes" id="mes" >
								<?php 
									foreach ($array as $mes){
										echo '<option>'.$mes.' </option>';
									}
								?>
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Numero de Traslado  :</h5>
					</td>
					<td>
						<input type="number" name="num_acuerdo" min="00" max="100" placeholder="00 ...">
						
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Parrafo Inicial :</h5>
					</td>
					<td>
						<textarea cols="60" rows="8" name="parrafo_inic">
						  <?php echo parrafo_ini(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 1 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="considerando_1">
							<?php echo considerando1(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 2 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="8" name="considerando_2">
							<?php echo considerando2(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 3 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="considerando_3">
							<?php echo considerando3(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 4 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="considerando_4">
							<?php echo considerando4(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 5 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="considerando_5">
							<?php echo considerando5(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 6 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="considerando_6">
							<?php echo considerando6(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Considerando 7 :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="considerando_7">
							<?php echo considerando7(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Articulo Primero :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="articulo_1">
							<?php echo articulo1(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Articulo Segundo :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="articulo_2">
							<?php echo articulo2(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Articulo Tercero :</h5>
					</td>
					<td>
						<textarea cols="60" rows="4" name="articulo_3">
							<?php echo articulo3(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Articulo Cuarto :</h5>
					</td>
					<td>
						<textarea cols="60" rows="5" name="articulo_4">
							<?php echo articulo4(); ?>
						</textarea>
					</td>
				</tr>

				<tr>
					<td style="color:black;">
						<h5>Parrafo Final :</h5>
					</td>
					<td>
						<textarea cols="60" rows="5" name="parrafo_fin">
							<?php echo parrafo_fin(); ?>
						</textarea>
					</td>
				</tr>
		</table>
			
			<br>
			<center>
				<input type="submit" name="REGISTRAR" value="Registrar">
				<input type="reset" name="borrar" value="Borrar">
				<a href="admin.php"><botton class="btn-atras">Atras</botton></a>
			</center><br>
		</form>
		</center>


</body>

</html>