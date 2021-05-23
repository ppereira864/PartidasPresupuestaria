<?php 

require("../../ConexionBD/conexion.php");

$opcion = $_GET['opc'];


 if ( $opcion == "partidacrear" ){

	$anno				= $_POST['anno'];
	$mes				= $_POST['mes'];
	$cod_primario		= $_POST['cod_primario'];
	$cod_par			= $_POST['cod_par'];
	$cod_gen			= $_POST['cod_gen'];
	$cod_esp			= $_POST['cod_esp'];
	$cod_sub			= $_POST['cod_sub'];
	$monto_ley			= $_POST['monto_ley'];
	$modificado			= $_POST['modificado'];
	$credito_asignado	= $_POST['credito_asignado'];
	$comprometido		= $_POST['comprometido'];
	$acumulado			= $_POST['acumulado'];

	if ( $mes=="Enero" ){ $dig_mes=1; }else if ( $mes=="Febrero" ){ $dig_mes=2; }
	else if ( $mes=="Marzo" ){ $dig_mes=3; }else if ( $mes=="Abril" ){ $dig_mes=4; }
	else if ( $mes=="Mayo" ){ $dig_mes=5; }else if ( $mes=="Junio" ){ $dig_mes=6; }
	else if ( $mes=="Julio" ){ $dig_mes=7; }else if ( $mes=="Agosto" ){ $dig_mes=8; }
	else if ( $mes=="Septiembre" ){ $dig_mes=9; }else if ( $mes=="Octubre" ){ $dig_mes=10; }
	else if ( $mes=="Noviembre" ){ $dig_mes=11; }else if ( $mes=="Diciembre" ){ $dig_mes=12; }

if ( $modificado > $comprometido  ){


	$disponible = $modificado - $acumulado;

		$registrar_Partida = "INSERT INTO presupuesto_partida (anno, dig_mes, mes, cod_part, cod_gen, cod_esp, cod_sub, monto_ley, modificado, credito_asignado, comprometido, acumulado, disponible) VALUES ('$anno', $dig_mes, '$mes', '$cod_par', '$cod_gen', '$cod_esp', '$cod_sub', '$monto_ley', '$modificado', '$credito_asignado', '$comprometido', '$acumulado', '$disponible')";

		$ejecutar_consulta = $conexion->query($registrar_Partida);

		if ($ejecutar_consulta) {

			$ActualizarDisponibilidad = "SELECT * FROM presupuesto_partida WHERE (cod_part='$cod_par' AND cod_gen='$cod_gen')";

			$ejecutar_ActualizarDisponibilidad = $conexion->query($ActualizarDisponibilidad);

			$MontoAcumulado = 0;

			while ( $row = mysqli_fetch_array( $ejecutar_ActualizarDisponibilidad ) ) {

				$MontoAcumulado = $MontoAcumulado + $row['disponible'];
			}

			$ActualizarPartidaGeneral = "UPDATE num_partidas SET monto=$MontoAcumulado WHERE (cod_par=$cod_par AND cod_gen=$cod_gen AND cod_esp=00 AND cod_sub=00)";

			$ejecutar_ActualizarPartidaGeneral = $conexion->query($ActualizarPartidaGeneral);

			if ( $ejecutar_ActualizarPartidaGeneral ){

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('Partida Registrada Sastifactoriamente. !!!!');
							</script>
						</head>
					</html>";
			}

		}else {

			$conexion->close();
			
			echo "<html>
					<head>
					<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
						<script>
							alert('¡¡¡¡ Error Al Registrar Partida. !!!!');
						</script>
					</head>
				</html>";
		}

}else{
	
	$conexion->close();
		
		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=CrearPartida.php'>
					<script>
						alert('¡¡¡¡ Error Monto Comprometido ó Acumulado Mayor a Monto ley. !!!!');
					</script>
				</head>
			</html>";
}

} else if ( $opcion == "partidamodf" ){

	$codigo					= $_GET['codigo'];
	$monto_ley				= $_POST['monto_ley'];
	$modificado				= $_POST['modificado'];
	$credito_asignado		= $_POST['credito_asignado'];
	$comprometido			= $_POST['comprometido'];
	$acumulado				= $_POST['acumulado'];

	$disponible = $modificado - $acumulado;


	$ActualizarPartida = "UPDATE presupuesto_partida SET monto_ley='$monto_ley', modificado='$modificado', credito_asignado ='$credito_asignado', comprometido='$comprometido', acumulado='$acumulado', disponible='$disponible' WHERE item=$codigo";

	$ejecutar_consulta = $conexion->query($ActualizarPartida);

	if ($ejecutar_consulta) {

		$conexion->close();

		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
					<script>
						alert('Partida Actualizada Sastifactoriamente. !!!!');
					</script>
				</head>
			</html>";

	}else {

		$conexion->close();
		
		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
					<script>
						alert('¡¡¡¡ Error Al Actualizar Partida. !!!!');
					</script>
				</head>
			</html>";
	}

} else if ( $opcion == "partidaborrar"){

	$codigo = $_GET['codigo'];

	$BorrarPartida = "DELETE FROM presupuesto_partida WHERE item='$codigo'";
	$ejecutar_consulta = $conexion->query($BorrarPartida);

		if ($ejecutar_consulta) {

			$conexion->close();

			echo "<html>
					<head>
					<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
						<script>
							alert('Borrado Sastifactorio !!!!');
						</script>
					</head>
				</html>";
		}else{
			
			$conexion->close();
			
			echo "<html>
					<head>
					<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
						<script>
							alert('¡¡¡¡ Error Al Borrar !!!!');
						</script>
					</head>
				</html>";	
		}

} else if ( $opcion == "report_nuevo" ){

		$anno			= $_POST['anno'];
		$mes 			= $_POST['mes'];
		$item 			= $_POST['item'];

		if ( $mes=="Enero" ){ $dig_mes=1; }else if ( $mes=="Febrero" ){ $dig_mes=2; }
		else if ( $mes=="Marzo" ){ $dig_mes=3; }else if ( $mes=="Abril" ){ $dig_mes=4; }
		else if ( $mes=="Mayo" ){ $dig_mes=5; }else if ( $mes=="Junio" ){ $dig_mes=6; }
		else if ( $mes=="Julio" ){ $dig_mes=7; }else if ( $mes=="Agosto" ){ $dig_mes=8; }
		else if ( $mes=="Septiembre" ){ $dig_mes=9; }else if ( $mes=="Octubre" ){ $dig_mes=10; }
		else if ( $mes=="Noviembre" ){ $dig_mes=11; }else if ( $mes=="Diciembre" ){ $dig_mes=12; }
		else if ( $mes=="Anual" ){ $dig_mes=13; }

		$GuardarReporte = "INSERT INTO reportes (anno, dig_mes, mes) VALUES ('$anno', $dig_mes, '$mes')";

					$ejecutar_consulta = $conexion->query($GuardarReporte);

		if ( $ejecutar_consulta ){

			$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('Reporte Guardado Sastifactoriamente. !!!!');
							</script>
						</head>
					</html>";

		}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('¡¡¡¡ Error Al Guardar Reporte. !!!!');
							</script>
						</head>
					</html>";
		}

} else if ($opcion == "traslBorrar" ){

$anno 	= $_GET['v1'];
$mes 	= $_GET['v2'];


$BorrarReporte = "DELETE FROM reportes WHERE anno='$anno' AND mes='$mes' ";
$ejecutar_consulta = $conexion->query($BorrarReporte);

	if ($ejecutar_consulta) {

		$conexion->close();

		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
					<script>
						alert('Borrado Sastifactorio !!!!');
					</script>
				</head>
			</html>";
	}else{
		
		$conexion->close();
		
		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
					<script>
						alert('¡¡¡¡ Error Al Borrar !!!!');
					</script>
				</head>
			</html>";	
	}




}



?>