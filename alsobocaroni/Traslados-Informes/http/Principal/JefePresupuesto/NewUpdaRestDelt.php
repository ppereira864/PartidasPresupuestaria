<?php 

require("../../ConexionBD/conexion.php");

$opcion = $_GET['opc'];


 if ( $opcion == "trasladonuevo" ){

	require("plantillas/validarCodigoIgual.php");

	$anno  			= $_POST['anno'];

	$mes 			= $_POST['mes'];

	$num_acuerdo  	= $_POST['num_acuerdo'];
	
	$parrafo_inic	= $_POST['parrafo_inic'];
	
	$considerando_1 = $_POST['considerando_1'];
	$considerando_2 = $_POST['considerando_2'];
	$considerando_3 = $_POST['considerando_3'];
	$considerando_4 = $_POST['considerando_4'];
	$considerando_5 = $_POST['considerando_5'];
	$considerando_6 = $_POST['considerando_6'];
	$considerando_7 = $_POST['considerando_7'];
	
	$articulo_1  	= $_POST['articulo_1'];
	$articulo_2  	= $_POST['articulo_2'];
	$articulo_3  	= $_POST['articulo_3'];
	$articulo_4  	= $_POST['articulo_4'];
	
	$parrafo_fin  	= $_POST['parrafo_fin'];

	$verificandoMes = "SELECT *FROM presupuesto_partida WHERE (mes='$mes') ";

	$ejecutar_verificandoMes = $conexion->query($verificandoMes);
	
	if ( $ejecutar_verificandoMes->fetch_assoc() ){
	
			$registrar_Traslado = "INSERT INTO traslados (num_acuerdo, anno, mes, considerando_1, considerando_2, considerando_3, considerando_4, considerando_5, considerando_6, considerando_7, articulo_1, articulo_2, articulo_3, articulo_4, parrafo_inic, parrafo_fin) VALUES ('$num_acuerdo', '$anno', '$mes', '$considerando_1', '$considerando_2', '$considerando_3', '$considerando_4', '$considerando_5', '$considerando_6', '$considerando_7', '$articulo_1', '$articulo_2', '$articulo_3', '$articulo_4', '$parrafo_inic', '$parrafo_fin')";

			$ejecutar_consulta = $conexion->query($registrar_Traslado);

			if ($ejecutar_consulta) {

				header("Location: RegistrarPartCedet.php?valor=$num_acuerdo&valor1=$anno&valor2=$mes");

			}else{
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('¡¡¡¡ Error Al Registrar Traslado !!!!');
							</script>
						</head>
					</html>";
			}
	}else{

		echo "<html>
				<head>
				<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
					<script>
						alert('¡¡¡¡ Error Partidas En ".$mes." No Disponible Para Traslado. !!!!');
					</script>
				</head>
			</html>";

	}

}else if ($opcion == "reg_pct"){

	$num_acuerdo 	= $_POST['num_acuerdo'];
	$anno 			= $_POST['anno'];
	$mes 			= $_POST['mes'];
	$cod_part 		= $_POST['cod_part'];
	$cod_gen 		= $_POST['cod_gen'];
	$cod_esp 		= $_POST['cod_esp'];
	$cod_sub 		= $_POST['cod_sub'];
	$monto1 		= $_POST['monto1'];
	$seguir			= $_POST['seguir'];


		$bus_descrp = "SELECT *FROM num_partidas WHERE (cod_par=$cod_part AND cod_gen=$cod_gen AND cod_esp=$cod_esp AND cod_sub=$cod_sub)";

			$ejecutar_consulta = $conexion->query($bus_descrp);
			
			$row = $ejecutar_consulta->fetch_assoc();
			$descripcion = $row['descripcion'];

			$registrar_Traslado = "INSERT INTO calculos_pct (trs_num_acuerdo, trs_anno, mes, cod_primario, cod_part, cod_gen, cod_esp, cod_sub, descripcion, monto) VALUES ('$num_acuerdo', '$anno', '$mes', '01-01-00-00-51-4', '$cod_part', '$cod_gen', '$cod_esp', '$cod_sub', '$descripcion', $monto1)";

			$ejecutar_consulta = $conexion->query($registrar_Traslado);

			if ($ejecutar_consulta) {

				$verificarCuenta = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_part' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

				$ejecutar_consulta = $conexion->query($verificarCuenta);
				$row = $ejecutar_consulta->fetch_assoc();
				$disponible = $row['disponible'];
				$modificado = $row['modificado'];

				$nuevoDisponible = $disponible - $monto1;
				$nuevoModificado = $modificado - $monto1;

				$ActualizarDisponibilidad= "UPDATE presupuesto_partida SET modificado=$nuevoModificado ,disponible=$nuevoDisponible WHERE (mes='$mes' AND cod_part=$cod_part AND cod_gen=$cod_gen AND cod_esp=$cod_esp AND cod_sub=$cod_sub )";

				$ejecutar_consulta = $conexion->query($ActualizarDisponibilidad);

				if ( $seguir == "YES" ){

						header("Location: RegistrarPartCedet.php?valor=$num_acuerdo&valor1=$anno&valor2=$mes");
				}else {

					header("Location: RegistrarPartRecep.php?valor=$num_acuerdo&valor1=$anno&valor2=$mes");
				}

			}else{
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('¡¡¡¡ Error Al Registrar Traslado !!!!');
							</script>
						</head>
					</html>";
			}

	
} else if ($opcion == "reg_prt"){

	$num_acuerdo 	= $_POST['num_acuerdo'];
	$trs_anno 			= $_POST['anno'];
	$mes 			= $_POST['mes'];
	$cod_part 		= $_POST['cod_part'];
	$cod_gen 		= $_POST['cod_gen'];
	$cod_esp 		= $_POST['cod_esp'];
	$cod_sub 		= $_POST['cod_sub'];
	$monto1 		= $_POST['monto1'];
	$seguir 		= $_POST['seguir'];

	$verificarCuenta = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_part' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

	$ejecutar_consulta = $conexion->query($verificarCuenta);
	$row = $ejecutar_consulta->fetch_assoc();
	$disponible = $row['disponible'];


		$bus_descrp = "SELECT *FROM num_partidas WHERE (cod_par='$cod_part' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

		$ejecutar_consulta = $conexion->query($bus_descrp);
			
		$row = $ejecutar_consulta->fetch_assoc();
		$descripcion = $row['descripcion'];

			$registrar_Traslado = "INSERT INTO calculos_prt (trs_num_acuerdo, trs_anno, mes, cod_primario, cod_part, cod_gen, cod_esp, cod_sub, descripcion, monto) VALUES ('$num_acuerdo', '$trs_anno ', '$mes', '01-01-00-00-51-4', '$cod_part', '$cod_gen', '$cod_esp', '$cod_sub', '$descripcion', $monto1)";

			$ejecutar_consulta = $conexion->query($registrar_Traslado);

			if ($ejecutar_consulta) {

				$verificarCuenta = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_part' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

				$ejecutar_consulta = $conexion->query($verificarCuenta);
				$row = $ejecutar_consulta->fetch_assoc();
				$disponible = $row['disponible'];
				$modificado = $row['modificado'];

				$nuevoDisponible = $disponible + $monto1;
				$nuevoModificado = $modificado + $monto1;

				$ActualizarDisponibilidad= "UPDATE presupuesto_partida SET modificado=$nuevoModificado ,disponible=$nuevoDisponible WHERE ( mes='$mes' AND cod_part='$cod_part' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub' )";

				$ejecutar_consulta = $conexion->query($ActualizarDisponibilidad);

				if ( $seguir == "YES" ){

						header("Location: RegistrarPartCedet.php?valor=$num_acuerdo&valor1=$anno&valor2=$mes");
				}else {

					echo "<html>
								<head>
										<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
									<script>
										alert('¡¡¡¡ Registro de Traslado Sastifactorio !!!!');
									</script>
								</head>
							</html>";
				}

					
			}else{
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('¡¡¡¡ Error Al Registrar Traslado !!!!');
							</script>
						</head>
					</html>";
			}

		
	
} else if ( $opcion == "inf_extra" ){

	$codigo  = $_POST['codigo']; 
	$descripcion  = $_POST['descripcion'];
	$seguir  = $_POST['seguir'];

	$registrar_datos_extras = "INSERT INTO num_partidas (codigo, descripcion) VALUES ('$codigo','$descripcion')";
		$ejecutar_consulta = $conexion->query($registrar_datos_extras);


		if ( $ejecutar_consulta ) {

				

				if ( $seguir == "YES" ){

					$conexion->close();

						header("Location: Datos_Extras.php");
				}else {

					$conexion->close();

					echo "<html>
									<head>
									<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
										<script>
											alert('¡¡¡¡ Registro de Codigo y Descripcion de Partidas !!!!');
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
								alert('¡¡¡¡ Error Al Registrar !!!!');
							</script>
						</head>
					</html>";
			}


} else if ( $opcion == "inf_extra2" ){

	$nombre_apellido_pc  = $_POST['nombre_apellido_pc'];
	$cedula_pc  = $_POST['cedula_pc'];
	$nombre_apellido_sm  = $_POST['nombre_apellido_sm']; 
	$cedula_sm  = $_POST['cedula_sm'];

	$Borrando_Datos_Viejo = "DELETE FROM informacion_extras";
	$ejecutando_borrado = $conexion->query($Borrando_Datos_Viejo);

	$registrar_datos_extras2 = "INSERT INTO informacion_extras (nombre_apellido_pc, cedula_pc, nombre_apellido_sm, cedula_sm) VALUES ('$nombre_apellido_pc', '$cedula_pc', '$nombre_apellido_sm','$cedula_sm')";
		$ejecutar_consulta = $conexion->query($registrar_datos_extras2);


		if ($ejecutar_consulta ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('Registro Guardado !!!!');
							</script>
						</head>
					</html>";

			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('¡¡¡¡ Error Al Registrar !!!!');
							</script>
						</head>
					</html>";
			}


} else if ($opcion == "borrar_trasl"){

	$num_acuerdo 	= $_GET['v1'];
	$anno 			= $_GET['v2'];
	$mes 			= $_GET['v3'];

	$Buscarcalculos_pct = "SELECT *FROM calculos_pct WHERE trs_num_acuerdo='$num_acuerdo' AND trs_anno='$anno' AND mes='$mes'";
	$ejecutar_Buscarcalculos_pct = $conexion->query($Buscarcalculos_pct);

	while ( $result=mysqli_fetch_array($ejecutar_Buscarcalculos_pct) ) {
			
			$cod_par = $result['cod_part'];
			$cod_gen = $result['cod_gen'];
			$cod_esp = $result['cod_esp'];
			$cod_sub = $result['cod_sub'];
			$monto 	 = $result['monto'];

			$BuscandoDisponible = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

			$ejecutar_BuscandoDisponible = $conexion->query($BuscandoDisponible); 
			$row = $ejecutar_BuscandoDisponible->fetch_assoc();
			$disponible = $row['disponible'];
			$modificado = $row['modificado'];

			$MontoaDevolver = $disponible + $monto;
			$MontoaDevolver1 = $modificado + $monto;

			$DevolviendoMonto = "UPDATE presupuesto_partida SET disponible=$MontoaDevolver, modificado=$MontoaDevolver1 WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub' )";
			$ejecutar_DevolviendoMonto = $conexion->query($DevolviendoMonto); 
	
	}

	$Buscarcalculos_prt = "SELECT *FROM calculos_prt WHERE trs_num_acuerdo='$num_acuerdo' AND trs_anno='$anno' AND mes='$mes'";
	$ejecutar_Buscarcalculos_prt = $conexion->query($Buscarcalculos_prt);

	while ($result=mysqli_fetch_array($ejecutar_Buscarcalculos_prt)) {
			
			$cod_par = $result['cod_part'];
			$cod_gen = $result['cod_gen'];
			$cod_esp = $result['cod_esp'];
			$cod_sub = $result['cod_sub'];
			$monto 	 = $result['monto'];

			$BuscandoDisponible = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

			$ejecutar_BuscandoDisponible = $conexion->query($BuscandoDisponible); 
			$row = $ejecutar_BuscandoDisponible->fetch_assoc();
			$disponible = $row['disponible'];
			$modificado = $row['modificado'];

			$MontoaDevolver = $disponible - $monto;
			$MontoaDevolver1 = $modificado - $monto;

			$DevolviendoMonto = "UPDATE presupuesto_partida SET disponible=$MontoaDevolver, modificado=$MontoaDevolver1 WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub' )";

			$ejecutar_DevolviendoMonto = $conexion->query($DevolviendoMonto); 
	
	}


	$BorrandoTraslados = "DELETE FROM traslados WHERE ( num_acuerdo='$num_acuerdo' AND anno='$anno' AND mes='$mes' )";
	$ejecutar_BorrandoTraslados = $conexion->query($BorrandoTraslados);

	if ( $ejecutar_BorrandoTraslados ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert(' Traslado Borrado Sastifactorio !!!!');
							</script>
						</head>
					</html>";

			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=jefepresupuesto.php'>
							<script>
								alert('¡¡¡¡ Error Al Borrar Traslado !!!!');
							</script>
						</head>
					</html>";
			}

}else if ( $opcion == "cancelTrasl" ) {

	$num_acuerdo 	= $_GET['v1'];
	$anno 			= $_GET['v2'];
	$mes 			= $_GET['v3'];

	$Buscarcalculos_pct = "SELECT *FROM calculos_pct WHERE trs_num_acuerdo='$num_acuerdo' AND trs_anno='$anno' AND mes='$mes'";
	$ejecutar_Buscarcalculos_pct = $conexion->query($Buscarcalculos_pct);

	while ( $result=mysqli_fetch_array($ejecutar_Buscarcalculos_pct) ) {
			
			$cod_par = $result['cod_part'];
			$cod_gen = $result['cod_gen'];
			$cod_esp = $result['cod_esp'];
			$cod_sub = $result['cod_sub'];
			$monto 	 = $result['monto'];

			$BuscandoDisponible = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

			$ejecutar_BuscandoDisponible = $conexion->query($BuscandoDisponible); 
			$row = $ejecutar_BuscandoDisponible->fetch_assoc();
			$disponible = $row['disponible'];
			$modificado = $row['modificado'];

			$MontoaDevolver = $disponible + $monto;
			$MontoaDevolver1 = $modificado + $monto;

			$DevolviendoMonto = "UPDATE presupuesto_partida SET disponible=$MontoaDevolver, modificado=$MontoaDevolver1 WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub' )";
			$ejecutar_DevolviendoMonto = $conexion->query($DevolviendoMonto); 
	
	}

	$Buscarcalculos_prt = "SELECT *FROM calculos_prt WHERE trs_num_acuerdo='$num_acuerdo' AND trs_anno='$anno' AND mes='$mes'";
	$ejecutar_Buscarcalculos_prt = $conexion->query($Buscarcalculos_prt);

	while ($result=mysqli_fetch_array($ejecutar_Buscarcalculos_prt)) {
			
			$cod_par = $result['cod_part'];
			$cod_gen = $result['cod_gen'];
			$cod_esp = $result['cod_esp'];
			$cod_sub = $result['cod_sub'];
			$monto 	 = $result['monto'];

			$BuscandoDisponible = "SELECT * FROM presupuesto_partida WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub')";

			$ejecutar_BuscandoDisponible = $conexion->query($BuscandoDisponible); 
			$row = $ejecutar_BuscandoDisponible->fetch_assoc();
			$disponible = $row['disponible'];
			$modificado = $row['modificado'];

			$MontoaDevolver = $disponible - $monto;
			$MontoaDevolver1 = $modificado - $monto;

			$DevolviendoMonto = "UPDATE presupuesto_partida SET disponible=$MontoaDevolver, modificado=$MontoaDevolver1 WHERE (mes='$mes' AND cod_part='$cod_par' AND cod_gen='$cod_gen' AND cod_esp='$cod_esp' AND cod_sub='$cod_sub' )";

			$ejecutar_DevolviendoMonto = $conexion->query($DevolviendoMonto); 
	
	}


	$BorrandoTraslados = "DELETE FROM traslados WHERE ( num_acuerdo='$num_acuerdo' AND anno='$anno' AND mes='$mes' )";
	$ejecutar_BorrandoTraslados = $conexion->query($BorrandoTraslados);

	if ( $ejecutar_BorrandoTraslados ) {

				$conexion->close();

				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=admin.php'>
							<script>
								alert(' Traslado Cancelado !!!!');
							</script>
						</head>
					</html>";

			}else {

				$conexion->close();
				
				echo "<html>
						<head>
						<meta http-equiv='REFRESH' content='0 ; url=admin.php'>
							<script>
								alert('¡¡¡¡ Error Al Cancelado Traslado !!!!');
							</script>
						</head>
					</html>";
			}
	
}



?>