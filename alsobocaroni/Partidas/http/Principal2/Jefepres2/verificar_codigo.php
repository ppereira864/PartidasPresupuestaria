<?php 

$plistar = $_POST['plistar'];
$cod_par = $_POST['cod_par'];
$cod_gen = $_POST['cod_gen'];
$cod_esp = $_POST['cod_esp'];
$cod_sub = $_POST['cod_sub'];
$mes	 = $_POST['mes'];
$anno	 = $_POST['anno'];


if($plistar == "listado"){
	echo listar_detalle($cod_par, $cod_gen, $cod_esp, $cod_sub, $mes, $anno);
}


function listar_detalle($valor, $valor2, $valor3, $valor4, $mes, $anno){

	require("../../ConexionBD/conexion.php");


if ( ( $valor3 != 0 AND $valor4 != 0 ) OR ( $valor3 != 0 OR $valor4 != 0 ) ){

	$VerificandoExistenciaPartida = "SELECT * FROM presupuesto_partida WHERE (anno='$anno' AND mes='$mes' AND cod_part=$valor AND cod_gen=$valor2 AND cod_esp=$valor3 AND cod_sub=$valor4)";

		$ejecutar_VerificacionPartida = $conexion->query($VerificandoExistenciaPartida);

	if ( $row = $ejecutar_VerificacionPartida->fetch_assoc() ){

		echo "Lo Siento Partida YA Existe en ".$mes.".";

	}else{

		$consulta = "SELECT * FROM num_partidas WHERE (cod_par=$valor AND cod_gen=$valor2 AND cod_esp=$valor3 AND cod_sub=$valor4)";

			$ejecutar_consulta = $conexion->query($consulta);

			if ($row = $ejecutar_consulta->fetch_assoc()) {

				echo "

					<table>
					<tr>
						<td style='color:black;'>
							<h5>Descripcion :</h5>
						</td>
						<td>".$row['descripcion']."
						</td>
					</tr>

					<tr>
						<td style='color:black;'>
							<h5>Monto Ley :</h5>
						</td>
						<td>
							<input type='text' name='monto_ley' id='monto_ley' min='0'>
						</td>
					</tr>

					<tr>
						<td style='color:black;'>
							<h5>Modificado :</h5>
						</td>
						<td>
							<input type='text' name='modificado' id='modificado' min='0'>
						</td>
					</tr>

					<tr>
						<td style='color:black;'>
							<h5>Credito Asig. :</h5>
						</td>
						<td>
							<input type='text' name='credito_asignado' id='credito_asignado' min='0'>
						</td>
					</tr>

					<tr>
						<td style='color:black;'>
							<h5>Comprometido :</h5>
						</td>
						<td>
							<input type='text' name='comprometido' id='comprometido' min='0'>
						</td>
					</tr>

					<tr>
						<td style='color:black;'>
							<h5>Acumulado :</h5>
						</td>
						<td>
							<input type='text' name='acumulado' id='acumulado' min='0' onmouseover='validar_montos();'>
						</td>
					</tr>

					</table>

					<div id='descrip_montos'>
						
					</div><br>

				";	

			}else{

				echo "

					<table>
					<tr>
						<td>Error partida no Existe
						</td>
					</tr>
					</table>

				";
			}
	}

}else {

	$consulta = "SELECT * FROM num_partidas WHERE (cod_par=$valor AND cod_gen=$valor2 AND cod_esp=$valor3 AND cod_sub=$valor4)";

	$ejecutar_consulta = $conexion->query($consulta);

	if ($row = $ejecutar_consulta->fetch_assoc()) {

		

		echo "

			<table>
			<tr>
				<td style='color:black;'>
					<h5>Descripcion :</h5>
				</td>
				<td>".$row['descripcion']."
				</td>
			</tr>
			</table>
		";	


	}else{

		echo "

			<table>
			<tr>
				<td>Error partida no Existe
				</td>
			</tr>
			</table>
		";
	}
}

}

 ?>