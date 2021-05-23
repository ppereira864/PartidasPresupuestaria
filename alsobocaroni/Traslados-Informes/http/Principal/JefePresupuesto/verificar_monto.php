<?php 

$plistar = $_POST['plistar'];
$cod_par = $_POST['cod_part'];
$cod_gen = $_POST['cod_gen'];
$cod_esp = $_POST['cod_esp'];
$cod_sub = $_POST['cod_sub'];
$monto1 = $_POST['monto1'];


if($plistar == "listado"){
	echo listar_detalle($cod_par, $cod_gen, $cod_esp, $cod_sub, $monto1);
}


function listar_detalle($v1, $v2, $v3, $v4, $valor){

	require("../../ConexionBD/conexion.php");

	if ( $valor ){

			$verificarCuenta = "SELECT * FROM presupuesto_partida WHERE (cod_part=$v1 AND cod_gen=$v2 AND cod_esp=$v3 AND cod_sub=$v4)";

			$ejecutar_consulta = $conexion->query($verificarCuenta);
			$row = $ejecutar_consulta->fetch_assoc();
			$disponible = $row['disponible'];

			if ( $valor < $disponible ) {
				echo "

					<table>
							<hr>
								<div>Seguir Llenando Partidas Cedentes</div><br>
									<tr>
										<td style='color:black;''>
											<h5>Opcion :</h5>
										</td>
										<td>
											<select name='seguir' id='seguir' >
												<option>NO</option>
												<option onmouseover='verificar_monto();'>YES</option>
											</select>
										</td>
									</tr>

							</table>
								
								<br>
								<center>
									<input type='submit' name='REGISTRAR' value='Registrar'  >
									<input type='reset' name='borrar' value='Borrar'>
								</center><br>


				 ";
			}else{
				echo "<strong style='color:#C82828;'>¡¡¡¡ Error Cantidad Excede lo Disponible !!!!</strong>";
			}
	}else{
		echo "<strong style='color:#C82828;'>¡¡¡¡ Error Cantidad Requeridad !!!!</strong>";
	}

}




 ?>