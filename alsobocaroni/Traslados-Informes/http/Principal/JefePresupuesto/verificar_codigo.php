<?php 

$plistar = $_POST['plistar'];
$cod_part = $_POST['cod_part'];
$cod_gen = $_POST['cod_gen'];
$cod_esp = $_POST['cod_esp'];
$cod_sub = $_POST['cod_sub'];
$anno = $_POST['anno'];
$mes = $_POST['mes'];


if($plistar == "listado"){
	echo listar_detalle($cod_part, $cod_gen, $cod_esp, $cod_sub, $anno, $mes);
}


function listar_detalle($valor, $valor2, $valor3, $valor4, $valor5, $valor6){

	require("../../ConexionBD/conexion.php");

	$consulta = "SELECT * FROM presupuesto_partida WHERE (anno='$valor5' AND mes='$valor6' AND cod_part='$valor' AND cod_gen='$valor2' AND cod_esp='$valor3' AND cod_sub='$valor4')";

	$ejecutar_consulta = $conexion->query($consulta);

	$consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$valor AND cod_gen=$valor2 AND cod_esp=$valor3 AND cod_sub=$valor4)";

	$ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

	$rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
	$descripcion = $rowdescripcion['descripcion'];

	if ($row = $ejecutar_consulta->fetch_assoc()) {

		echo "

		<table>
		 	<tr>
		 		<td style='color:black;'>
		 			<h5>Descripcion :</h5>
		 		</td>
		 		<td>
		 			<div id='mostrar_descrip' style='color:#C82828;'>
		 			".$descripcion."
		 			</div>
		 		</td>
		 	</tr>
		 	<tr>
		 		<td>
		 			<strong style='color:#C82828;'> disponible : ".$row['disponible']." </strong>
		 		</td>
		 	</tr>
		 	<tr>
		 		
		 		<td style='color:black;'>
		 			<h5>Monto 1 :</h5>
		 		</td>
		 		<td>
		 			<input type='text' name='monto1' id='monto1' min='1' max='1000000000000' '>
		 			<botton class='btn-veriicar' onmouseover='verificar_monto();' >></botton>
		 		</td>

		 	</tr>
		 </table>

		 <div id='verificar_montodisponible'></div>

		";	


	}else{

		echo "
			<strong style='color:#C82828;'>Error partida no Existe</strong>

			<tr>
				
				<td style='color:black;'>
					<h5>Monto 1 :</h5>
				</td>
				<td>
					<input type='text' name='monto1' min='1' max='1000000000000' readonly>
				</td>

			</tr>
		";
	}


}

 ?>