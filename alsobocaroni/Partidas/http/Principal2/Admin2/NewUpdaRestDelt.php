<?php 

require("../../ConexionBD/conexion.php");

$opcion = $_GET['opc'];


if ($opcion == "nuevo") {

	$path = "../../../../../plugins/dllsth.txt";

	if (!file_exists($path))
	    exit("File not found");
	$file = fopen($path, "r");
	if ($file) {
	    while (($line = fgets($file)) !== false) {
	        $boca = $line; 
	    }
	    if (!feof($file)) {
	        echo "Error: EOF not found\n";
	    }
	    fclose($file);
	}

	$cedula  	 = $_POST['cedula'];
	$nombres 	 = $_POST['nombres'];
	$apellidos   = $_POST['apellidos'];
	$sexo 		 = $_POST['sexo'];
	$email       = $_POST['email'];
	$cargo       = $_POST['cargo'];
	$tipousuario = $_POST['tipousuario'];
	$hostname    = $_POST['hostname'];
	$password    = $_POST['password'];
	$passwordll = hash('sha512', $boca.$password);

		$registrar_Personal = "INSERT INTO personal (cedula, nombres, apellidos, sexo, email, cargo)
								 VALUES ('$cedula','$nombres', '$apellidos', '$sexo', '$email', '$cargo')";
		$ejecutar_consulta = $conexion->query($registrar_Personal);

		$registrar_Usuarios = "INSERT INTO usuarios (usuario, contrasena, cedula, rango,estado, ultimoacceso)
								 VALUES ('$hostname','$passwordll', '$cedula','$tipousuario', 'Activo', '')";
		$ejecutar_consulta2 = $conexion->query($registrar_Usuarios);
	

			if ($ejecutar_consulta && $ejecutar_consulta2 ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('Registro Sastifactorio !!!!');
							</script>
						</head>
					</html>";

			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('¡¡¡¡ Error Al Registrar !!!!');
							</script>
						</head>
					</html>";
			}

}else if ($opcion == "modificar") {


	$cedula  	 = $_POST['cedula'];
	$nombres 	 = $_POST['nombres'];
	$apellidos   = $_POST['apellidos'];
	$sexo		 = $_POST['sexo'];
	$email       = $_POST['email'];
	$cargo       = $_POST['cargo'];
	$tipousuario = $_POST['tipousuario'];
	$hostname    = $_POST['hostname'];
	$password    = $_POST['password'];
		
		if ( $password == "" ){

			$ActualizarPersonal = "UPDATE personal SET cedula='$cedula', nombres='$nombres', apellidos ='$apellidos', 
											email='$email', sexo='$sexo',cargo='$cargo' WHERE cedula='$cedula'";
			$ejecutar_consulta = $conexion->query($ActualizarPersonal);

			$ActualizarUsuarios = "UPDATE usuarios SET usuario='$hostname', cedula='$cedula', rango='$tipousuario' WHERE cedula='$cedula'";
			$ejecutar_consulta2 = $conexion->query($ActualizarUsuarios);


			if ($ejecutar_consulta && $ejecutar_consulta2 ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('Actualizado Sastifactorio !!!!');
							</script>
						</head>
					</html>";
			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('¡¡¡¡ Error Al Actualizar !!!!');
							</script>
						</head>
					</html>";
			}

		}else{

			$path = "../../../../../plugins/dllsth.txt";

			if (!file_exists($path))
			    exit("File not found");
			$file = fopen($path, "r");
			if ($file) {
			    while (($line = fgets($file)) !== false) {
			        $boca = $line; 
			    }
			    if (!feof($file)) {
			        echo "Error: EOF not found\n";
			    }
			    fclose($file);
			}

			$passwordll = hash('sha512', $boca.$password);

			$ActualizarPersonal = "UPDATE personal SET cedula='$cedula', nombres='$nombres', apellidos ='$apellidos', 
											email='$email', sexo='$sexo',cargo='$cargo' WHERE cedula='$cedula'";
			$ejecutar_consulta = $conexion->query($ActualizarPersonal);

			$ActualizarUsuarios = "UPDATE usuarios SET usuario='$hostname', contrasena='$passwordll', cedula='$cedula', rango='$tipousuario' WHERE cedula='$cedula'";
			$ejecutar_consulta2 = $conexion->query($ActualizarUsuarios);

			if ($ejecutar_consulta && $ejecutar_consulta2 ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('Actualizado Sastifactorio !!!!');
							</script>
						</head>
					</html>";
			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('¡¡¡¡ Error Al Actualizar !!!!');
							</script>
						</head>
					</html>";
			}
		
		}

	
	
} else if ($opcion == "restringir"){

	$cedula = $_GET['ced'];

	$ActualizarUsuarios = "UPDATE usuarios SET estado='Restringido' WHERE cedula='$cedula'";
		$ejecutar_consulta = $conexion->query($ActualizarUsuarios);

		if ($ejecutar_consulta ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('El Usuario con CI ".$cedula." Restringido Teporalmente !!!');
							</script>
						</head>
					</html>";
			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('¡¡¡¡ Error Al Restringir Usuario !!!!');
							</script>
						</head>
					</html>";
			}

} else if ($opcion == "quitarest"){

	$cedula = $_GET['ced'];

	$ActualizarUsuarios = "UPDATE usuarios SET estado='Activo' WHERE cedula='$cedula'";
		$ejecutar_consulta = $conexion->query($ActualizarUsuarios);

		if ($ejecutar_consulta ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('El Usuario con CI ".$cedula." Esta Activo !!!');
							</script>
						</head>
					</html>";
			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('¡¡¡¡ Error Al Quitar Restrincion !!!!');
							</script>
						</head>
					</html>";
			}

} else if ($opcion == "borrar"){

	$cedula = $_GET['ced'];

		$BorrarUsuario = "DELETE FROM personal WHERE cedula='$cedula'";
		$ejecutar_consulta = $conexion->query($BorrarUsuario);

			if ($ejecutar_consulta) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('Borrado Sastifactorio !!!!');
							</script>
						</head>
					</html>";
			}else{
				
				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('¡¡¡¡ Error Al Borrar !!!!');
							</script>
						</head>
					</html>";	
			}

} else if ( $opcion == "partidacrear" ){

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
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
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
					<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
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
				<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
					<script>
						alert('Partida Actualizada Sastifactoriamente. !!!!');
					</script>
				</head>
			</html>";

	}else {

		$conexion->close();
		
		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
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
					<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
						<script>
							alert('Borrado Sastifactorio !!!!');
						</script>
					</head>
				</html>";
		}else{
			
			$conexion->close();
			
			echo "<html>
					<head>
					<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
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
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
							<script>
								alert('Reporte Guardado Sastifactoriamente. !!!!');
							</script>
						</head>
					</html>";

		}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
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
				<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
					<script>
						alert('Borrado Sastifactorio !!!!');
					</script>
				</head>
			</html>";
	}else{
		
		$conexion->close();
		
		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
					<script>
						alert('¡¡¡¡ Error Al Borrar !!!!');
					</script>
				</head>
			</html>";	
	}




} else if ($opcion == "report_exist" ){


	// $cod_partida	= $_POST['cod_partida'];
	// $mes 			= $_POST['mes'];
	// $gastos_mensual	= $_POST['gastos_mensual'];
	// $gastos_mensual_ant = 0;

	// $sel_datos_ant = "SELECT * FROM reportes WHERE codigo_partida ='$cod_partida' ";
	// $ejecutar_consulta = $conexion->query($sel_datos_ant);

	// while ($result=mysqli_fetch_array($ejecutar_consulta)){

	// 	$disponibilidad_ant = $result['disponibilidad'];
	// 	$disponibilidad_restante_ant = $result['disponibilidad_restante'];
	// 	$total_gastos_mensual_ant	= $result['total_gastos_mensual'];
	// }

	// $disponibilidad_restante = $disponibilidad_restante_ant - $gastos_mensual;
	// $total_disponibilidad = $disponibilidad_ant;
	// $total_gastos_mensual = $total_gastos_mensual_ant + $gastos_mensual;
	// $total_disponibilidad_restante = $total_disponibilidad - $total_gastos_mensual;

	// $registrar_Reporte = "INSERT INTO reportes (codigo_partida, mes, disponibilidad, gastos_mensual, disponibilidad_restante, total_disponibilidad, total_gastos_mensual, total_disponibilidad_restante) VALUES ('$cod_partida', '$mes', '$disponibilidad_ant', '$gastos_mensual', '$disponibilidad_restante', '$total_disponibilidad', '$total_gastos_mensual', '$total_disponibilidad_restante')";

	// $ejecutar_consulta = $conexion->query($registrar_Reporte);

	// if ($ejecutar_consulta) {

	// 	$conexion->close();

	// 	echo "<html>
	// 			<head>
	// 			<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
	// 				<script>
	// 					alert('Reporte Guardado Sastifactoriamente. !!!!');
	// 				</script>
	// 			</head>
	// 		</html>";

	// }else {

	// 	$conexion->close();
		
	// 	echo "<html>
	// 			<head>
	// 			<meta http-equiv='REFRESH' content='0 ; url=administrador.php'>
	// 				<script>
	// 					alert('¡¡¡¡ Error Al Guardar Reporte. !!!!');
	// 				</script>
	// 			</head>
	// 		</html>";
	// }

}



?>