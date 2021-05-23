<?php 

$plistar = $_POST['plistar'];
$anno	 = $_POST['anno'];
$mes 	 = $_POST['mes'];


if($plistar == "listado"){
	echo listar_detalle($anno, $mes);
}


function listar_detalle($anno, $mes){

	require("../../ConexionBD/conexion.php");

if ( $mes != 'Anual') {
		

	$consulta = "SELECT * FROM presupuesto_partida WHERE (anno='$anno' AND mes='$mes') order by dig_mes, cod_part, cod_gen, cod_esp, cod_sub";

	$ejecutar_consulta = $conexion->query($consulta);
	$ejecutar_consulta1 = $conexion->query($consulta);

	if ( $row = $ejecutar_consulta->fetch_assoc() ) {

		$v1 = $row['cod_part'];
		$v2 = $row['cod_gen'];
		$v3 = $row['cod_esp'];
		$v4 = $row['cod_sub'];

		$consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

		$ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

		$rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
		$descripcion = $rowdescripcion['descripcion'];

		echo "
		<h4 style='color: black;'>
			Partidas Especificas :
		</h4>";

		$i = 0; 

		while ( $row = mysqli_fetch_array( $ejecutar_consulta1 ) ) {

			$v1 = $row['cod_part'];
			$v2 = $row['cod_gen'];
			$v3 = $row['cod_esp'];
			$v4 = 00;

			$consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

			$ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

			$rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
			$descripcion = $rowdescripcion['descripcion'];

			echo "
			<table>
			<tr>
				<td style='color:black;'>
				<input type='text' name='item' id='item' value='".($i+1)."' readonly style='background-color: grey; color: white'>
					 Codigo :
				</td>
				<td>
					<input type='text' name='cod_par".$i."' id='cod_par' value='".$v1."' readonly style='background-color: #BAAAAA; color: black'>-
					<input type='text' name='cod_gen".$i."' id='cod_gen' value='".$v2."' readonly style='background-color: #BAAAAA; color: black'>-
					<input type='text' name='cod_esp".$i."' id='cod_esp' value='".$v3."' readonly style='background-color: #BAAAAA; color: black'>-
					<input type='text' name='cod_sub".$i."' id='cod_sub' value='00' readonly style='background-color: #BAAAAA; color: black'>
				</td>
			</tr>
			<tr>
				<td style='color:black;'>
					<h5>Descripcion : </h5>
				</td>
				<td>
					<div id='mostrar_descrip' style='color: #B13232; padding: 0px 4px;'>
					 ".$descripcion."
					</div>
				</td>
			</tr>

			<tr>
				<td style='color:black;'>
					<h5>Disponible :</h5>
				</td>
				<td>
					<input type='text' name='disp' id='dispTotal' value='".$row['disponible']."' readonly>
				</td>
			</tr>

			</table><br><br>

			";
			
			$i ++;
		}

		echo "
			<hr>
			<table>
			<br>
			<center>
				<input type='submit' name='REGISTRAR' value='Registrar'>
				<input type='reset' name='borrar' value='Borrar'>
			</center>
			</table>
		";


	}else{

		echo " ERROR PARTIDAS NO CREADAS

		";
	}



}else{

	$consulta = "SELECT * FROM presupuesto_partida WHERE (anno='$anno') ORDER BY dig_mes, cod_part, cod_gen, cod_esp, cod_sub";

	$ejecutar_consulta = $conexion->query($consulta);
	$ejecutar_consulta1 = $conexion->query($consulta);

	if ( $row = $ejecutar_consulta->fetch_assoc() ) {

		$v1 = $row['cod_part'];
		$v2 = $row['cod_gen'];
		$v3 = $row['cod_esp'];
		$v4 = $row['cod_sub'];

		$consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

		$ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

		$rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
		$descripcion = $rowdescripcion['descripcion'];

		echo "
		<h4 style='color: black;'>
			Partidas Especificas :
		</h4>";

		$i = 0; 

		while ( $row = mysqli_fetch_array( $ejecutar_consulta1 ) ) {

			$v1 = $row['cod_part'];
			$v2 = $row['cod_gen'];
			$v3 = $row['cod_esp'];
			$v4 = 00;

			$consultaDescripcion = "SELECT * FROM num_partidas WHERE (cod_par=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

			$ejecutar_consultaDescripcion = $conexion->query($consultaDescripcion);

			$rowdescripcion = $ejecutar_consultaDescripcion->fetch_assoc();
			$descripcion = $rowdescripcion['descripcion'];

			echo "
			<table>
			<tr>
				<td style='color:black;'>
				<input type='text' name='item' id='item' value='".($i+1)."' readonly style='background-color: grey; color: white'>
					 Codigo :
				</td>
				<td>
					<input type='text' name='cod_par".$i."' id='cod_par' value='".$v1."' readonly style='background-color: #BAAAAA; color: black'>-
					<input type='text' name='cod_gen".$i."' id='cod_gen' value='".$v2."' readonly style='background-color: #BAAAAA; color: black'>-
					<input type='text' name='cod_esp".$i."' id='cod_esp' value='".$v3."' readonly style='background-color: #BAAAAA; color: black'>-
					<input type='text' name='cod_sub".$i."' id='cod_sub' value='00' readonly style='background-color: #BAAAAA; color: black'>
				</td>
				".$row['mes']."
			</tr>
			<tr>
				<td style='color:black;'>
					<h5>Descripcion : </h5>
				</td>
				<td>
					<div id='mostrar_descrip' style='color: #B13232; padding: 0px 4px;'>
					 ".$descripcion."
					</div>
				</td>
			</tr>

			<tr>
				<td style='color:black;'>
					<h5>Disponible :</h5>
				</td>
				<td>
					<input type='text' name='disp' id='dispTotal' value='".$row['disponible']."' readonly>
				</td>
			</tr>

			</table><br><br>

			";
			
			$i ++;
		}

		echo "
			<hr>
			<table>
			<br>
			<center>
				<input type='submit' name='REGISTRAR' value='Registrar'>
				<input type='reset' name='borrar' value='Borrar'>
			</center>
			</table>
		";


	}else{

		echo " ERROR PARTIDAS NO CREADAS

		";
	}
}


}

 ?>