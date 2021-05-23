<?php 

$plistar 		= $_POST['plistar'];
$monto1 		= $_POST['monto1'];
$num_acuerdo 	= $_POST['num_acuerdo'];
$anno 			= $_POST['anno'];
$mes 			= $_POST['mes'];


if($plistar == "listado"){
	echo listar_detalle($num_acuerdo, $anno, $mes, $monto1);
}


function listar_detalle($v1, $v2, $v3, $valor){

	require("../../ConexionBD/conexion.php");

	if ( $valor ){

		$verificarMonto = "SELECT * FROM calculos_pct WHERE trs_num_acuerdo='$v1' AND trs_anno='$v2' AND mes='$v3' ";
		$ejecutar_verificarMonto = $conexion->query($verificarMonto);

		$sumatoria = 0;

			while ($result=mysqli_fetch_array($ejecutar_verificarMonto)) {
				
				$sumatoria = $sumatoria + $result['monto'];

			}

		$totalMontoPCT = $sumatoria;

		
		$verificarMonto = "SELECT * FROM calculos_prt WHERE trs_num_acuerdo=$v1 AND trs_anno=$v2 AND mes='$v3' ";
		$ejecutar_verificarMonto = $conexion->query($verificarMonto);

		$sumatoria2 = 0;

			while ($result=mysqli_fetch_array($ejecutar_verificarMonto)) {
					
					$sumatoria2 = $sumatoria2 + $result['monto'];
			
			}

		
		$totalMonto1 = $valor + $sumatoria2;


			if ( $totalMonto1 < $totalMontoPCT ) {

				echo "

					<table>
							<hr>
								<div>Seguir Llenando Partidas Cedentes</div><br>
									<tr>
										<td style='color:black;''>
											<h5>Opcion :</h5>
										</td>
										<td>
											<select name='seguir' id='seguir'>
												<option>YES</option>
											</select>
										</td>
									</tr>

							</table>
								
								<br>
								<center>
									<input type='submit' name='REGISTRAR' value='Registrar'>
									<input type='reset' name='borrar' value='Borrar'>
								</center><br>


				 ";

			}else if ( $totalMonto1 > $totalMontoPCT ) {

				echo "<strong style='color:#C82828;'>¡¡¡¡ Cantidad Mayor a ".$totalMontoPCT." En Cedente !!!!</strong>";

			}else if ( $totalMonto1 = $totalMontoPCT ){

				echo "

					<table>
							<hr>
								<div>Seguir Llenando Partidas Cedentes</div><br>
									<tr>
										<td style='color:black;''>
											<h5>Opcion :</h5>
										</td>
										<td>
											<select name='seguir' id='seguir'>
												<option>NO</option>
											</select>
										</td>
									</tr>

							</table>
								
								<br>
								<center>
									<input type='submit' name='REGISTRAR' value='Registrar'>
									<input type='reset' name='borrar' value='Borrar'>
								</center><br>


				 ";

			}


	}else{
		echo "<strong style='color:#C82828;'>¡¡¡¡ Error Cantidad Requeridad !!!!</strong>";
	}

}




 ?>